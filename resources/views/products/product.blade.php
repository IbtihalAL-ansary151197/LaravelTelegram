
@extends('layouts._app')

@section('content')
    


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Categories</h3>
    </div>


    @if (session('status'))
 
    <h6 class="alert alert-success">{{session('status')}}</h6>
        
    @endif
    <!-- /.card-header -->
    <!-- form start -->
    
  <form  action="{{route('product.store')}}" method="post"  enctype="multipart/form-data">
    @csrf

      <div class="card-body">
        <div class="form-group">
           <label for="exampleInputEmail1">Title</label>
          <input type="text" name="ProductTitle" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Descripion</label>
          <input type="text" name="Descripion" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
        </div>
       
        <div class="form-group">
          <label for="exampleInputEmail1">Photos</label>
          <input type="file" name="photos" class="form-control" id="exampleInputEmail1">
        </div>
       
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add product</button>
      </div>
    </form>
  </div>
  
  @endsection