@include('test.header')
<div class="container"> <br><br>
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card shadow">
                <div class="p-4">
                    <h5 class="text-center text-primary">
                        Upload New Products
                    </h5><br>
                    <form action="" id="app" enctype="multipart/form-data">
                        <div class="row">
                            {{ @csrf_field() }}
                            <div class="col-md-2"><b>Product </b></div>
                            <div class="col-md-10">
                                <input type="text" placeholder="Product Name" class="form-control"
                                    name="product"><br>
                            </div>
                            <div class="col-md-2"><b>Image </b></div>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="file"><br>
                            </div>
                            <div class="col-md-2"><b>Price </b></div>
                            <div class="col-md-10">
                                <input type="number" placeholder="Price" class="form-control" name="price"
                                    min="1"><br>
                            </div>
                        </div>
                        <center><br>
                            <input type="submit" class="btn btn-primary" id="btn" value="Upload">
                        </center>
                    </form>
                    <br>
                    <center>
                        <a href="{{ url('Products') }}">View Products</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
    @include('test.footer')
