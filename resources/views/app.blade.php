<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <title>Todozillo</title>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> --}}

        @routes
        @vite('resources/js/app.js', 'resources/js/navanimation.js')
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @inertiaHead
    </head>
    <body
    class="
    bg-cover bg-bottom bg-no-repeat
    {{-- bg-[url('/public/images/IMG_001.jpg')] --}}
    bg-[var(--beige)]
    text-[color:var(--black)]
    text-base
    font-medium
    min-h-screen
    ">
        @inertia

        {{-- <script type="module">
            $(".target").on("click", function(){
                alert("Thanks no JQUERY");
            });
        </script> --}}
    </body>
</html>
