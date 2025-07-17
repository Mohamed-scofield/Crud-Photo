@extends('layouts.app')

@section('title', 'Student List')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="text-muted fw-bold mb-0">Student List</h4>
                        <a href="{{ route('Notes.create') }}" class="btn btn-primary">Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Photos</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr class="text-center">
                                        <th scope="row">{{ $student->id }}</th>
                                        <td>{{ $student->nom }}</td>
                                        <td>{{ $student->prenom }}</td>
                                        <td>
                                            @if ($student->photo)
                                                <img src="{{ asset('storage/' . $student->photo) }}"
                                                    alt="Photo de {{ $student->nom }}"
                                                    style="width: 60px; height: 50px; border-radius: 50%;">
                                            @else
                                                <span class="text-muted">Aucune photo</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($student->notes->isNotEmpty())
                                                @foreach ($student->notes as $note)
                                                    <div>{{ $note->matiere }}: <strong>{{ $note->note }}/20</strong></div>
                                                @endforeach
                                            @else
                                                <span class="text-muted">Aucune note</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('Notes.show', $student) }}" class="btn btn-info mb-1"
                                                title="Show detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ route('Notes.edit', $student) }}" class="btn btn-primary mb-1"
                                                title="Edit student">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('Notes.destroy', $student) }}" method="post"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger mb-1 btn-delete"
                                                    title="Delete student">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-danger">Aucun étudiant pour le moment !
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success !',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 1500
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Confirmer la suppression ?',
                    text: "Cette action est irréversible.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
@endpush
