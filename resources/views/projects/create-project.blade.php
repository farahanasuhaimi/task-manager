{{-- blade for create project with tailwind --}}
<x-layout>
    <div class="container h-screen">
        <div class="my-10 md:flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('projects.create') }}" method="post">
                @csrf
                <div class="mb-4">
                <label for="project_name" class="sr-only">Title</label>
                <input type="text" name="name" id="project_name" placeholder="Your project title" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
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
                    @error('due_date')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-4 h-50">
                        <label for="category_id" class="block my-3 text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="category_id" class="my-3 block w-full bg-gray-100 border-2 shadow-sm sm:text-sm p-4 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
  
                </div>
                
                <div id="tasks-container">
                    <label for="task" class="block my-3 text-sm font-medium text-gray-700">Task</label>
                    {{-- <div class="task mb-4 grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <label for="task_title_0" class="sr-only">Task Title</label>
                            <input type="text" name="tasks[0][title]" id="task_title_0" placeholder="Task title" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="col-span-1">
                            <input type="date" name="tasks[0][due_date]" id="task_due_date_0" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div> --}}
                </div>
            
                <!-- Add Task Button -->
                <button type="button" id="add-task" class="bg-green-500 text-white px-4 py-2 rounded mb-4">Add Task</button>

                <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create Project</button>
                </div>
            </form>

            <!-- JavaScript to Add More Task Fields -->
            <script>
                let taskCount = 1;
                document.getElementById('add-task').addEventListener('click', function () {
                    const tasksContainer = document.getElementById('tasks-container');
                    const newTask = document.createElement('div');
                    newTask.classList.add('task', 'mb-4', 'grid', 'grid-cols-3', 'gap-4');
                        newTask.innerHTML = `
                            <div class="col-span-2">
                                <label for="task_title_${taskCount}" class="sr-only">Task Title</label>
                                <input type="text" name="tasks[${taskCount}][title]" id="task_title_${taskCount}" placeholder="Task title" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div class="col-span-1">
                                <input type="date" name="tasks[${taskCount}][due_date]" id="task_due_date_${taskCount}" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                    `;
                    tasksContainer.appendChild(newTask);
                    taskCount++;
                });
            </script>
            </div>
        </div>
    </div>
</x-layout>