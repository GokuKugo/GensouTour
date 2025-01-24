<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('../css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('../css/bootstrap.css')}}">
    <script src="{{asset('../js/bootstrap.bundle.js')}}"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo2.png">
    <title>Gensou Tour</title>
</head>

<body id="top" class="body text-white container ">
    <div class="text-center">
        <a href="/" class="hover d-inline-grid">
            <figure class=""><img src="../img/logo.png" alt="" width="220" class="pt-2"></figure>

        </a>
    </div>
    <div class="paragraph p-5 postbox mx-auto ">
        <form method="post">
            @csrf
          <div class="form-group pt-3">
                <label for="name">Your username <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                        {{ $message }}
                    @enderror
            </div>
            <div class="form-group pt-3">
                <label for="email">Email address <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                {{ $message }}
            @enderror
            </div>
            <div class="form-group pt-3">
                <label for="phone">Phone Number<span class="text-danger">*</span></label>
                <input class="form-control" type="tel" id="phone" name="phone">
                @error('phone')
                {{ $message }}
            @enderror
            </div>
            <div class="form-group pt-3">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input class="form-control" id="password" type="password" name="password">
                @error('password')
                {{ $message }}
            @enderror
            </div>
            <div class="form-group pt-3">
                <label for="password_confirm">Password Confirm<span class="text-danger">*</span></label>
                <input class="form-control" id="password_confirm" type="password" name="password_confirm">
                @error('password_confirm')
                {{ $message }}
            @enderror
            </div>
            Password must contain: <br>
            <ul style="list-style-type:none;">
                <li>- At least 8 character</li>
                <li>- A number</li>
                <li>- An uppercase character</li>
            </ul>
            <div class="form-group pt-3 text-center ">
            <button type="submit" name="login" class="btn custombtn"><span>Register</span></button>
            </div>
            <div class="form-group pt-3">
                <a href="index.php" class="float-start footertext">←</a>
            </div>
        </form>
    </div>
</body>
</html>
