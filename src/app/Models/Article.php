<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'body', 'is_public', 'preview_image'];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => strtoupper($value),
            set: fn(string $value) => strtoupper($value),
        );
    }

    protected function isPublic(): Attribute
    {
        return Attribute::make(
            get: fn(int $value) => (bool)$value,
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function getFilePath(Request $request, ?string $default = null): ?string
    {
        $previewImagePath = $default;
        if ($request->hasFile('preview_image')) {
            $previewImagePath = "/storage/{$request->file('preview_image')->store('images/articles')}";
        }
        return $previewImagePath;
    }
}
