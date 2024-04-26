<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Publisher extends Authenticatable
{
    use HasFactory , HasApiTokens;
    protected $guarded = [];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
