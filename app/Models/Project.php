<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type', 'description', 'key_features', 'programming_language', 'slug', 'status', 'preview_path'
    ];
}
