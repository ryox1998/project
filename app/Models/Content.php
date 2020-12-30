<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\GuideController;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ['name','detail','ampher','type','people','day','lat','long',];


    public function setTypeAttribute($value){

    $this->attributes['type'] = json_encode($value);

    }

    public function getTypeAttribute($value){

    return $this->attributes['type'] = json_decode($value);

    }


}


