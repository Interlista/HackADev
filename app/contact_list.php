<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_list extends Model
{
    protected $table='contact_list';

    protected  $fillable = [
        'contact_number',
        'other_data',
        'contact_name',
        'address',
        'approved',
        'disaster_id',
        'approved',


    ];
}
