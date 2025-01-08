<?php

namespace App\Models;

use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, Notifiable; //Hay un Factory para este Modelo

    // Relacions entre taules:
    public function comment() // 1 Imagen es de 1 Comment
    {
        return $this->belongsTo(Comment::class); // Relación 1:N para el Modelo HIJO
    }
}
