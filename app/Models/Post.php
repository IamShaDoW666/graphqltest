<?php

namespace App\Models;

use App\Models\User;
use App\Traits\HasConfig;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasConfig;
    protected $modelName = "App\Models\Post";    
    protected $fillable = ['title', 'body', 'user_id', 'author'];

    public function user()
    {                
        return $this->belongsTo(User::class);
    }
}
