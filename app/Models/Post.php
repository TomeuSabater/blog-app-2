<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{

    // Tiene asociado un factory
    use HasFactory, Notifiable;

    // protected $table = 'NomTaula';  // Si la taula i el model no segueixen la convenció de Laravel
    // protected $primaryKey = 'id'; // Podem assignar una primary key 
    // public $incrementing = false; // Si volem que el primary key no sigui autoimcremental
	// protected $keyType = 'string'; // Si volem que el primary key no sigui un enter
	// public $timestamps = false; // Si la taula no te les columnes de temps(created_at, updated_at)
    
    // Atributs que es poden emplenar de manera automàtica: associat al mètode 'Post::create()'
    protected $fillable = [ 
        'title',
        'url_clean',
        'content',
        'user_id',
        'category_id', 
    ];

    // Atributs que no es volen mostrar amb 'response()->json($posts)'
    protected $hidden = [
        'url_clean',
    ];

    // Atributs que no es poden emplenar de manera automàtica
    protected $guarded = [
        'id'
    ];

    // Relacions entre taules 

    public function category() // 1 Post es de 1 Category
    {
      return $this->belongsTo(Category::class);  // N:1
    }

    public function tags() // 1 Post tiene n Tags en relación N:M
    {
        return $this->belongsToMany(Tag::class);  // M:N
    }

    public function user() // 1 Post es de 1 Usuario
    {
        return $this->belongsTo(User::class);   // N:1
    }

    public function comments() // 1 Post tiene n comments
    {
        return $this->hasMany(Comment::class);  // 1:N
    }
}
