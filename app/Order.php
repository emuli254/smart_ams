<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function staff()
    {
      return $this->belongsTo('App\Staff', 'staff_id', 'id' );
    }

    public function orderproducts()
    {
        return $this->hasMany( 'App\Product', 'id', 'product_id' );
    }
}
