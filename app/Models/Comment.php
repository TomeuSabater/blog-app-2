<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, Notifiable; //Hay un Factory para este Modelo
    
    // Relación 1:N con Image
    public function images()
    {
        return $this->hasMany(Image::class); // 1 Comment tiene n images
    }

    public function post()
    {
        return $this->belongsTo(Post::class); // 1 Comment es de 1 post
    }

    public function user()
    {
        return $this->belongsTo(User::class); // 1 Comment es de 1 user
    }
}
