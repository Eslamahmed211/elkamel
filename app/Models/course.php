<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = ["title" , "start_at" , "end_at" , "short_dis" , "long_dis" , "percent" , "img" , "slug" ];

    public function imgs(){
        return $this->hasMany(course_img::class)->orderBy("order", "Asc");
    }


}
