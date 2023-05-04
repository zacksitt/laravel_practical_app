<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>
    <body class="antialiased">
        <div class="container mt-5">
            <h1>Register Form</h1>
            <form method="POST" action="api/register">
                <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                    <input type="type" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                    <input type="type" class="form-control" name="phone" id="phone">
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
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="form-control btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
    </body>
</html>
