@include('test.header')
<div class="row">
    @foreach ($data as $item)
        <div class="col-md-3 my-3">
            <div class="card shadow">
                <div class="p-4">
                    <div class="card-header text-center"><img src="product/{{ $item->photo }}" width="100"
                            class="img img-thumbnail" alt=""></div>
                    <div class="card-body">
                        <h5 class="text-center text-primary">{{ $item->product }}</h5>
                        <h5 class="text-center text-success">&#8377;
                            {{ $item->price }}</h5>
                    </div>
                    <div class="card-footer">
                        <center>
                            <a href="{{ url('Buy') }}/{{ $item->id }}" class="btn btn-primary">Buy Now</a>
                        </center>

                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
@include('test.footer')
@if (session('scc'))
    <script>
        swal({
            title: 'Payment Successfull',
            icon: 'success'
        });
    </script>
@endif
@if (session('err'))
    <script>
        swal({
            title: 'Payment Failed',
            icon: 'error'
        });
    </script>
@endif
