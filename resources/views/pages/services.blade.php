@extends('layouts.app')
<br/>
@section('content')
<br/>
    <h1>{{$title}}</h1>
        @if(count($services)>0)
            <ul class="list-group-item">    
                @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
            </ul>
        @endif
@endsection
