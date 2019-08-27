@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" alt="" class ="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
               <div class="d-flex align-items-center pb-3">
                   <div class="h4">{{$user->username}}</div>

                   <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
               </div>


                @can('update', $user->profile) <!--觀看給予權利-->
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile) <!--觀看給予權利-->
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
                <div class="d-flex">
                <div class="pr-5"><strong>{{$postCount}} </strong>posts</div>
                <div class="pr-5"><strong>{{$followersCount}}Malaysian</strong></div>
                <div class="pr-5"><strong>國立高雄大學 </strong>毕业</div>
            </div>
            <div class="pt-3"><strong>{{$user->profile->title}}</strong></div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 pt-4 ">
            <a href="/p/{{$post->id}}">
            <img src="/storage/{{$post -> image}}" class="w-100" alt="">
            </a>
        </div>
        @endforeach
</div>
</div>
@endsection
