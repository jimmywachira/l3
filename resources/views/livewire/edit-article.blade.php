<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="shadow-xl sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Article</h1>

        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label for="title" class="block font-bold text-gray-700">Title</label>
                <input type="text" id="title" wire:model="form.title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('title') <span class="p-2 m-2 text-red-500 ">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block font-bold text-gray-700">Content</label>
                <textarea id="content" wire:model="form.content" rows="10" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('content') <span class="p-2 m-2 text-red-500 ">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-md transition transform hover:scale-105">
                    Update Article
                </button>
            </div>
        </form>
    </div>
</div>
