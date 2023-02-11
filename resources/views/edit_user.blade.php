@include('header')
  <div class="">
     <div class="">
     <form action="update/{{$data->id}}" method="post" >
         <div class="card shadow">
            <div class="p-4">
             <div class="form-group">
                <h4 class="text-center text-primary">Update Form</h4>
            </div> 
            <div class="form-group">
                <input type="text" name="name" value="{{$data->name}}" placeholder="Enter Your Name" class="form-control">
                {{@csrf_field()}}
            </div>
            <div class="form-group">
                <input type="text" name="number" value="{{$data->number}}" placeholder="Enter Mobile Number" class="form-control">
            </div>
            <div class="form-group">
                <select name="gender" id="" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="Male" {{($data->gender === 'Male') ? 'Selected' : ''}}>Male</option>
                    <option value="Female" {{($data->gender === 'Female') ? 'Selected' : ''}}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{$data->city}}" name="city" placeholder="Enter Your City" class="form-control">
            </div>
            <div class="form-group">
                <input type="date" name="dob"  value="{{$data->dob}}"  class="form-control">
            </div>
            {{-- <div class="form-group">
                <input type="password" name="password"  value="{{$data->password}}"  class="form-control" placeholder="Password">
            </div> --}}
            {{-- <div class="form-group">
                <input type="file" name="photo"  class="form-control">
            </div> --}}
            <div class="form-group d-flex">
                <input type="submit" class="btn btn-primary m-auto mt-4" value="Submit" >
            </div>
        </div>
    </div> 
  </form>
  </div>
</div>
@include('footer')