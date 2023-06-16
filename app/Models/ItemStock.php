<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
		protected $table = 'item_stocks';
		public $timestamps = true;

		public function item()
		{
			return $this->belongsTo('App\Models\Item');
		}

        public function is_supplied_by()
        {
            return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
        }

        public function is_issued_to()
        {
            return $this->hasOne('App\Models\ItemStockIssuance', 'itemstock_id', 'id' );
        }

}
