<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
 	protected $table = 'level';

 	protected $hidden = array('created_at','updated_at');   
}
