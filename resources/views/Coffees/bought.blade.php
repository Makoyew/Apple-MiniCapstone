@extends('base')

@include('navbar')

@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <h1 class="text-center text-white">Bought Coffees</h1>
        @if(session('status'))
            <div id="statusMessage" class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-4">
            @forelse($boughtCoffees as $coffee)
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: #8B4513; border: none;">
                        <div class="circle-image mx-auto overflow-hidden">
                            <img src="{{ asset('https://somedayilllearn.com/wp-content/uploads/2020/05/cup-of-black-coffee-scaled-735x614.jpeg') }}" class="rounded-circle card-img-top" alt="Coffee Image">
                        </div>
                        <div class="card-body text-white">
                            <h5 class="card-title text-center">{{ $coffee->name }}</h5>
                            <p class="card-text"><strong>Price:</strong> ${{ $coffee->price }}</p>
                            <p class="card-text"><strong>Description:</strong> {{ $coffee->description ?: 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-center text-white">You haven't bought any coffees yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function(){
            document.getElementById('statusMessage').style.display = 'none';
        }, 3000);
    });
</script>

