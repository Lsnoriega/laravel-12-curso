<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos</title>
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
            
             <h1>Hola Mundo - Laravel 12</h1>
             <p>Contenido de la página de inicio.</p>
             <br>
        
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