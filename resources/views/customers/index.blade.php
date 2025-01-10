<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Customer List</h1>
        <a href="{{ route('customers.create') }}" class="btn-primary">Add New Customer</a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table of Customers -->
    @if ($customers->isEmpty())
        <p>No customers found.</p>
    @else
        <div class="table">
            <!-- Table Header -->
            <div class="table-header">
                <div>Name</div>
                <div>Email</div>
                <div>Actions</div>
            </div>

            <!-- Table Rows -->
            @foreach ($customers as $customer)
                <div class="table-row">
                    <div>{{ $customer->name }}</div>
                    <div>{{ $customer->email }}</div>
                    <div>
                        <a href="{{ route('customers.edit', $customer) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Footer -->
<footer class="footer">
    <p>&copy; {{ date('Y') }} My Laravel App</p>
</footer>
</body>
</html>
