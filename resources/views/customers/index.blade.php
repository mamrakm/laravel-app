<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
</head>
<body>
<h1>Customer List</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('customers.create') }}">Add New Customer</a>

<table border="1" style="width: 100%; margin-top: 20px;">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4" style="text-align: center;">No customers found</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
