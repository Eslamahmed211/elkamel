<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_img extends Model
{
    use HasFactory;

    protected $fillable = ["img"];

    public function project(){
        return $this->belongsTo(project::class);
    }
}
