<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bind Ferri - Minimalist Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('style.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<header>
    <nav class="navbar">
        <a href="/index.php"><img src="/images/logo-2.png" alt=""></a>
        <i class="fas fa-bars menu_icon toggle"></i>
        <ul class="navbar__menu">
            @if(request()->is('/'))
            <li><a href="#about-me">About Me</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
            @endif
            @auth
                @if(!request()->is('admin*'))
                <li><a href="/admin">Admin</a></li>
                @endif
                <li><form action="/logout" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form></li>
            @else
                <li><a href="login">Log In</a></li>
            @endauth
        </ul>
    </nav>
</header>

{{$slot}}

<footer class="footer">
    <div class="footer__social-media">
        <ul class="navbar__menu center">
            <li><a href="https://www.facebook.com/brindiii/" target="_blank"><img src="/images/facebook.png" alt=""></a></li>
            <li><a href="https://www.instagram.com/bindferri/" target="_blank"><img src="/images/instagram.png" alt=""></a></li>
            <li><a href="https://github.com/bindferri" target="_blank"><img src="/images/github.png" alt=""></a></li>
        </ul>
    </div>
    <div>
        <p class="footer__content">2022 &copy; BIND FERRI - ALL RIGHTS RESERVED</p>
    </div>
</footer>

</body>
</html>
