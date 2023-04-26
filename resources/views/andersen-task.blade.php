@extends('layouts.app')

@section('content')
<div class="container">
    <form
        method="POST"
        action="{{ route('andersen-tasks.store') }}">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Name:</label>
            <input
                class="form-control @error('name') is-invalid @enderror"
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="email">Email:</label>
            <input
                class="form-control @error('email') is-invalid @enderror"
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="message">Message:</label>
            <input
                class="form-control @error('message') is-invalid @enderror"
                type="text"
                id="message"
                name="message"
                value="{{ old('message') }}"
                required>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr />

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Create Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td class="col-2">{{ $task->name }}</td>
                    <td class="col-2">{{ $task->email }}</td>
                    <td class="col-5">{{ $task->message }}</td>
                    <td class="col-2">{{ $task->created_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
