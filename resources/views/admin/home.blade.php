@extends('admin.layout')
@section('body')
<div class="card-body">
    <h4 class="card-title">Products</h4>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th> Name </th>
            <th> Description </th>
            <th> Price </th>
            <th> Quantity </th>
            <th> Image </th>
        
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
         
           
                <td> {{$product->name}} </td>
                <td>{{$product->desc}} </td>
                <td> {{$product->price}} </td>
                <td> {{$product->quantity}}  </td>
                <td>
                    <img src="{{asset("storage/$product->image")}}" alt="image" />
                   
                  </td>
                  <td> <a href="{{url("/products/edit/$product->id")}}">Edit</a>  </td>
                  <td> <form action="{{url("/product/$product->id")}}" method="POST">
                    @csrf
                    @method("DELETE")
                  <input type="submit" value="DELETE">
                  </form> </td>

                
                
              </tr>
            @endforeach
          
      
        </tbody>
      </table>
    </div>
  </div>
@endsection