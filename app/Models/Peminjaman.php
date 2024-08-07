<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
