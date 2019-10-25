@extends('layouts.app')
<br/>
@section('content')
<br/>
<h1>Devops</h1>
<br/>
<script type="text/javascript">
        $(document).ready(function() {
            setInterval(function () {
                $('#row').load('devops.blade.php')
            }, 3000);
        });
</script>

<div class="container">
    <div class="row">
        @if(session('info'))
        <div class="col-mg-6 alert alert-success">
            {{session('info')}}
        </div>
        @endif
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Domain Name</th>
                <th scope="col">Domain Type</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="data-rows">
               
            </tbody>
          </table> 
    </div>
</div>
<script type="text/javascript">
        $.get("{{ URL::to('/readData') }}",function(data){
            $('#data-rows').empty();
            $.each(data,function(i,value){
                var tr =$("<tr/>");
                    tr.append($("<td/>",{
                        text : value.domain_name
                    })).append($("<td/>",{
                        text : value.domain_type
                    })).append($("<td/>",{
                        text : value.created_at
                    })).append($("<td/>",{
                        text : value.updated_at
                    })).append($("<td/>",{
                        html: "<a href='#' class='btn btn-primary'>Modify</a> <a href='#' class='btn btn-danger'>Delete</a>"
                    }))
                $('#data-rows').append(tr);
            });
        })

</script>

@endsection
