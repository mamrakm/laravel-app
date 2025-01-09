<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>
<h1>Add Customer</h1>

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name') <p style="color: red;">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
        @error('phone') <p style="color: red;">{{ $message }}</p> @enderror
    </div>
    <div>
        <button type="submit">Add Customer</button>
    </div>
</form>
</body>
</html>
