@extends('Layouts.Admin_app')

@section('title')
    Delete User
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        <div class="col-lg-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Delete
                </div>
                <div class="panel-body">
                    <label>Do you really want to delete this user?</label>
                    <br>
                    <span style="color: red">{{$user->name}}</span>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </div>
        </div>
    </form>
@endsection
