<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected $table = 'vp_employees';// ten bang
    protected $primaryKey = 'em_id';//khoa chinh
    protected $guarede = [];
}
