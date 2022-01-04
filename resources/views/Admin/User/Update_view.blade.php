@extends('Layouts.Admin_app')

@section('title')
    Edit User
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    User Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name: </label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Phone: </label>
                        <input type="text" name="phone" class="form-control" value="{{$user->phone}}" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label>Password: </label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </form>
@endsection
