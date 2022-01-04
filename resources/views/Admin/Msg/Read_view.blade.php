@extends('Layouts.Admin_app')

@section('title')
    Read Message
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="form-group">
                        <div class="pull-left">
                            {{$msg->data['email']}}  |   {{$msg->data['name']}}
                        </div>
                        <div class="pull-right">
                            {{$msg->data['phone']}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {!! str_replace(array("\n"),"<br>", $msg->data['content']) !!}
                </div>
                <div class="panel-footer">
                    <a class="btn btn-primary" href="{{route('Msg.Index',['type'=>'All'])}}">Back</a>
                </div>
            </div>
        </div>
    </form>
@endsection
