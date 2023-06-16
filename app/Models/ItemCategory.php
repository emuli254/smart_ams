<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
		protected $table = 'item_categories';
		public $timestamps = true;

		public function items()
		{
			return $this->hasMany('App\Models\Item');
		}
}
