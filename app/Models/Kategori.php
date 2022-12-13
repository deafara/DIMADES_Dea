<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primerykey = 'id';

    protected $fillable = [
        'name',
        'namaAdminPt',
        'jk',
        'notelp',
        'email'
    ];
}

