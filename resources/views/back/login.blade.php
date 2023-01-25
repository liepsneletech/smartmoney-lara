<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartmoney | {{ $pageTitle }}</title>
    <!-- fontawesome -->
    <link
        href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- styles -->
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>

<body>

    <main class="main-login container login-block">


        <div>
            <img src="./assets/img/logo-super-dark.png" alt="SmartMoney logo" class="login-logo">


            <form class="login-form" action="{{ route('login') }}" method="post">
                @csrf
                <div>
                    <input type="email" id="email" placeholder="Įrašykite el. paštą" name="email">
                </div>
                <div>
                    <input type="password" id="pass" placeholder="Įrašykite slaptažodį" name="password">
                </div>

                <button type="submit" class="btn-main btn-green btn-submit">Prisijungti</button>
            </form>

            <p class="bank-name">SmartMoney</p>

            @error('email')
                <p class="error-red">{{ $message }}</p>
            @enderror

            @error('password')
                <p class="error-red">{{ $message }}</p>
            @enderror

            @if (session()->has('error-login'))
            <p class="error-red">{{ Session::get('error-login') }}</p> @endif

            @if (session()->has('success-logout'))
            <p class="success-green">{{ Session::get('success-logout') }}</p> @endif

        </div>

    </main>
    <footer class="footer">

    Visos teisės saugomos &copy; <?php echo date('Y'); ?>

    </footer>

    </body>

</html>
