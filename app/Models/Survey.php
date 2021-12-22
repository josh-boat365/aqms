<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function options(){
        return $this->hasManyThrough(option::class, Question::class);
    }

    public function columns(){
        return $this->hasManyThrough(Subquestion::class, Question::class);
    }

    public function submissions(){
        return $this->hasMany(Submission::class);
    }
}
