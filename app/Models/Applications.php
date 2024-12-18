<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'typeofapplication',
        'typeofbussiness',
        'gender',
        'dtisecreg',
        'tin',
        'tradename',
        'telno',
        'mobileno',
        'email',
        'surname',
        'givenname',
        'middlename',
        'suffix',
        'corp',
        'floorarea',
        'bmale',
        'bfemale',
        'rescity',
        'vantruck',
        'motorcycle',
        'owned',
        'taxdecleration',
        'propertyid',
        'taxincentives',
        'businessActivity',
        'othersInput',

        'bldgno', 'namebldg', 'lotno', 'blockno', 'street', 'subdivision', 'barangay', 
        'district', 'city', 'province', 'zipcode',
        'bldgnob', 'namebldgb', 'lotnob', 'blocknob', 'streetb', 'subdivisionb', 'barangayb', 
        'districtb', 'cityb', 'provinceb', 'zipcodeb',

        'status',
        'remarks'
    ];

    public function scopeSearch($query, $val){
        return $query->where(function($q) use ($val) {
            $q->where('id', 'like', '%'.$val.'%')
              ->orWhere('typeofapplication', 'like', '%'.$val.'%')
              ->orWhere('typeofbussiness', 'like', '%'.$val.'%')
              ->orWhere('tradename', 'like', '%'.$val.'%')
              ->orWhere('status', 'like', '%'.$val.'%');
        });
    }
}
