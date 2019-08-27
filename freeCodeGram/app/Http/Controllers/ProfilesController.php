<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class ProfilesController extends Controller
{

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id):false;

        $postCount = Cache::remember(
            'count.posts.'.$user->id,
            now()->addSecond(30),
            function ()use($user){
            return $user->posts->count();
            });

        $followersCount=$user->following->count();

        return view('profiles.index',compact('user','follows','postCount','followersCount'));
    }

  public function edit(User $user){
      $this -> authorize('update',$user->profile);
      return view('profiles.edit',compact('user'));
  }

  public function update(User $user){
        $this -> authorize('update',$user->profile);

        $data = request()->validate([ //宣告有效的進入資料
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',

        ]);

        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray= ['image'=>$imagePath];
        }


        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));


        return redirect("/profile/{$user->id}");

        }
}
