<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;

    public function category()
		{
			return $this->belongsTo('App\ProductCategory');
		}

    public function stock()
    {
      return $this->hasMany('App\ProductStock');
    }

    public function is_issued_to()
    {
      return $this->hasOne('App\Models\ProductIssuance', 'product_id', 'id' );
    }
}
