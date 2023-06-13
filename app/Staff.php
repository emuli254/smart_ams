<?php

namespace App;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    use HasFactory;

    use FormAccessible;


    // Table Name
    protected $table = 'staff';

    // Primary Key
    protected $primaryKey = 'id';

    protected $fillable = [ 'name', 'email', 'phone', 'personal_number', 'national_id_number', 'department', 'division', 'designation' ];

    // Timestamps
    public $timestamps = 'true';


}
