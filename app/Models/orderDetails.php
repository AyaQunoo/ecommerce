<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    protected $fillable =[
        "order_id" ,"product_id","quantity","price"
        
            ];
}
