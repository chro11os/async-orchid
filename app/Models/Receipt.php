<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'date',
        'time',
        'customerName',
        'customerBalance',
        'customerID',
        'projectName',
        'projectStart',
        'projectEnd',
    ];

}
