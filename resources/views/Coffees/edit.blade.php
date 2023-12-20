@extends('base')

@include('navbar')

@section('content')
<div class="container-fluid">
    <div class="container mt-5">
        <h1 class="text-center text-white">Edit Coffee</h1>

        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <div class="card" style="background-color: #8B4513;">
                    <div class="card-body">
                        <form action="{{ route('coffees.update', $coffee->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name" class="text-white">Coffee Name:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-coffee"></i></span>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $coffee->name }}" required>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="price" class="text-white">Price:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="number" id="price" name="price" step="0.01" class="form-control" value="{{ $coffee->price }}" required>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="description" class="text-white">Description:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    <textarea id="description" name="description" class="form-control">{{ $coffee->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-check">
                                    <input type="hidden" name="available" value="0">
                                    <input type="checkbox" id="available" name="available" value="1" {{ $coffee->available ? 'checked' : '' }} class="form-check-input">
                                    <label class="form-check-label text-white" for="available">Available</label>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update Coffee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
