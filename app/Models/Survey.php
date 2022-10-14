<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable=['name', 'description', 'status_id', 'expire_at'];

    protected $dates = ['created_at', 'updated_at', 'expire_at'];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function options(){
        return $this->hasManyThrough(Option::class, Question::class);
    }

    // public function columns(){
    //     return $this->hasMany(Option::class);
    // }

    public function submissions(){
        return $this->hasMany(Submission::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function sectionQuestions(){
        return $this->hasManyThrough(Question::class, Section::class);
    }

    public function responses(){
        return $this->hasManyThrough(Response::class, Question::class);
    }

    // public function respondent(){
    //     return $this->
    // }

    
}
