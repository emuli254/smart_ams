<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStockIssuance extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'item_stock_issuances';

    // Primary Key
    protected $primaryKey = 'id';

    protected $fillable = [ 'staff_id', 'itemstock_id', 'issued_by_id' ];

    // Timestamps
    public $timestamps = 'true';

    public function is_issued_by()
    {
      return $this->belongsTo('App\User', 'issued_by_id', 'id' );
    }

    // public function is_issued_to()
    // {
    //   return $this->belongsTo('App\Staff', 'staff_id', 'id' );
    // }




}
