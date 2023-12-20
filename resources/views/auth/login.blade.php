@extends('base')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100"> <!-- Center both horizontally and vertically -->
        <div class="col-md-6">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card">
                <div class="card-header text-center" style="background-color: #8B4513; color: #fff;">
                    <h1><i class="fas fa-coffee"></i> Apple's Coffee Shop</h1>
                </div>
                <div class="card-body">
                    <form action="{{ '/' }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ '/register' }}" style="color: #8B4513;">Don't have an account yet?</a>
                                <button class="btn btn-success mt-2" type="submit" style="background-color: #8B4513;">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
