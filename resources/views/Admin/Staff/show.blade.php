@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Staff Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $staff->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $staff->email }}</p>
            <p class="card-text"><strong>Position:</strong> {{ $staff->position }}</p>
            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('staff.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
