<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel = "stylesheet" href="{{asset('css/estilo_basico.css')}}">
    </head>

    <body>
        @yield('principal')
        @yield('sobre-nos')
        @yield('contato')
    </body>
</html>