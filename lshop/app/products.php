<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
   protected $fillable=['imagepath','title','price','description'];
}
