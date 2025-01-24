<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo2.png">
    <title>Gensou Tour</title>
</head>

<body id="top" class="body text-white container ">
<div class="text-center">
        <a href="/" class="hover d-inline-grid">
            <figure class=""><img src="../img/logo.png" alt="" width="220" class="pt-2"></figure>

        </a>
    </div>
    <div class="paragraph p-5 m-5 postbox mx-auto ">
        <form method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email or Phone number</label>
                <input type="text" id ="email" name="email" class="form-control">
                @error('email')
                        {{ $message }}
                    @enderror
            </div>
            <div class="form-group pt-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                        {{ $message }}

                @enderror

            </div>
            <div class="form-group pt-3 text-center">
                <button type="submit" name="login" class="btn custombtn"><span>Login</span></button>
            </div>
            <div class="form-group pt-3">
                <a href="/" class="float-start footertext">←</a>
                <a href="/register" class="float-end footertext text-warning">Register</a>
            </div>


        </form>
    </div>

</body>

</html>
