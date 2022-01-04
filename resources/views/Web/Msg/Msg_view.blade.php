@extends('Layouts.Web_app')

@section('title')
    Contact Us
@endsection

@section('head')
    <style>
        .myText {
            border: 1px solid gray !important;
            border-radius: 10px !important;
            padding: 10px !important;
        }

        .myTextArea {
            border: 1px solid gray !important;
            border-radius: 20px !important;
            padding: 10px !important;
        }

        .myTextArea:focus {
            border: 2px solid #0c5460 !important;
            padding: 9px !important;
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
    Contact Us
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
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
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="2" class="form-control myTextArea" placeholder="Content" name="content"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Send a Notification to</label>
                        <select name="to" class="form-control">
                            <option value="admin">All Admins</option>
                            <option value="editor">All Editors</option>
                            <option value="all">All Admins and Editors</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
