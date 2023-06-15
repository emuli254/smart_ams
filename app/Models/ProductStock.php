<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
		protected $table = 'product_stocks';
		public $timestamps = true;

		public function product()
		{
			return $this->belongsTo('App\Product');
		}

        public function is_supplied_by()
        {
            return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
        }

        public function is_issued_to()
        {
            return $this->hasOne('App\Models\ProductStockIssuance', 'productstock_id', 'id' );
        }

}
