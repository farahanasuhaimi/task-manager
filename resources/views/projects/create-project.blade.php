{{-- blade for create project with tailwind --}}
<x-layout>
    <div class="container h-screen">
        <div class="my-10 md:flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg shadow-md">
            <form action="create-project" method="post">
                @csrf
                <div class="mb-4">
                <label for="project_name" class="sr-only">Title</label>
                <input type="text" name="name" id="project_name" placeholder="Your project title" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('name') }}">
                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-4">
                <label for="description" class="sr-only">Description</label>
                <textarea name="description" id="description" placeholder="Your project description" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
                </div>
                <div class="mb-4">
                <div class="mb-4">
                <label for="deadline" class="block my-3 text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" name="due_date" id="deadline" placeholder="Your project deadline" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('deadline') }}">
                @error('deadline')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-4 h-50">
                    <label for="category_id" class="block my-3 text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="my-3 block w-full bg-gray-100 border-2 shadow-sm sm:text-sm p-4 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                </div>
                
                <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create Project</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-layout>