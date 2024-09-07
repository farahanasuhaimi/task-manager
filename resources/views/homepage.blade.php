<x-layout>
    <!-- Profile Section -->
    <div class="flex justify-center items-center h-svh">
        @if (Auth::check())
            <div class="md:flex flex-col md:space-x-4 w-1/2 pr-10">
                <div class="text-center">
                    <h2>Hello <strong>{{ auth()->user()->username }}</strong>, what are you catching up today?</h2>
                    <p class="lead text-muted">Any task done?</p>
                </div>
                <div class="my-10 text-center">
                    <a href="/projects/create-project" class="bg-indigo-500 shadow-lg shadow-indigo-500/50 text-white px-4 py-2 rounded-md">Create Project</a>
                </div>
            </div>
        @else
        <div class="md:flex md:space-x-4">
            <div class="m-auto w-10/12 md:w-1/2 p-10">

                <h1 class="text-4xl font-bold mb-6 underline decoration-sky-200">Task Manager App</h1>
                <p class="text-lg text-gray-700">Welcome to the Task Manager App! This app helps you <a class="underline underline-offset-4 decoration-dotted decoration-sky-500"> stay organized</a> and <a class="underline underline-offset-4 decoration-dotted decoration-sky-500">manage your tasks efficiently</a>. Sign up now to start organizing your tasks and boosting your productivity.</p>
            </div>
            <div class="m-auto w-10/12 md:w-2/5 bg-indigo-300 shadow-lg shadow-indigo-300/50 rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4 underline decoration-sky-200">Sign Up</h2>
                <form action="/register" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" name="username" id="name" class="shadow-md border border-gray-300 rounded-md p-2 w-full" required>
                        @error('username')
                            <p class="alert text-">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" class="shadow-md border border-gray-300 rounded-md p-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" name="password" id="password" class="shadow-md border border-gray-300 rounded-md p-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="shadow-md border border-gray-300 rounded-md p-2 w-full" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-indigo-500 shadow-lg shadow-indigo-500/50 text-white px-4 py-2 rounded-md">Register</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
    

</x-layout>
