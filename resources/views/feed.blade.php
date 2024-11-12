<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto px-4 py-8 relative">
                    <h1 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-gray-100">Feed</h1>
                    <div class="absolute right-0 top-0 p-8">
                        <a href="{{ route('feeds.create') }}" class="rounded-lg hover:bg-blue-300 bg-blue-600 px-3 py-2 text-xl font-bold text-center mb-8 text-gray-900 dark:text-gray-100">
                            Upload
                        </a>
                    </div>

                    <div class="grid grid-cols-{{ $feedsPerRow }} gap-4">
                        @foreach ($feeds as $feed)
                            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                                @if ($feed->media_type === 'video')
                                    <video controls class="w-full h-64 object-cover">
                                        <source src="{{ asset('storage/'.$feed->media_path) }}" type="video/mp4">
                                        Browser Anda tidak mendukung video tag.
                                    </video>
                                @elseif($feed->media_type === 'image')
                                    <img src="{{ asset('storage/'.$feed->media_path) }}" alt="Feed image" class="w-full h-64 object-cover">
                                @endif

                                <div class="p-4">
                                    <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $feed->user->name }}</h5>
                                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $feed->caption }}</p>
                                    <small class="text-gray-400 dark:text-gray-500 text-xs">{{ $feed->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
