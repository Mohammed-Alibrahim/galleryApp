@extends('Layouts.Web_app')

@section('title')
    Main Page
@endsection

@section('head')
    <style>
        .myText {
            border: 1px solid gray !important;
            border-radius: 10px !important;
            padding: 10px !important;
        }

        /*.myText:focus {*/
        /*    border: 2px solid gray !important;*/
        /*    padding: 9px !important;*/
        /*}*/
    </style>
@endsection

@section('headerImage')
    {{url('/images/background.jpg')}}
@endsection

@section('subject')
    Welcome
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="control-group">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control myText" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" class="form-control myText" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control myText" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control myText" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <input type="password" class="form-control myText" name="password_confirmation"
                               placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
