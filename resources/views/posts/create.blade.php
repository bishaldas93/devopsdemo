@extends('layouts.app');

@section('content')
    <br/>
   <h1>Create Posts</h1>
   {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{form::label('title','Title')}}
            {{form::text('title','',['class' => 'form-control','placeholder'=>'Title'])}}
        </div>

        <div class="form-group">
                {{form::label('body','Body')}}
                {{form::textarea('body','',['id'=>'editor','class' => 'ckeditor','placeholder'=>'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection