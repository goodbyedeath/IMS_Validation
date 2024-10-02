<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_database extends Model
{
    use HasFactory;
    protected $fillable = [
        'entitas_usaha', 'no_sertifikat', 'ruang_lingkup', 'alamat', 'standar', 
        'status_organisasi', 'masa_berlaku', 'audit_awal', 'pengawasan_audit_1', 
        'pengawasan_audit_2', 'status_pengawasan_1', 'status_pengawasan_2', 'perpanjangan','qr_code'
    ];
}