<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class client extends Authenticatable
{
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'd_o_b', 'blood_type_id', 'last_donnation_date', 'city_id', 'phone', 'api_token', 'password');
    protected $hidden = array('api_token');

    public function BloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','client_post','client_id','post_id');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function donnationRequests()
    {
        return $this->hasMany('App\Models\DonnationRequest');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }


}
