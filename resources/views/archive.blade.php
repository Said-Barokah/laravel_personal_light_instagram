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
                    <h1 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-gray-100">Archive</h1>
                    <div class="flex space-x-2 items-center">
                        <form action="{{ route('archive.index') }}" method="GET" class="mb-4 w-full">
                            <div class="flex justify-between gap-4">
                                <div class="flex gap-4">
                                    <div class="flex flex-col">
                                        <label for="start_date" class="text-gray-700 dark:text-gray-300">Start Date</label>
                                        <input type="date" name="start_date" id="start_date"
                                            class="border p-2 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                                            value="{{ request('start_date') }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="end_date" class="text-gray-700 dark:text-gray-300">End Date</label>
                                        <input type="date" name="end_date" id="end_date"
                                            class="border p-2 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                                            value="{{ request('end_date') }}">
                                    </div>
                                    <button type="submit" name="action" value="filter" class="bg-blue-500 text-white p-2 rounded">Filter</button>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex flex-col">
                                        <label for="format" class="text-gray-700 dark:text-gray-300">Select Format</label>
                                        <select name="format" id="format"
                                            class="border p-2 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                            <option value="xlsx">XLSX</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="action" value="download" class="bg-blue-500 text-white p-2 rounded">Download</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Tabel Archive -->
                    <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-700">
                        <thead class="bg-gray-200 dark:bg-gray-800">
                            <tr>
                                <th class="border px-4 py-2 text-gray-800 dark:text-gray-300">Media</th>
                                <th class="border px-4 py-2 text-gray-800 dark:text-gray-300">Date</th>
                                <th class="border px-4 py-2 text-gray-800 dark:text-gray-300">Caption</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feeds as $feed)
                                <tr class="bg-white dark:bg-gray-900">
                                    <td class="border px-4 py-2 dark:border-gray-700">
                                        @if ($feed->media_type === 'image')
                                            <img src="{{ asset('storage/' . $feed->media_path) }}" alt="Image"
                                                class="w-20 h-20 object-cover">
                                        @elseif($feed->media_type === 'video')
                                            <video width="100" height="100" controls>
                                                <source src="{{ asset('storage/' . $feed->media_path) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                                        {{ $feed->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $feed->caption }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Download Form -->


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
