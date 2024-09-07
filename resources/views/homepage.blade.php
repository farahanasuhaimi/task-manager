<x-layout>
    <!-- Profile Section -->
    <div class="flex justify-center items-center h-screen">
        <div class="w-1/2 pr-10">
            <h1 class="text-4xl font-bold mb-6">Task Manager App</h1>
            <p class="text-lg text-gray-700">Welcome to the Task Manager App! This app helps you stay organized and manage your tasks efficiently. Sign up now to start organizing your tasks and boosting your productivity.</p>
        </div>
        <div class="bg-blue-300 shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Sign Up</h2>
            <form action="#" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" class="border border-gray-300 rounded-md p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-300 rounded-md p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="border border-gray-300 rounded-md p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 rounded-md p-2 w-full" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    

</x-layout>
