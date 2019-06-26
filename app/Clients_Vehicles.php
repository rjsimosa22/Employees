<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Clients_Vehicles extends Authenticatable
{
    protected $fillable = ['id_clients','id_vehicles','status','updated_at','created_at'];
}
