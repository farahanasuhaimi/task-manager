<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager App</title>
    @vite( 'resources/js/app.js')

</head>
<body>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="text-indigo-200 text-lg font-semibold">Task Manager</a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tasks</a>
                            <a href="/about" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                        </div>
                    </div>
                    
                </div>
                @auth
                {{-- <div class="hidden md:block"> --}}
                    <div class="ml-4 items-center flex md:ml-6">
                        <div class="m-auto md:w-1/2 p-10">
                            <button href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</button>
                        </div>
                        <div class="m-auto md:w-1/2 md:p-10">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
        
                <form action="/login" method="POST">
                    <div class="md:hidden flex items-center">
                        <button id="hamburger-btn" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                          &#9776;
                        </button>
                      </div>
                    {{-- <div class="ml-4 md:flex items-center md:ml-6">
                        @csrf
                        <div class="mx-auto md:px-2">
                            <input name="loginusername" id="loginusername" type="text" class="text-sm font-medium shadow-md border-gray-300 rounded-md p-1 w-full border-0" placeholder="Username">
                        </div>
                        <div class="mx-auto px-2">
                            <input name="loginpassword" id="loginpassword" type="password" class="text-sm font-medium shadow-md border-gray-300 rounded-md w-full border-0 p-1" placeholder="Password">
                        </div>
                        <div class="mx-auto">
                            <button class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</button>
                        </div>
                    </div> --}}
                    <div id="login-menu" class="ml-4 hidden md:flex items-center md:ml-6">
                        @csrf
                        <div class="mx-auto md:px-2">
                          <input name="loginusername" id="loginusername" type="text" class="text-sm font-medium shadow-md border-gray-300 rounded-md p-1 w-full border-0" placeholder="Username">
                        </div>
                        <div class="mx-auto px-2">
                          <input name="loginpassword" id="loginpassword" type="password" class="text-sm font-medium shadow-md border-gray-300 rounded-md w-full border-0 p-1" placeholder="Password">
                        </div>
                        <div class="mx-auto">
                          <button class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</button>
                        </div>
                      </div>
                </form>
                    
                @endauth
            
        </div>
    </nav>

    <main class="container mx-auto">
        @if (session()->has('success'))
        <div class="container container--narrow">
          <div class="alert text-center bg-green-100 border border-green-400 text-black-700 my-2 px-4 py-3 rounded relative">{{ session('success') }}</div>
        </div>
      @elseif (session()->has('error'))
        <div class="container container--narrow">
          <div class="alert text-center bg-red-100 border border-red-400 text-red-700 my-2 px-4 py-3 rounded relative">{{ session('error') }}</div>
        </div>
      @endif
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-300 text-sm">© {{ date('Y') }} Task Manager. All rights reserved.</p>
        </div>
    </footer>
   
    <script>
        document.getElementById('hamburger-btn').addEventListener('click', function() {
          var loginMenu = document.getElementById('login-menu');
          loginMenu.classList.toggle('hidden');
        });
    </script>
    
</body>
</html>