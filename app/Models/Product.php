<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'vp_products';// ten bang
    protected $primaryKey = 'prod_id';//khoa chinh
    protected $guarede = [];
}
