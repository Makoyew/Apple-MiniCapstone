<!-- resources/views/available-coffees/show.blade.php -->

@extends('base')

@include('navbar')

@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <div class="row mt-4">
            <div class="col-md-4 mx-auto">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
                <div class="card" style="background-color: #8B4513; border: none;">
                    <img src="{{ asset('https://somedayilllearn.com/wp-content/uploads/2020/05/cup-of-black-coffee-scaled-735x614.jpeg') }}" class="card-img-top" alt="Coffee Image">
                    <div class="card-body">
                        <h1 class="text-center text-white">{{ $coffee->name }}</h1>
                        <p class="card-text text-white"><strong>Price:</strong> ${{ $coffee->price }}</p>
                        <p class="card-text text-white"><strong>Description:</strong> {{ $coffee->description ?: 'N/A' }}</p>
                        <p class="card-text text-white"><strong>Status:</strong> {{ $coffee->available ? 'Available' : 'Not Available' }}</p>
                    </div>
                    <div class="card-footer text-center" style="background-color: #8B4513;">
                        @role('costumer')
                        @if ($coffee->available)
                            <form method="POST" action="{{ route('coffees.buy', $coffee->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Buy</button>
                            </form>
                        @endif
                        @endrole
                        @role('admin')
                        <form method="POST" action="{{ route('coffees.destroy', $coffee->id) }}" onsubmit="return confirm('Are you sure you want to delete this coffee?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
