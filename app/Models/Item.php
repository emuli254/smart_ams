<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Models\ItemCategory');
    }

    public function stock()
    {
      return $this->hasMany('App\Models\ItemStock');
    }

    // public function is_issued_to()
    // {
    //   return $this->hasOne('App\Models\ItemIssuance', 'item_id', 'id' );
    // }
}
