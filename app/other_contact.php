<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class other_contact extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table='other_contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'other_contact_name',
        'other_contact_age',
        'observation',
    ];

    /**
     * @param $date
     */
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at'] = Carbon::now();
    }
}
