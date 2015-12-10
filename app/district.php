<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class district extends Model
{
    protected $table='districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district_name',
    ];

    /**
     * @param $date
     */
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at'] = Carbon::now();
    }
}
