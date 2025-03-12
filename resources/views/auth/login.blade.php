<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="https://ideathings.id/marketplace/" class="flex items-center mb-6 text-2xl font-semibold text-secondary-dark">
                <img class="h-10 md:h-12 w-auto rounded-full" src="{{ asset('/Img/logo.png') }}" alt="iDeaThings">
                <div class="ml-3 text-secondary font-extrabold text-lg md:text-xl tracking-tight">
                    iDeaThings
                </div>
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-secondary-dark md:text-2xl">
                        Admin Login
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        @if ($errors->has('login'))
                            <div class="text-red-500 text-sm">
                                {{ $errors->first('login') }}
                            </div>
                        @endif
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-secondary-dark">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-secondary-dark">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-secondary-dark rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                </div>
                                <div class="ml-3 text-sm">
                                  <label for="remember" class="text-gray-500">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-dark hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
