<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'order',
        'option_type_id',
        'survey_id',
        'section_id'
    ];

    public function options(){
        return $this->hasMany(option::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
