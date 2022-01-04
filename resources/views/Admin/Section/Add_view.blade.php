@extends('Layouts.Admin_app')

@section('title')
    Add Section
@endsection

@section('content')
    <form method="post" action="">
        @csrf
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Section Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Name: </label>
                        <input type="text" name="name" class="form-control" placeholder="Section name">
                    </div>
                    <div class="form-group">
                        <label>Editor for this section</label>
                        <select name="admin" class="form-control js-example-basic-single">
                            <option value="">Empty</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
@endsection
