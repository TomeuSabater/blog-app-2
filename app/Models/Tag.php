<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{

    use HasFactory, Notifiable; //Hay un Factory para este Modelo;

    protected $fillable = [
        'name',
        'url_clean',
    ];

    protected $guarded = [
        'id'
    ];

    // Relacions entre taules:
    public function posts() // 1 Tag tiene n posts
    {       
        return $this->belongsToMany(Post::class); // M:N
    }
}
