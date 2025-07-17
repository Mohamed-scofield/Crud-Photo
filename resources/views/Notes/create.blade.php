@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="text-muted fw-bold mb-0">Add Student</h4>
                        <a href="{{ route('Notes.index') }}" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Notes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="nom" id="first_name" value="{{ old('nom') }}"
                                        class="form-control" placeholder="Enter first name">
                                </div>
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="prenom" id="last_name" value="{{ old('prenom') }}"
                                        class="form-control" placeholder="Enter last name">
                                </div>
                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Enter email">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-camera"></i></span>
                                    <input type="file" name="photo" id="photo" class="form-control"
                                        accept="image/*">
                                </div>
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
