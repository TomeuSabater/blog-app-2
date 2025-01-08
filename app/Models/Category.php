<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    // protected $table = 'blblblb'; // si no fuera nombre estándar

    use HasFactory;

    // Campos inmodificables
    protected $guarded = [
        'id'
    ];

    // Campos que son updatables de manera masiva
    protected $fillable = [
        'title',
        'url_clean',
    ];
    
    // Relacions entre taules:
    public function posts() // Nombre en plural porque es la padre del 1:N
    {
        return $this->hasMany(Post::class); // 1:N
    }
}
