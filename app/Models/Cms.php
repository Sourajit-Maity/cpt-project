<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text_content',
        'image',
        'content_1_title',
        'content_1_text',
        'content_2_title',
        'content_2_text',
        'content_3_title',
        'content_3_text',
    ];
}
