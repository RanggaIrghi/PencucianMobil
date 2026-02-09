<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // app/Http/Controllers/AdminController.php

    public function createTransaksi()
    {
        $layanans = Layanan::all();
        
        return view('auth.transaction', compact('layanans'));
    }

    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nopol' => 'required',
            'layanan_id' => 'required',
            'tipe_kendaraan' => 'required',
        ]);

        $pelanggan = Pelanggan::firstOrCreate(
            ['nama' => $request->nama], 
            ['alamat' => $request->alamat, 'no_telp' => $request->telepon]
        );

        $kendaraan = Kendaraan::firstOrCreate(
            ['no_polisi' => $request->nopol],
            [
                'pelanggan_id' => $pelanggan->id,
                'tipe_kendaraan' => $request->tipe_kendaraan,
                'warna' => $request->warna ?? '-'
            ]
        );

        $layanan = Layanan::findOrFail($request->layanan_id);

        Transaksi::create([
            'no_invoice' => $request->no_invoice, 
            'kendaraan_id' => $kendaraan->id,
            'layanan_id' => $layanan->id,
            'tanggal_booking' => now(),
            'status' => 'Queue', 
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $layanan->harga,
            'tipe_pemesanan' => 'Offline' 
        ]);

        return redirect()->route('queue')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function queue(Request $request)
    {
        $query = Transaksi::with(['kendaraan.pelanggan', 'layanan']);

        if ($request->has('search') && $request->search != '') {
            $keyword = $request->search;
            
            $query->where(function ($q) use ($keyword) {
                $q->where('no_invoice', 'LIKE', "%$keyword%")
                ->orWhereHas('kendaraan', function ($k) use ($keyword) {
                    $k->where('no_polisi', 'LIKE', "%$keyword%");
                })
                ->orWhereHas('kendaraan.pelanggan', function ($p) use ($keyword) {
                    $p->where('nama', 'LIKE', "%$keyword%");
                });
            });
        }

        $transaksis = $query->orderBy('created_at', 'desc')->get();

        return view('auth.queue', compact('transaksis'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Queue,Washing,Finished',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui!'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function dashboard()
    {
        $transaksis = Transaksi::with(['kendaraan.pelanggan', 'layanan'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('auth/dashboard', compact('transaksis'));
    }
}