<html>
    <head>
        <title>{{ $title ?? 'My Blog' }}</title>
    </head>
    <body>
        {{ $slot }}
        <div class="h-card" style="margin: 1em 0;">
            &copy; 2022
            <a class="p-name u-url" href="https://matthewpennell.com/">Matthew Pennell</a>
        </div>
    </body>
</html>
