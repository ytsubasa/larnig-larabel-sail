<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{

protected $table = 't_author';

protected $primaryKey = 'author_id';


public function books()
{
    return $this->hasMany('Book');
}

/* クエリビルダ */


}