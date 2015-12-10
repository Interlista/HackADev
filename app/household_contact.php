<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class household_contact extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table='household_contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'household_contact_name',
        'household_contact_age',
        'observation',
    ];

    /**
     * @param $date
     */
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at'] = Carbon::now();
    }
}
