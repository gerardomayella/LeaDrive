@extends('layouts.app') <!-- Pastikan layout utama sudah dibuat -->

@section('content')
<div class="container">
    <h1>Kelola Tutor</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tutor</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tutors as $tutor)
            <tr>
                <td>{{ $tutor->name }}</td>
                <td>{{ $tutor->phone }}</td>
                <td>{{ $tutor->email }}</td>
                <td>
                    <a href="{{ route('tutor.edit', $tutor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tutor.delete', $tutor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('tutor.create') }}" class="btn btn-success">Tambah</a>
</div>
@endsection