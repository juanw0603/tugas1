<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class promotion extends Model
{
    //
    use HasFactory, Notifiable;
   /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
