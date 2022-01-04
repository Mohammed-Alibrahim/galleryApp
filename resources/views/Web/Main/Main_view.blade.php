@extends('layouts.Web_app')

@section('title')
    Main Page
@endsection

@section('head')
    <style>
        .panel {
            border: #0c5460 1px dashed;
            padding: 30px;
            margin: 30px;
            border-radius: 20px;
            width: 100%;
        }

        .panel:hover {
            background-color: #28282B;
            color: white;
        }
    </style>
@endsection

@section('headerImage')
    {{url('/images/background.jpg')}}
@endsection

@section('subject')
    Welcome
@endsection

@section('content')
    <div class="row">
        @foreach($sections as $section)
            <div class="col-md-4">
                <a href="{{route('Web.Section.Index',['id'=>$section->id])}}">
                    <div class="panel">
                        <label>{{$section->name}}</label>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
