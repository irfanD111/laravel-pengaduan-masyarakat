<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "pengaduan";

    protected $filltable =['tgl_pengaduan','nik','isi_laporan','foto','status'];
}
