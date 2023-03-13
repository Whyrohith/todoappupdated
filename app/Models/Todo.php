<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isCompleted()
    {
        return $this->completed_at != null;
    }

    public function todogroup()
    {
        return $this->belongsTo(TodoGroup::class);
    }   
  
}
