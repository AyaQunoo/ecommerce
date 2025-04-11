@extends('admin.layout')
@section('body')


<div class="card-body">
  <form method="POST" action="{{url("/product/$product->id")}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" value="{{$product->name}}"
      class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    @error('name')
        <p>{{$message}}</p>
    @enderror

    <div class="form-group">
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc"value="{{$product->desc}}"
         class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc">{{$product->desc}}</textarea>
      </div>
      @error('desc')
      <p>{{$message}}</p>
  @enderror

      <div class="form-group">
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price"
        value="{{$product->price}}"
        class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>
      @error('price')
      <p>{{$message}}</p>
  @enderror

      <div class="form-group">
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="quantity" 
        value="{{$product->quantity}}"
        class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
      </div>
      @error('quantity')
      <p>{{$message}}</p>
  @enderror

      <div class="form-group">
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      @error('image')
      <p>{{$message}}</p>
  @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
@endsection