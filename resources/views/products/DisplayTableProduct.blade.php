
@extends('layouts._app')

@section('ProductTables')
    

<div class="card">
  <div class="card-header">
    <h3 class="card-title">All porducts</h3>
  </div>

  @if (session('Messages'))
 
<h6 class="alert alert-success">{{session('Messages')}}</h6>
    
@endif

@if (session('MessagesDeleted'))
 
<h6 class="alert alert-danger">{{session('MessagesDeleted')}}</h6>
    
@endif
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Descripion</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
      </thead>

      <tbody>
        @foreach ($proTable as $porduct)
             
        
      <tr>
        <td>{{ $porduct->id }}</td>
        <td>{{ $porduct->ProductTitle }}</td>
        <td>{{ $porduct->Descripion }}</td>
        <td>
        <img class="card-img-top"  class="img-thumbnail" src="{{ asset('uploaded_file/Porducts/'.$porduct->photos ?? "") }}" alt="Card image cap">
        </td>
        <td> 
        
          <a href="{{ route('product.edit', ['porducts' => $porduct->id ?? 0 ]) }}" class="btn btn-block btn-success">Edit</a>
         
          <a href="{{ route('Product.destroy', ['id' => $porduct->id ?? 0 ]) }}" onclick="return confirm('Are You Sure You Want To Delete This Data') " class="btn btn-block btn-danger btn-flat">Delated</a
           
        </td> 
        
  
      </tr>
      
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>


@endsection
