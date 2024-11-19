<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkouts extends Model
{
    use HasFactory;
    protected $table = 'Checkout';
    protected $fillable = [
        'applications_id',
        'productname',
        'amount',
        'firstname',
        'lastname',
        'email',
        'address',
        'town',
        'city',
        'country',
        'zip',
        'paymentmethod',
        'namecard',
        'acctnumber',
        'expiration',
        'ccv',
        'invoiceno',
    ];
}
