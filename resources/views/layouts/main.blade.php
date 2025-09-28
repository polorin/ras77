<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RAS77 - Situs Slot Online No.1 Indonesia')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        ::-webkit-scrollbar-thumb {
            background: #fbbf24;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #f59e0b;
        }
        
        /* Animasi */
        @keyframes slideInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .slide-in-up {
            animation: slideInUp 0.5s ease-out;
        }
        
        /* Gradient background */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Jackpot animation */
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>
    @stack('styles')
</head>
<body class="text-white" style="background-color: {{ $settings['main_bg_color'] ?? '#111827' }};">
    <!-- Include Header -->
    @include('components.header', ['settings' => $settings ?? []])
    
    <!-- Main Content dengan padding untuk header dan bottom nav -->
    <main class="pt-16 pb-16 min-h-screen">
        @yield('content')
    </main>
    
    <!-- Include Bottom Navigation -->
    @include('components.bottom-nav', ['settings' => $settings ?? []])
    
    @stack('scripts')
</body>
</html>