<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Middleware\ThrottlesExceptions;

class Customer extends Model
{
    protected $connection = 'mysql';
    protected $table = 'customers';

    public function order(){
        return $this->hasMany('App\Models\Order');
    }
}
