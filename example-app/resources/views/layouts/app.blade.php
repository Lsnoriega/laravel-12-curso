<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curse - Laravel 12</title>
    <!-- Centered viewport -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>
</head>
<body>
    <main>
    <section>
        <hgroup>
            
             <h1>Laravel <span style="color: #D93526;">12</span></h1>
             <br>
             <h3><a href="{{ route('inicio') }}">Inicio</a> | <a href="{{ route('suma') }}">Suma</a></h3>
        
        </hgroup>
    </section>
    
        @yield('content')

    </main>
</body>
</html>

<style>

    body{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

   
</style>