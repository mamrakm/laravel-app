<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<h1>Customer List</h1>
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
<div class="container">
    <div class="header">
        <h2>Customers</h2>
        <a href="{{ route('customers.create') }}">Add New Customer</a>
    </div>

    <div class="table">
        <div class="table-header">
            <div>ID</div>
            <div>Name</div>
            <div>Email</div>
            <div>Phone</div>
        </div>
        @forelse ($customers as $customer)
            <div class="table-row">
                <div>{{ $customer->id }}</div>
                <div>{{ $customer->name }}</div>
                <div>{{ $customer->email }}</div>
                <div>{{ $customer->phone }}</div>
            </div>
        @empty
            <div class="table-row">
                <div colspan="4" style="grid-column: 1 / -1; text-align: center;">
                    No customers found.
                </div>
            </div>
        @endforelse
    </div>
</div>

<div class="footer">
    &copy; {{ date('Y') }} My Laravel App
</div>
</body>
</html>
