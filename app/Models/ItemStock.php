<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\ItemStockTransaction;

class ItemStock extends Model
{
		protected $table = 'item_stocks';

        protected $fillable = [ 'item_id', 'description', 'serial_part_no', 'asset_tag_no', 'supplier_id', 'buy_price', 'in_stock', 'discontinued' ];

		public $timestamps = true;

		public function item()
		{
			return $this->belongsTo('App\Models\Item');
		}

        public function is_supplied_by()
        {
            return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
        }

        // public function is_issued_to()
        // {
        //     return $this->hasOne('App\Models\ItemStockIssuance', 'itemstock_id', 'id' );
        // }
        public function is_issued_to()
        {
            return $this->hasOne('App\Models\ItemStockTransaction', 'item_stock_id', 'id' );
        }

        public function is_available($itemStockId)
        {
            $lastInsertedRecord = ItemStockTransaction::where('item_stock_id', $itemStockId)->latest('id')->first();

            if ($lastInsertedRecord && $lastInsertedRecord->transaction_type === 0 ) {
                return true;
            }
            return false;
        }

        public function is_located_at()
        {
            return $this->belongsTo('App\Models\OfficeLocation', 'office_location_id', 'id' );
        }

}
