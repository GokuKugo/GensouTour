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

<body id="top" class="body text-white stop-scrolling container ">
<div class="text-center">
        <a href="/" class="hover d-inline-grid">
            <figure class=""><img src="../img/logo.png" alt="" width="220" class="pt-2"></figure>

        </a>
    </div>
    <div class="paragraph p-5 m-5 postbox mx-auto ">
        <form method="post">
            @csrf
            <div class="form-group pt-3">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                        {{ $message }}
                    @enderror
            </div>
            <div class="form-group pt-3">
                <label for="password_confirmation">New Password Confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                        {{ $message }}
                    @enderror
            </div>

            <div class="form-group pt-3 text-center">
                <button type="submit" name="reset" class="btn custombtn"><span>Reset</span></button>
            </div>

            <a href="/profile" class="float-start footertext">←</a>

        </form>
    </div>

</body>
</html>
