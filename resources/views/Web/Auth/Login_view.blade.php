@extends('Layouts.Web_app')

@section('title')
    Login Page
@endsection

@section('head')
    <style>
        .myText {
            border: 1px solid gray !important;
            border-radius: 10px !important;
            padding: 10px !important;
        }
    </style>
@endsection

@section('headerImage')
    {{url('/images/background.jpg')}}
@endsection

@section('subject')
    Login
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="control-group">
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" class="form-control myText {{ $errors->has('email')? ' is_invalid' : '' }}"
                               name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password"
                               class="form-control myText"
                               name="password" placeholder="Password">
                        @if($errors->has('email'))
                            <span role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
