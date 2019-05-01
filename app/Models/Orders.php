<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'vp_orders';// ten bang
    protected $primaryKey = 'ord_id';//khoa chinh
    protected $guarede = [];
    public $timestamps = false;
}
