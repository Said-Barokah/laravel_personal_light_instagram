<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload Feed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300  mb-4">Upload Feed</h2>
                <form action="{{ route('feeds.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="mb-4">
                        <label for="media" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Pilih Foto atau Video</label>
                        <input type="file" name="media" id="media" accept="image/*,video/*"
                            class="w-full p-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 rounded-md" required>
                        @error('media')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="caption" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Caption</label>
                        <textarea name="caption" id="caption" rows="4"
                            class="w-full p-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 rounded-md"
                            placeholder="Tulis caption di sini..."></textarea>
                        @error('caption')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
