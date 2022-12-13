<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'mitra_id',
        'category_id',
        'name',
        'price',
        'type',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

    public function mitra()
    {
        return $this->belongsTo('App\Models\Mitra');
    }
}