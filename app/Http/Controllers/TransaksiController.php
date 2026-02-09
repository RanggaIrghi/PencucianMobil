<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function create()
    {
        $layanans = Layanan::all();
        return view('index', compact('layanans')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'required|string|max:20',
            'nopol' => 'required|string|max:15',
            'tipe_mobil' => 'required|string',
            'warna' => 'required|string',
            'layanan' => 'required|string',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'metode_pembayaran' => 'required|string',
        ]);

        $layanan = Layanan::where('nama_layanan', $request->layanan)->first();
        
        if (!$layanan) {
            return back()->with('error', 'Layanan tidak ditemukan.');
        }

        $pelanggan = Pelanggan::firstOrCreate(
            ['no_telp' => $request->telepon],
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat
            ] 
        );

        $kendaraan = Kendaraan::firstOrCreate(
            ['no_polisi' => $request->nopol],
            [
                'pelanggan_id' => $pelanggan->id,
                'tipe_kendaraan' => $request->tipe_mobil,
                'warna' => $request->warna
            ]
        );

        $invoiceCode = 'INV-' . mt_rand(100000, 999999);

        $transaksi = Transaksi::create([
            'no_invoice' => $invoiceCode,
            'kendaraan_id' => $kendaraan->id,
            'layanan_id' => $layanan->id,
            'tanggal_booking' => $request->tanggal_booking,
            'status' => 'Queue', 
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $layanan->harga,
            'tipe_pemesanan' => 'Online',
        ]);

        $currentCookie = $request->cookie('riwayat_pesanan');
        $invoiceList = $currentCookie ? json_decode($currentCookie, true) : [];

        $invoiceList[] = $invoiceCode;
        
        $invoiceList = array_values(array_unique($invoiceList));

        $maxDate = Transaksi::whereIn('no_invoice', $invoiceList)
                    ->max('tanggal_booking');

        $baseDate = $maxDate ? Carbon::parse($maxDate) : Carbon::parse($request->tanggal_booking);
        
        $expiryDate = $baseDate->copy()->addDay()->endOfDay(); 
        $minutes = now()->diffInMinutes($expiryDate);

        Cookie::queue('riwayat_pesanan', json_encode($invoiceList), $minutes);

        return redirect()->route('keranjang');
    }

    public function keranjang(Request $request)
    {
        $cookieData = $request->cookie('riwayat_pesanan');
        $invoiceList = $cookieData ? json_decode($cookieData, true) : [];

        $transaksis = Transaksi::with(['kendaraan.pelanggan', 'layanan'])
                        ->whereIn('no_invoice', $invoiceList)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('keranjang', compact('transaksis'));
    }

    public function sukses($invoice)
    {
        $transaksi = Transaksi::with(['kendaraan.pelanggan', 'layanan'])
                        ->where('no_invoice', $invoice)
                        ->firstOrFail();

        return view('transaksi.sukses', compact('transaksi'));
    }
}