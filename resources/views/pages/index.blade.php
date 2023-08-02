@include('layouts.header')

<h1>Customer List</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Other Information</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->contact_number }}</td>
                    <td>{{ $customer->other_information }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                        </form>
                        <form action="{{ route('customers.send-promotional-email', $customer) }}" method="POST" style="display: inline-block">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Send Promotional Email</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@include('layouts.Footer')