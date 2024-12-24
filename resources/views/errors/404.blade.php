<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        span {
            font-weight: bold; 
            font-size: 2rem; 
            color: #006400;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4); 
        }

        @keyframes smoothSlideUp {
            0% {
                transform: translateY(40px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .smooth-animation {
            animation: smoothSlideUp 0.9s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
    </style>
</head>
<body class="bg-gradient-to-r from-lime-500 to-lime-700 text-white min-h-screen flex items-center justify-center p-6">
    <div class="container mx-auto grid md:grid-cols-2 gap-16 items-center flex-col md:flex-row">
        <div class="text-left space-y-6 md:ml-10">
            <div class="text-9xl font-bold text-white/20 smooth-animation stagger-1">
                404
            </div>
            <h1 class="text-4xl font-semibold mb-4 smooth-animation stagger-2">
                Page Not Found
            </h1>
            <p class="text-white/90 mb-8 text-lg smooth-animation stagger-3">
                <span>Oops!</span>, Kami tidak dapat menampilkan halaman yang Anda cari saat ini.
            </p>
            <div class="flex space-x-4 smooth-animation stagger-4">
                <a href="{{ url('/') }}" class="px-6 py-3 bg-white text-lime-600 rounded-full font-semibold hover:bg-white/90 transition transform hover:scale-105 shadow-md">
                    Kembali
                </a>
            </div>
        </div>
        
        <!-- Bagian Gambar (dihilangkan di tampilan mobile) -->
        <div class="flex justify-center smooth-animation stagger-1 md:block hidden">
            <svg class="w-full max-w-xs md:max-w-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 400">

                <rect x="100" y="50" width="300" height="300" rx="20" fill="#FFFFFF" fill-opacity="0.2"/>
                
                <path d="M100 150 L400 150" stroke="#FFFFFF" stroke-width="4" stroke-dasharray="15 15"/>
                <path d="M100 250 L400 250" stroke="#FFFFFF" stroke-width="4" stroke-dasharray="15 15"/>
                
                <rect x="130" y="180" width="240" height="30" rx="5" fill="#FFFFFF" fill-opacity="0.3"/>
                <rect x="130" y="230" width="180" height="30" rx="5" fill="#FFFFFF" fill-opacity="0.3"/>
                
                <circle cx="250" cy="100" r="50" fill="none" stroke="#FFFFFF" stroke-width="8" opacity="0.6"/>
                <line x1="280" y1="130" x2="320" y2="170" stroke="#FFFFFF" stroke-width="8" stroke-linecap="round"/>
                
                <path d="M350 50 L400 0 L400 50 Z" fill="#FF6B6B" fill-opacity="0.7"/>
                
                <path d="M250 80 L250 120 M230 100 L270 100" stroke="#FFFFFF" stroke-width="6" stroke-linecap="round"/>
            </svg>
        </div>
    </div>
</body>
</html>
