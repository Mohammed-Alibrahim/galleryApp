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

        .comment {
            margin: 20px;
            border: solid #0c5460 1px;
            border-radius: 20px;
            padding: 20px;
            word-wrap: break-word;
        }

        .comment .user-name {
            width: 75px;
            height: 75px;
            background-color: #0c5460;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .comment .footer {
            font-size: 12px;
            color: gray;
            margin-left: auto;
            margin-right: 0;
        }

        .control {
            font-size: 12px;
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
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $post->content !!}
                    <div class="row">
                        @foreach($post->Photos as $photo)
                            <div class="col-md-4">
                                <img src="{{url('/images/'.$photo->path)}}" style="width: 150px; height: 150px;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
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
                                          data-validation-required-message="Please enter a comment."></textarea>
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
    <div class="row">
        <div class="col-md-12">
            @foreach($comments as $comment)
                <div class="row comment">
                    <div class="col-md-2">
                        <div class="user-name">
                            <label>{{$comment->User->name}}</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        {!! str_replace(array("\n"), '<br>', $comment->content) !!}
                    </div>
                    @auth
                        @if($comment->User->id == Auth::user()->id or Auth::user()->role == 'admin' or Auth::user()->id == $post->Section->admin)
                            <div class="col-md-2">
                                <div class="control">
                                    <a href="{{route('Web.Comment.Edit', ['id'=>$comment->id])}}">Edit</a>|
                                    <a href="#" onclick="deleteComment('{{route('Web.Comment.Delete', ['id'=>$comment->id])}}')">Delete</a>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <div class="footer">
                        {{$comment->created_at}}
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            function deleteComment($url)
            {
                var flag = confirm("Do you really want to delete this comment?");
                if (flag){
                    window.location.href = $url;
                }
            }
        </script>
    </div>
@endsection
