<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    const STATUS = [
        1 => 'To do',
        2 => 'In progress',
        3 => 'In review',
        4 => 'Done'
    ];
    
    protected $fillable = ['title', 'description', 'status'];
    
    public function assignee() {
        return $this->belongsTo(User::class);
    }

}
