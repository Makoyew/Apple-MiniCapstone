@extends('base')

@include('navbar')

@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <h1 class="text-center text-white">Coffee Menu</h1>
        <p class="lead text-center text-white">Explore and manage the coffee offerings.</p>
        @if(session('status'))
            <div id="statusMessage" class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="text-center mt-4">
            <a href="{{ route('coffees.create') }}" class="btn btn-success">Add New Coffee</a>
        </div>
        <div class="row mt-4">
            @foreach($coffees as $coffee)
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
                        <div class="card-footer" style="background-color: #8B4513;">
                            <div class="d-flex justify-content-center m-3">
                                <a href="{{ route('coffees.edit', $coffee->id) }}" class="btn btn-primary mx-2">Edit</a>
                                <a href="{{ route('coffees.show', $coffee->id) }}" class="btn btn-info mx-2">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    setTimeout(function(){
        document.getElementById('statusMessage').style.display = 'none';
    }, 3000);
</script>

<style>
    .circle-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
</style>

@endsection
