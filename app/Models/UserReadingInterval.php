<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReadingInterval extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'reading_interval',
    ];

    protected $casts = [
        'reading_interval' => 'array',
    ];


    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function book()
    {
      return $this->belongsTo(Book::class);
    }
}

