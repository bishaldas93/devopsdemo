@extends('layouts.app')
@section('content')
<br/>
<h1>Add Record</h1>
<br/>
<form class="form-horizontal" method="POST" action="{{ url('/insert') }}" enctype = "multipart/form-data">
  {{csrf_field() }}
    <fieldset>
      <div class="form-group">
        <label for="Domain_Name">Domain Name</label>
        <input name="domain_name" type="text" class="form-control" id="domain_name" placeholder="Enter Domain Name">
      </div>
      
      <div class="form-group">
        <label for="Domain_Type">Domain Type</label>
        <input name="domain_type" type="text" class="form-control" id="domain_type" placeholder="Enter Domain Type">
      </div>

      <div class="form-group">
        <label for="HeaderImage">Header Logo</label>
        {{Form::file('header_image')}}
      </div>

      <div class="form-group">
          <label for="FooterImage">Footer Logo</label>
          {{Form::file('footer_image')}}
        </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
@endsection
