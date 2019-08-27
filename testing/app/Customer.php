<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];

    protected $attributes = [  //set default for status
        'active'=>1,
    ];
    public function getActiveAttribute($attribute){

        return $this->activeOption()[$attribute];
    }

    public function scopeActive($query){

        return $query->where('active',1);
    }

    public function scopeInactive($query){

        return $query->where('active',0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function activeOption(){
        return [
            1=>'Active',
            0=>'Inactive',
            2=>'In-Progress',
        ];
    }
}
