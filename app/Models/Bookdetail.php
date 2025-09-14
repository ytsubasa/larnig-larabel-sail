<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookdetail extends Model
{
    public function book()
    {
        return $this->belongsTo('Book');
    }
}
