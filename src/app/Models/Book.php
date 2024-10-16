<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'image_url',
        'author',
        'year',
        'total',
        'tags'
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => ucfirst($value)
        );
    }

}
