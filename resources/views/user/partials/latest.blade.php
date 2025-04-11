<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>

        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="product-item">
              <a href="{{url("/product/$product->id")}}"><img src="{{asset("storage/$product->image")}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->name}}</h4></a>
                <h6>{{$product->price}}</h6>
                <p>{{$product->desc}}</p>
                <ul class="stars">
                  {{$product->quantity}}
                </ul>
                <form action="{{url("addToCart/$product->id")}}" method="POST">
                  @csrf  
                  <input type="number" name="quantity">
                    <button type="submit" class="btn btn-info">AddToCart</button>
                </form>
                @auth
                <form method="POST" action="{{url("addToFav/$product->id")}}">
                  @csrf

                  <button type="submit" style="border:none; background:none">
        @if($product->isFavorites())
                    <div class="fa fa-heart"  style="color: red"></div>
                    @else
                    <div class="fa fa-heart" style="color: gray"></div></button>
                  @endif
                  </button>
                </form>
                @endauth
               
              </div>
            </div>
          </div>
        @endforeach
        
    
      </div>
    </div>
  </div>