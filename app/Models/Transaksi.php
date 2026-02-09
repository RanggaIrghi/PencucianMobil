<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['tanggal_transaksi'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
    
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'Queue' => 'text-red-500 bg-red-50',
            'Washing' => 'text-blue-500 bg-blue-50',
            'Finished' => 'text-green-500 bg-green-50',
            default => 'text-gray-500',
        };
    }
}