@extends('Layouts.Admin_app')

@section('title')
    Upload Image
@endsection

@section('content')
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Image Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                       <input class="btn btn-primary" type="file" name="photo" value="Upload">
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </form>
@endsection
