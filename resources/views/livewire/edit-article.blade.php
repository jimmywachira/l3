<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8 rounded-md bg-white">
    <div class="shadow-xl sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-900  mb-6">Edit Article (ID: {{ $form->id }})</h1>

        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label wire:dirty.class=" font-bold text-red-600" wire:target='form.title' for="title" class="block font-bold text-gray-700">Title
                    <span class="text-red-500 " wire:dity wire:target='form.title'>
                        *
                    </span></label>
                <input type="text" id="title" wire:model="form.title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('title') <span class="p-2 m-2 text-red-500 ">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block font-bold text-gray-700" wire:target='form.content' wire:dirty.class=" font-bold text-red-600">Content <span class="text-red-500 " wire:dity wire:target='form.content'>
                        *
                    </span></label>
                <textarea id="content" wire:model="form.content" rows="6" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('content') <span class="p-2 m-2 text-red-500 ">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="photo_path" class="block font-bold text-gray-700">Photo</label>

                <div class="mb-2">
                    @if($form->photo){
                    <img src="{{ $this->photo->temporaryUrl() }}" alt="Preview Photo" class="w-1/2 inline rounded-md">
                    }
                    @elseif($form->photo_path)
                    <img src="{{ Storage::url($form->photo_path) }}" alt="Article Photo" class="w-1/2 inline rounded-md">
                    <div class="mt-2 text-sm text-white"><button type="button" class="inline-flex p-2 bg-blue-600 items-center" wire:click.prevent="downloadPhoto">
                            Download Photo
                        </button></div>
                    @else
                    <p class="text-gray-500 italic">No photo uploaded.</p>
                    @endif
                </div>

                <input type="file" id="photo_path" wire:model="form.photo_path" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('photo_path') <span class="p-2 m-2 text-red-500 ">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="flex items-center" wire:target='form.published' wire:dirty.class=" font-bold text-red-600">
                    <input type="checkbox" class="mr-2" name="published" wire:model.boolean="form.published">published</label>
            </div>

            <div>
                <div class="mb-4" wire:target='form.notifications' wire:dirty.class=" font-bold text-red-600"> notification options <span class="text-red-500 " wire:dity.remove wire:target='form.notifications'>
                        *
                </div>
                <div class="flex gap-6 mb-3">
                    <div>
                        <label class="flex items-center">
                            <input wire:model.boolean="form.allowNotifications" class="mr-2" type="radio" value="true">Yes
                        </label>

                        <label class="flex items-center">
                            <input wire:model.boolean="form.allowNotifications" class="mr-2" type="radio" value="false">no
                        </label>
                    </div>

                    <div x-show="$wire.form.allowNotifications" class="flex gap-4" wire:transition>
                        <label class="flex items-center">
                            <input wire:model="form.notifications" class="mr-2" type="checkbox" value="email">email
                        </label>
                        <label class="flex items-center">
                            <input wire:model="form.notifications" class="mr-2" type="checkbox" value="sms">sms
                        </label>
                        <label class="flex items-center">
                            <input wire:model="form.notifications" class="mr-2" type="checkbox" value="push">push
                        </label>
                    </div>
                </div>
            </div>

            <div class=" flex justify-end">
                <button wire:dirty.class='hover:bg-blue-700' type="submit" wire:dirty.remove.attr="disabled" class="bg-blue-600 disabled:opacity-30 text-white font-bold py-2 px-4 rounded-full shadow-md transition transform hover:scale-105" disabled>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
