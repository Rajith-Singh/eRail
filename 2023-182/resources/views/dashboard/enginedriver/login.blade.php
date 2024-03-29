<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/../../css/login2.css">
  <title>Endine Driver Login</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="{{  route('stationmaster.check') }}" method="post">
			@csrf
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email"  name="email" value="{{ Session::get('verifiedEmail') ? Session::get('verifiedEmail') : old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror </span>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button type="submit">Login</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>