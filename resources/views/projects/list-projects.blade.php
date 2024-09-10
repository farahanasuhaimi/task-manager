<x-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">My Projects</h1>
        
        @if ($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($projects as $project)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $project->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Due: {{ $project->due_date ?? 'Not set' }}</span>
                            {{-- <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500 hover:text-blue-700">View Details</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        @else
            <p class="text-gray-600">You haven't created any projects yet.</p>
        @endif
    </div>

</x-layout>