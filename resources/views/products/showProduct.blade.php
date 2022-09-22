@extends('layouts._app')

@section('content')

   <form  action="{{route('product.index')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">
          @foreach($products as $porduct)
    
       <div class="col-4  d-flex  justify-content-between pt-19px" > 
        <div class="card">
             <img class="card-img-top" src="{{ asset('uploaded_file/Porducts/'.$porduct->photos ?? "") }}" alt="Card image cap" style="height: 50%">
          <div class="card-body">
            <h4>{{ $porduct->ProductTitle }}</h4>
            <p class="card-text">{{ $porduct->Descripion }}</p>
     
          </div>
        </div>
        
      </div>
    @endforeach
   
        
      </div>
</form>

@endsection



