<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        $imagePath = ($this->image) ?  $this->image : 'profile/LfbI2kq6ZdE5IYR9rAnLt9J9kPF5DgnZfirzwiDy.png';

        return '/storage/'.$imagePath;
    }

    public function follower(){

        return $this->belongsToMany(User::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
