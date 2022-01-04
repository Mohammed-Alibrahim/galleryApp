@extends('layouts.Web_app')

@section('title')
    Main Page
@endsection

@section('headerImage')
    {{url('/images/background.jpg')}}
@endsection

@section('subject')
    Welcome
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{route('Web.Post.Index',['id'=>$post->id])}}">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                        </a>
                        <p class="post-meta">Posted by
                            {{$post->User->name}}
                            on {{$post->created_at}}</p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
