@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header">
            <h1>Add New Customer</h1>
            <a href="{{ route('customers.index') }}" class="btn-primary">Back to Customers</a>
        </div>

        @if ($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <button type="submit" class="btn-submit">Add Customer</button>
        </form>
    </div>
@endsection
