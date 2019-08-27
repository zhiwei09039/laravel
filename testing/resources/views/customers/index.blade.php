@extends('tst.layout')
@section('title','CustomerList')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <p><a href="aboutMe/create">Add New Customer</a></p>
        </div>
    </div>

    @foreach($customers as $customer)
        <div class="row">
            <div class="col-2">
                {{$customer->id}}
            </div>
            <div class="col-4"><a href="/aboutMe/{{$customer->id}}">{{$customer->name}}</a></div>
            <div class="col-3">{{$customer->company->name}}</div>
            <div class="col-3">{{$customer->active}}</div>
        </div>
    @endforeach
<hr>


@endsection
