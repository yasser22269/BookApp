<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function children()
    {
        return $this->belongsToMany(Child::class,  'child_books', 'book_id', 'child_id')
            ->withPivot('status');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function getStatusAttribute($value)
    {
        return $value == 0 ? 'غير مفعل' : 'مفعل';
    }
}
