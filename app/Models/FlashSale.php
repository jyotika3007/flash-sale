<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;

    protected $fillable = [
    	'title',
    	'description',
    	'cover',
    	'price',
    	'discount',
    	'quantity',
    	'publish_date' ,
        'start_from',
        'expire_on',
        'status'
    ] ;


}
