<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'applications_id',
        'line_of_business',
        'psic',
        'products_services',
        'no_of_units',
        'capitalization',
        'gross_sales',
    ];
}
