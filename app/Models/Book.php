<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function detail()
    {
        return $this->hasOne('Bookdetail');
    }




    
}
