@include('layouts.header')

<h1>Add Customer</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="other_information">Other Information</label>
            <textarea name="other_information" id="other_information" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>


@include('layouts.Footer')