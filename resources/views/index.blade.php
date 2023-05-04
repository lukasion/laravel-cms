<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="icon" type="image/x-icon" href="favicon-32x32.png">

        @if (!empty($metatags))
            @isset ($metatags['title'])
                <title>{{ $metatags['title'] }}</title>
            @endisset

            @isset ($metatags['description'])
                <meta name="description" content="{{ $metatags['description'] }}" />
            @endisset
        @else
            <title>{{ env('META_TITLE') }}</title>
            <meta name="description" content="{{ env('META_DESCRIPTION') }}" />
        @endif

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}?ver={{ time() }}" />
    </head>
    <body>
        @include ('menu')

        @if (!isset($withoutHeader))
            @include ('header')
        @endif

        @hasSection ('content')
            @yield ('content')
        @endif

        @include ('footer')

        @include ('flash-messages')

        <script src="/js/app.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?render=6LczlZ4iAAAAAFoBRONjtVgk-XctKutho2kRzeTc"></script>
    </body>
</html>
