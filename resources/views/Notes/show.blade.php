@extends('layouts.app')

@section('title', 'Detail student')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-muted fw-bold">Student Detail</h3>
                        <a href="{{ route('Notes.index') }}" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <p><strong>First Name:</strong> {{ $student->nom }}</p>
                        <p><strong>Last Name:</strong> {{ $student->prenom }}</p>
                        @if ($student->notes->isNotEmpty())
                            @foreach ($student->notes as $note)
                                <div>{{ $note->matiere }}: <strong>{{ $note->note }}/20</strong>
                                </div>
                            @endforeach
                        @else
                            <span class="text-muted">Aucune note</span>
                        @endif
                        <p><strong>Email:</strong> {{ $student->email }}</p>
                        @if ($student->photo)
                            <img src="{{ asset('storage/' . $student->photo) }}" alt="photo de  {{ $student->nom }}"
                                class="img-thumbnail" style="with:150px;height:150px">
                        @else
                            <p>Aucune photo disponible.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
