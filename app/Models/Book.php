<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'reading_pages',
        'num_of_read_pages',
    ];

    protected $casts = [
        'reading_pages' => 'array',
    ];


    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
