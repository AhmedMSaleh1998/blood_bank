<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonnationRequest extends Model
{

    protected $table = 'donnation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'hospital_name', 'blood_type_id', 'bags_num', 'details', 'longitude', 'lattitude', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

}
