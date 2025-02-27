<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Karyawan extends Model
{
    //
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'jenis_kelamin',
        'jabatan',
    ];
}
