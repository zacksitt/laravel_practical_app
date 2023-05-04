@extends('layout')
@section('content')
    <section class="content">
    <h1>Register Form</h1>
    <form method="POST" action="api/v1/create">
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
            <input type="type" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
            <input type="type" class="form-control" name="phone" id="phone"  required>
        </div>
        <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
        </div>
        <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" name="gender" id="name">
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email"  required>
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password"  required>
        </div>
        <div class="mb-3">
            <button type="submit" class="form-control btn btn-success">Submit</button>
        </div>
    </form>
    </section>
@endsection

