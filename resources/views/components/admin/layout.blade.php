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

    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.tailwindcss.css" rel="stylesheet">
</head>
<body class="h-full">
    <div class="min-h-full">
      <x-admin.sidebar></x-admin.sidebar> 
        
        <main>
          <div class="p-4 md:p-6 sm:ml-64">
            {{ $slot }}
          </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.tailwindcss.js" type="text/javascript"></script>
</body>
</html>