@extends('Layouts.Web_app')

@section('title')
    Profile
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
    Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                @csrf
                <div class="control-group">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control myText" name="name" value="{{$user->name}}" placeholder="Name">
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control myText" name="phone" value="{{$user->phone}}" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label>Current Password:</label>
                        <input   type="password" class="form-control myText" name="c_password" placeholder="Current Password">
                    </div>
                    <div class="form-group">
                        <label>New Password:</label>
                        <input type="password" class="form-control myText" name="password" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password:</label>
                        <input type="password" class="form-control myText" name="password_confirmation"
                               placeholder="Confirm New Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
