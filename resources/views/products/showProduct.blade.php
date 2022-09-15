@extends('layouts._app')

@section('content')

   <form  action="{{route('product.index')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">
          @foreach($products as $porduct)
    
       <div class="col-lg-3 col-8"> 
        <div class="card">
             <img class="card-img-top" src="{{ asset('uploaded_file/Porducts/'.$porduct->photos ?? "") }}" alt="Card image cap">
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



