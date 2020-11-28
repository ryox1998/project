<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['name','detail','ampher','type','people','day','lat','long'];

    // $table->bigIncrements('id');
    // $table->string('name', 100);
    // $table->text('detail', 100);
    // $table->string('ampher', 100);
    // $table->string('type', 100);
    // $table->integer('people');
    // $table->integer('day');
    // $table->double('lat', 8, 3);
    // $table->double('long', 8, 3);
    // $table->string('image', 100);
}
