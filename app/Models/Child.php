<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Child extends Model
{
    use HasFactory , HasApiTokens;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'child_books', 'child_id', 'book_id')
            ->withPivot('status');
    }

}
