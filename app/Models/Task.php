<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    const STATUS_TODO = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_IN_REVIEW = 3;
    const STATUS_DONE = 4;
    
    protected $fillable = ['title', 'description', 'status'];
    
    public function assignee() {
        return $this->belongsTo(User::class);
    }

    public function getStateAttribute(){
        switch($this->status) {
            case self::STATUS_TODO:
                return "To do";
            case self::STATUS_IN_PROGRESS:
                return "In progress";
            case self::STATUS_IN_REVIEW:
                return "In review";
            case self::STATUS_DONE:
                return "Done";
        }
    }
}
