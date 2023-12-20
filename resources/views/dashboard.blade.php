@extends('base')

@include('navbar')

@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <h1 class="text-center text-white">Coffee Dashboard</h1>
        <p class="text-center text-white">Explore and manage your coffee offerings.</p>

        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="card" style="background-color: #8B4513; border: none;">
                    <div class="circle-image mx-auto overflow-hidden">
                        <img src="https://miro.medium.com/v2/resize:fit:1125/1*Nard-jYRBXYLP_-n0H9T0w.jpeg" class="rounded-circle card-img-top" style="height: 300px; object-fit: cover;" alt="Featured Coffee Image">
                    </div>
                    <div class="card-body text-white">
                        <h5 class="card-title text-center">Featured Coffee</h5>
                        <p class="card-text text-center">Discover our special featured coffee.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="background-color: #8B4513; border: none;">
                    <div class="circle-image mx-auto overflow-hidden">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Caffe_Latte.jpg/1077px-Caffe_Latte.jpg" class="rounded-circle card-img-top" style="height: 300px; object-fit: cover;" alt="New Arrivals Image">
                    </div>
                    <div class="card-body text-white">
                        <h5 class="card-title text-center">New Arrivals</h5>
                        <p class="card-text text-center">Explore our latest coffee additions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
