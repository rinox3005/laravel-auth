<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type', 'programming_language', 'slug', 'status', 'preview_path'
    ];

    // funzione per eliminare l'immagine di preview dallo storage quando elimino il progetto
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            // controlla se il progetto ha un'immagine collegata e la elimina
            if ($project->preview_path) {
                Storage::disk('public')->delete(str_replace('storage/', '', $project->preview_path));
            }
        });
    }
}
