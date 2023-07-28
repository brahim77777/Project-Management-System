<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title' ,'user_id', 'description', 'dead_line' , 'status'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function user()  {
        return $this->belongsTo(User::class);
    }
}
