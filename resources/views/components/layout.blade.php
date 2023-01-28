<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartmoney | {{ $pageTitle }}</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <!-- fontawesome -->
    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- styles -->
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <script src="/assets/js/app.js" defer></script>
</head>

<body>

    <header class="header">

        <div class="header-content-box container">
            <a href="/"><img src="/assets/img/logo-dark+.png" alt="SmartMoney logo"
                    class="header-logo-desktop"><img src="/assets/img/logo-dark-mobile.png" alt="SmartMoney logo"
                    class="header-logo-mobile"></a>
            <nav class="main-nav">
                <a class="nav-link {{ $pageTitle === 'Sąskaitų sąrašas' ? 'active' : '' }}"
                    href="{{ route('show-accounts') }}">Sąskaitos</a>
                <a class="nav-link {{ $pageTitle === 'Sąskaitos kūrimas' ? 'active' : '' }}"
                    href="{{ route('create-account') }}">Sukurti
                    sąskaitą</a>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="nav-link logout-btn" type="submit">Atsijungti<i
                            class="fa-solid fa-arrow-right-from-bracket logout-icon"></i></button>
                </form>


            </nav>
        </div>

    </header>

    @yield('content')

    <footer class="footer">

        Visos teisės saugomos &copy; <?php echo date('Y'); ?>

    </footer>

</body>

</html>
