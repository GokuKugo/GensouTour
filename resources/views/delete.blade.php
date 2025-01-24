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
<body id="top" class="body text-white container">
    <div class="text-center">
        <a href="/" class="hover d-inline-grid">
            <figure><img src="../img/logo.png" alt="Shinsekai Group" width="220" class="pt-2"></figure>
        </a>
    </div>
    <div class="paragraph p-5 m-5 postbox mx-auto">
        <form method="post">
            @csrf
            <div class="form-group pt-3">
                <label for="delete">type DELETE in order to confirm your account removal</label>
                <input autocomplete="off" id="delete" type="text" name="delete" class="form-control">
                @error('delete')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group pt-3 text-center">
                <button type="submit" name="deleteacc" class="btn custombtn"><span>Delete Account</span></button>
            </div>
            <a href="/profile" class="float-start footertext">←</a>
        </form>
    </div>
</body>
</html>
