<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStockTransaction extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'item_stock_transactions';

    // Primary Key
    protected $primaryKey = 'id';

    protected $fillable = [ 'item_stock_id', 'transaction_type', 'staff_id',  'transacted_by_id' ];

    // Timestamps
    public $timestamps = 'true';

    public function is_transacted_by()
    {
      return $this->belongsTo('App\User', 'transacted_by_id', 'id' );
    }

    public function is_issued_to()
    {
      return $this->belongsTo('App\Staff', 'staff_id', 'id' );
    }

    public function item_stock()
    {
        return $this->belongsTo('App\Models\ItemStock', 'item_stock_id', 'id');
        // return $this->belongsTo( ItemStock::class);
    }

    public function item_name()
    {
        // return $this->hasOneThrough( 'App\Models\Item', 'App\Models\ItemStock', 'item_stock_id', 'item_id', 'id' );
        return $this->item_stock->item;
    }

    public function is_moved_to()
    {
      return $this->belongsTo('App\Models\OfficeLocation', 'office_location_id', 'id' );
    }



}
