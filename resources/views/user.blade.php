@include('header')

<table class="table">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>City</th>
            <th>Date</th>
            <th>Trash Data</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td><img width="60" class="img-thumbnail" src="{{asset('storage/uploads/'.$item->photo)}}" alt="photo"></td>
            <td>{{$item->name}}</td>
            <td>{{$item->number}}</td>
            <td >{{$item->gender}}</td>
            <td>{{$item->city}}</td>
            <td>{{$item->dob}}</td>
            <td><a href="{{url('user/trash')}}/{{$item->id}}" class="btn btn-warning">Trash</a></td>
            <td><a href="{{url('user/edit')}}/{{$item->id}}" class="btn btn-primary">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row ">
{{$data->links()}}
</div>

   
   
@include('footer')
