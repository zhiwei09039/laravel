@extends('tst.layout')

@section('title',' Contact Us')

@section('content')


    <form action="/contact" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name')}}" class="form-control">
            <div>{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            <div>{{ $errors->first('email') }}</div>
        </div>

        <div class="form-group">
            <label for="name">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" value="{{ old('message') }}"
                      class="form-control"></textarea>
            <div>{{ $errors->first('message') }}</div>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Send Message</button>

    </form>

@endsection
