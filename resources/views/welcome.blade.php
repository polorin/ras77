<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @if(!empty($settings['favicon']))
            <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/favicons/' . $settings['favicon']) }}">
        @endif
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="min-h-screen flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        Welcome to Your Website
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Start building your amazing website from here
                    </p>
                    <div class="space-x-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Get Started
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
