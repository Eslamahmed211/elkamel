<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_img extends Model
{
    use HasFactory;

    protected $fillable = ["img" , "course_id" , "order"];

    public function course(){
        return $this->belongsTo(course::class);
    }
}
