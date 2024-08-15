@extends('backend.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->

              <!---error message start---> 
              @if($errors->any())
               @foreach ($errors->all() as $error)
               <div class="ml-3"><p style="color:red;">{{$error}}</p></div>
               @endforeach
               @endif
               <!---error message end --->

               <!---successfull message start --->
               @if(session()->has('message'))
               <div class="alert alert-success">
               {{session()->get('message')}}
                
               </div>
               @endif
              <!---successfull message end --->
              <!-- form start -->
              <form action="/product/store" method="post" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    
    <!-- Title -->
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
    </div>
    
    <!-- Description -->
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control" id="description" placeholder="Enter description"></textarea>
    </div>
    
    <!-- Price -->
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="Enter price">
    </div>
    
    <!-- Image -->
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" name="image" class="form-control-file" id="image">
    </div>
    
    <!-- Brand ID -->
    <div class="form-group">
            <label for="brand_id">Brand</label>
            <select name="brand_id" class="form-control" id="brand_id">
                <option disabled>Select Brand</option>
                @foreach ($brand as $item)
                           <option value="{{$item->id}}">{{$item->title}}</option>

                @endforeach
                <option>Select </option>
            </select>
        </div>
    
    <!-- Category ID -->
    <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id">
                <option disabled>Select category</option>
                @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
        </div>
    
    <!-- Stock -->
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter stock">
    </div>
    
    <!-- Quantity -->
    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity">
    </div>
    
    <!-- Color -->
    <div class="form-group">
      <label for="color">Color</label>
      <input type="text" name="color" class="form-control" id="color" placeholder="Enter color">
    </div>
    
    <!-- Size -->
    <div class="form-group">
      <label for="size">Size</label>
      <input type="text" name="size" class="form-control" id="size" placeholder="Enter size">
    </div>
    
  </div>
  
  <!-- Submit Button -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

            </div>
            <!-- /.card -->





          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection