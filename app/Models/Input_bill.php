<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Input_bill extends Model
{
    protected $table = 'vp_inputbill';// ten bang
    protected $primaryKey = 'ipB_id';//khoa chinh
    protected $guarede = [];
    public $timestamps = false;
}
