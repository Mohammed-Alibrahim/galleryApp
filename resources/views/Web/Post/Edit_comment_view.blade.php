@extends('layouts.Web_app')

@section('title')
    {{$post->title}}
@endsection

@section('head')
    <style>
        .myTextArea {
            border: 1px solid gray !important;
            border-radius: 20px !important;
            padding: 10px !important;
        }

        .myTextArea:focus {
            border: 2px solid #0c5460 !important;
            padding: 9px !important;
        }
    </style>
@endsection

@section('headerImage')
    {{count($post->Photos)>0 ? url('/images/'.$post->Photos[0]->path) : url('/images/background.jpg')}}
@endsection

@section('subject')
    {{$post->title}}
@endsection

@section('content')
    @auth
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="">
                        @csrf
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Comment</label>
                                <textarea rows="2" class="form-control myTextArea" placeholder="Write a Comment!"
                                          name="content" required
                                          data-validation-required-message="Please enter a comment.">{{$comment->content}}</textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="border-radius: 10px;"
                                    id="sendMessageButton">Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth
@endsection
