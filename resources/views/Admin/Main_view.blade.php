@extends('Layouts.Admin_app')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Last 5 Users
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td><a href="{{route('User.Update', ['id'=>$user->id])}}">{{$user->name}}</td></a>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Last 5 Posts
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Title</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr class="odd gradeX">
                                <td><a href="{{route('User.Update', ['id'=>$post->User->id])}}">{{$post->User->name}}</a></td>
                                <td><a href="{{route('Post.Update', ['id'=>$post->id])}}">{{$post->title}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Last 5 Comments
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Post</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr class="odd gradeX">
                                <td><a href="{{route('User.Update', ['id'=>$comment->User->id])}}">{{$comment->User->name}}</a></td>
                                <td><a href="{{route('Post.Update', ['id'=>$comment->Post->id])}}">{{$comment->Post->title}}</a></td>
                                <td><a href="{{route('Web.Comment.Edit', ['id'=>$comment->id])}}">{{$comment->content}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
    </div>
@endsection
