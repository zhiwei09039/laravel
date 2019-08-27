@extends('tst.layout')
@section('title','Edit Detail for ' . $customer->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Detail for {{$customer->name}}</h1>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/aboutMe/{{$customer->id}}" method="POST" class=" pb-5">
                @method('PATCH')
                @include('customers.form')

                <button type="submit" class="btn-primary">Save Detail</button>

            </form>
        </div>
    </div>

    <hr>



@endsection
