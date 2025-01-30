<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    @vite('resources/css/app.css')
    
</head>
<body class="h-full">
    <div class="min-h-full">
      <x-navbar></x-navbar> 
        
        <main>
          <div class="w-full px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
          </div>
        </main>
    </div>
	<x-footer />
</body>
</html>