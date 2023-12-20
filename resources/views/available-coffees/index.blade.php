<!-- resources/views/available-coffees/index.blade.php -->

@extends('base')

@include('navbar')

@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <h1 class="text-center text-white">Available Coffees</h1>
        <div class="row mt-4">
            @forelse($availableCoffees as $coffee)
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: #8B4513; border: none;">
                        <div class="circle-image mx-auto overflow-hidden">
                            <img src="{{ asset('https://somedayilllearn.com/wp-content/uploads/2020/05/cup-of-black-coffee-scaled-735x614.jpeg') }}" class="rounded-circle card-img-top" alt="Coffee Image">
                        </div>
                        <div class="card-body text-white">
                            <h5 class="card-title text-center">{{ $coffee->name }}</h5>
                            <p class="card-text"><strong>Price:</strong> ${{ $coffee->price }}</p>
                            <p class="card-text"><strong>Description:</strong> {{ $coffee->description ?: 'N/A' }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $coffee->available ? 'Available' : 'Not Available' }}</p>
                        </div>
                        <div class="card-footer" style="background-color: #8B4513; display: flex; justify-content: center;">
                            <a href="{{ route('coffees.show', $coffee->id) }}" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-center text-white">No available coffees at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
