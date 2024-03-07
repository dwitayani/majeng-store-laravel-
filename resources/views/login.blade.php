<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>Login</title>
</head>

<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li> {{ $item }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 login-container">
                <img src="assets/img/majenglogo.png" alt="">
                <form action="#" method="post">
                    @csrf
                    <div class="form-group m-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group m-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
