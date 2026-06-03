<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',

        'judul',

        'isi_laporan',

        'foto',

        'status',

    ];


    /*
    |--------------------------------------------------------------------------
    | RELASI USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /*
    |--------------------------------------------------------------------------
    | RELASI TANGGAPAN
    |--------------------------------------------------------------------------
    */

    public function tanggapan()
    {
        return $this->hasMany(
            Tanggapan::class,
            'pengaduan_id'
        );
    }
}