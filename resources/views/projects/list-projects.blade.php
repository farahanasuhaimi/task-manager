<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <ul>
        @foreach($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project->id) }}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <p class="text-sm leading-5 font-medium text-indigo-600 truncate">{{ $project->name }}</p>
                            <div class="ml-2 flex-shrink-0 flex">
                                <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $project->status }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <p class="flex items-center text-sm leading-5 text-gray-500">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 2C5.03 2 1 6.03 1 11c0 2.76 1.12 5.26 2.93 7.07l.07.07.07-.07C6.74 16.26 8.24 15 10 15c1.76 0 3.26 1.26 3.93 3.07l.07.07.07-.07C18.88 16.26 20 13.76 20 11c0-4.97-4.03-9-9-9zm0 12.5c-2.49 0-4.5-2.01-4.5-4.5S7.51 5.5 10 5.5s4.5 2.01 4.5 4.5-2.01 4.5-4.5 4.5zm-1-9a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $project->user->name }}
                                </p>
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2C5.03 2 1 6.03 1 11c0 2.76 1.12 5.26 2.93 7.07l.07.07.07-.07C6.74 16.26 8.24 15 10 15c1.76 0 3.26 1.26 3.93 3.07l.07.07.07-.07C18.88 16.26 20 13.76 20 11c0-4.97-4.03-9-9-9zm0 12.5c-2.49 0-4.5-2.01-4.5-4.5S7.51 5.5 10 5.5s4.5 2.01 4.5 4.5-2.01 4.5-4.5 4.5zm-1-9a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm2 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" clip-rule="evenodd"/>
                                </svg>
                                {{ $project->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>