<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
	protected $table = 'vp_order_detail';// ten bang
    protected $primaryKey = 'orde_id';//khoa chinh
    protected $guarede = [];
}
