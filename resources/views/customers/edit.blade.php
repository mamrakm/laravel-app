<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Edit Customer</h1>
        <a href="{{ route('customers.index') }}" class="btn-primary">Back to Customer List</a>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('customers.update', $customer) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" required>
        </div>

        <button type="submit" class="btn-submit">Update Customer</button>
    </form>
</div>

<!-- Footer -->
<footer class="footer">
    <p>&copy; {{ date('Y') }} My Laravel App</p>
</footer>
</body>
</html>
