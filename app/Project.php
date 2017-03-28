<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public $fillable=['name','created_date','description','user','deadline'];
}
