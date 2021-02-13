<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'cover',
        'discount',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'discount' => 'integer',
        // 'price' => 'decimal:8,2'
    ];

    /**
     * The genres that belong to the book.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }

    /**
     * The authors that belong to the book.
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

}