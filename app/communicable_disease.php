<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class communicable_disease extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table='communicable_diseases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'disease_text',
        'disease_date_text',
        'disease_confirmed_text',
        'confirmed_date_text',
        'patient_name_text',
        'street_no_text',
        'street_name_text',
        'village_name_text',
        'town_name_text',
        'district_name_text',
        'sex_text',
        'ethnic_group_text',
        'date_of_onset_text',
        'date_of_hospitalization_text',
        'laboratory_findings_text',
        'outcome_text',
        'isolated_place'
    ];

    /**
     * @param $date
     */
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at'] = Carbon::now();
    }
}
