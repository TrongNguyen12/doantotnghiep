<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table = 'vp_customers';// ten bang
    protected $primaryKey = 'customer_id';//khoa chinh
    protected $guarede = [];
}
