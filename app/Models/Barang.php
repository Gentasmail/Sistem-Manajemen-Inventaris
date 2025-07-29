<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'kategori_id', 'jumlah', 'harga_satuan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
