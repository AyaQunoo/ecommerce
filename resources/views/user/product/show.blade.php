@extends('user.partials.layout')
@section('content1')




<div class="banner header"></div>
<div class="d-flex justify-content-center align-items-center mt-4">
    <div class="card  shadow-lg">
      <div class="row g-0">
        <div class="col-md-5">
          <img src="{{ asset("storage/$product->image") }}" class="img-fluid rounded-start" alt="{{ $product->name }}" style="height: 100%; object-fit: cover;">
        </div>
  
        <div class="col-md-7">
          <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            <h4 class="text-success mb-3">${{ number_format($product->price, 2) }}</h4>
            
            <p class="card-text text-muted">{{ $product->desc }}</p>
  
            <p class="mt-3"><strong>Available Quantity:</strong> {{ $product->quantity }}</p>
            
            <p><strong>Reviews:</strong> ⭐ 4.5 (24 reviews)</p>
  
            <div class="d-flex gap-2 mt-4">
              <form method="POST" action="{{ url("addToCart/$product->id") }}">
                @csrf
                <button type="submit" class="btn btn-primary">Add to Cart 🛒</button>
              </form>
  
              <form method="POST" action="">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Add to Favorites ❤️</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  
@endsection