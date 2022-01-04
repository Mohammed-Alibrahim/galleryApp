@extends('Layouts.Admin_app')

@section('title')
    Display Image
@endsection

@section('content')
    <div class="col-lg-12">
        <a href="{{route('Image.Add')}}" class="btn btn-primary" style="margin-bottom: 10px">Add Image</a>
        <div class="panel panel-primary">
            <div class="panel-heading">
                All Images
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @foreach($photos as $photo)
                    <a href="{{route('Image.Delete',['id'=>$photo->id])}}">
                        <img src="{{url('/images/'.$photo->path)}}" style="width: 100px; height: 100px;">
                    </a>
                @endforeach
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
@endsection
