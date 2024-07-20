<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Author extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'author';
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
    public function scopeFeatured($query, $arg)
    {
        return $query->where('featured', $arg);
    }
}