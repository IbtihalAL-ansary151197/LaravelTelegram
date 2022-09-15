@extends('layouts._app')

@section('ProductTables')
    


@if (session('status'))
 
<h6 class="alert alert-success">{{session('status')}}</h6>
    
@endif
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Product</h3>
    </div>
    <!-- /.card-header -->
    
@if (session('status'))
 
<h6 class="alert alert-success">{{session('status')}}</h6>
    
@endif
    <!-- form start -->
    <form  action="{{ route('products.update',['id'=>$porducts->id ?? 0 ])}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" name="ProductTitle" class="form-control" id="exampleInputEmail1" value="{{ old('Name',$porducts->ProductTitle )}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Descripion</label>
          <input type="text" name="Descripion" class="form-control" id="exampleInputEmail1" value="{{ old('Name',$porducts->Descripion )}}">
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
        <button type="submit" class="btn btn-primary">Save Product</button>
      </div>
    </form>
  </div>
  
  @endsection