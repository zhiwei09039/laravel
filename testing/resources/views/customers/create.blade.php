@extends('tst.layout')
@section('title','CustomerList')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add Customer</h1>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/aboutMe" method="POST" class=" pb-5">

               @include('customers.form')
                <button type="submit" class="btn-primary">Add Customer</button>


            </form>
        </div>
    </div>

    <hr>



@endsection
