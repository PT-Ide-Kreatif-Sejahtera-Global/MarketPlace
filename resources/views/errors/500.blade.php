<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>505 - Internal Server Error</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        span {
            font-weight: bold; 
            font-size: 2rem; 
            color: #006400;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4); 
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes errorBlink {
            0% {
                fill: #FF6B6B;
            }
            25% {
                fill: #FF4757;
            }
            50% {
                fill: #FF6B6B;
            }
            75% {
                fill: #FF4757;
            }
            100% {
                fill: #FF6B6B;
            }
        }

        .error-circle {
            animation: errorBlink 3s ease-in-out infinite; 
        }
    </style>
</head>
<body class="bg-gradient-to-r from-lime-500 to-lime-700 text-white min-h-screen flex items-center justify-center p-6">
    <div class="container mx-auto grid md:grid-cols-2 gap-16 items-center flex-col md:flex-row">
        <div class="text-left space-y-6 md:ml-10">
            <div class="text-9xl font-bold text-white/20">
                505
            </div>
            <h1 class="text-4xl font-semibold mb-4">
                Internal Server Error
            </h1>
            <p class="text-white/90 mb-8 text-lg">
                <span>Oops!</span>, Sepertinya terjadi masalah teknis yang menghalangi proses ini. Kami sedang berusaha memperbaikinya secepat mungkin.
            </p>
            <div class="flex space-x-4">
                <a href="{{ url('/') }}" class="px-6 py-3 bg-white text-lime-600 rounded-full font-semibold hover:bg-white/90 transition transform hover:scale-105 shadow-md">
                    Kembali
                </a>
            </div>
        </div>
        
         <!-- Bagian Gambar (dihilangkan di tampilan mobile) -->
        <div class="flex justify-center md:block hidden">
            <svg class="mx-auto mb-5 w-80 h-80 svg-animate" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                <rect x="50" y="200" width="300" height="150" rx="20" fill="#FFFFFF" fill-opacity="0.2"/>
                <rect x="100" y="230" width="200" height="80" rx="10" fill="#FFFFFF" fill-opacity="0.3"/>
                
                <line x1="200" y1="100" x2="200" y2="200" stroke="#FFFFFF" stroke-width="6" stroke-linecap="round" stroke-dasharray="20 15"/>
                
                <circle cx="200" cy="80" r="40" fill="#FF6B6B" fill-opacity="0.7" class="error-circle"/>
                <text x="200" y="90" text-anchor="middle" fill="white" font-size="24" font-weight="bold">!</text>
                
                <rect x="150" y="250" width="100" height="40" rx="5" fill="#FFFFFF" fill-opacity="0.4"/>
                
                <path d="M200 50 L180 90 L220 90 L200 130" stroke="#FFD54F" fill="none" stroke-width="6" stroke-linecap="round"/>
            </svg>    
        </div>
    </div>
</body>
</html>
