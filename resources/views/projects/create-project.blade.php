{{-- blade for create project with tailwind --}}
<x-layout>
    <div class="container h-screen">
        <div class="my-10 flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <form action="create-project" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="sr-only">Title</label>
                        <input type="text" name="name" id="title" placeholder="Your project title" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 h-50">
                        <label for="description" class="sr-only">Description</label>
                        <textarea name="description" id="description" placeholder="Your project description" class="bg-gray-100 border-2 w-full p-4 rounded-lg">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>