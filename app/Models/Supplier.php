<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'vp_supplier';// ten bang
    protected $primaryKey = 'supplier_id';//khoa chinh
    protected $guarede = [];
}
