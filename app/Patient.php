<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $hidden = ['id', 'created_at', 'updated_at'];

}
