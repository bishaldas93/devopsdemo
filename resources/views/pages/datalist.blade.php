@if(count($data)>0)
@foreach($data->all() as $data)


    <tr>
        <td>{{$data->domain_name}}</td>
        <td>{{$data->domain_type}}</td>
        <td>{{$data->created_at}}</td>
        <td>{{$data->updated_at}}</td>
        <td>
        <a href='{{url("/update/{$data->id}")}}' class="btn btn-primary">Modify</a> |
        <a href='{{url("/delete/{$data->id}")}}' class="btn btn-danger">Delete</a>
        </td>
    </tr>
@endforeach
@endif