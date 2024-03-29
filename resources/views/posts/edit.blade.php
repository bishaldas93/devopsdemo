@extends('layouts.app');

@section('content')
    <br/>
   <h1>Update Posts</h1>
   {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{form::label('title','Title')}}
            {{form::text('title',$post->title,['class' => 'form-control','placeholder'=>'Title'])}}
        </div>

        <div class="form-group">
                {{form::label('body','Body')}}
                {{form::textarea('body',$post->body,['id'=>'article-ckeditor','class' => 'form-control','placeholder'=>'Body Text'])}}
        </div>
        <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
    
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection