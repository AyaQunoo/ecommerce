@extends('user.partials.layout')
@section('content1')




<div class="banner header"></div>
<div class="container mt-4">
    @foreach ($cart as $id => $data)
        <div class="card mb-4 shadow-lg">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset("storage/{$data['image']}") }}" class="img-fluid rounded-start" alt="{{ $data['name'] }}" style="height: 100%; object-fit: cover;">
                </div>

                <div class="col-md-7">
                    <div class="card-body">
                        <h2 class="card-title">{{ $data['name'] }}</h2>
                        <h4 class="text-success mb-3">${{ number_format($data['price'], 2) }}</h4>
                        <p class="mt-3"><strong>Available Quantity:</strong> {{ $data['quantity'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{url("makeorder")}}" method="POST">
            @csrf
            <button type="submit">MakeOrder</button>
        </form>
    @endforeach
</div>


  
@endsection