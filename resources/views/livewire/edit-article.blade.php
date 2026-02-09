<div class="min-h-screen bg-gradient-to-b from-zinc-50 via-white to-zinc-100">
    <div class="max-w-6xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-zinc-400">Editorial Studio</p>
                <h1 class="mt-2 text-3xl font-bold text-zinc-900 sm:text-4xl">Edit Article</h1>
                <p class="mt-2 text-sm text-zinc-500">Refine the story, update assets, and manage visibility.</p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center gap-2 rounded-full border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-500">
                    ID {{ $form->id }}
                </span>
                <a wire:navigate href="/articles/{{ $form->id }}" class="inline-flex items-center gap-2 rounded-full border border-zinc-900/10 bg-white px-4 py-2 text-xs font-semibold text-zinc-900 shadow-sm transition hover:-translate-y-0.5 hover:bg-zinc-900 hover:text-white">
                    <ion-icon name="eye-outline" class="text-sm"></ion-icon>
                    View article
                </a>
                <a wire:navigate href="/dashboard/articles" class="inline-flex items-center gap-2 rounded-full border border-zinc-900/10 bg-white px-4 py-2 text-xs font-semibold text-zinc-900 shadow-sm transition hover:-translate-y-0.5 hover:bg-zinc-900 hover:text-white">
                    <ion-icon name="arrow-back-outline" class="text-sm"></ion-icon>
                    Back to library
                </a>
            </div>
        </div>

        <form
            wire:submit.prevent="save"
            x-data="{
                title: @entangle('form.title').live,
                content: @entangle('form.content').live,
                tags: @entangle('form.tags').live,
                categories: @entangle('form.categories').live,
                tagInput: '',
                categoryInput: '',
                wordCount() {
                    const text = (this.content || '').trim();
                    if (!text) return 0;
                    return text.split(/\s+/).filter(Boolean).length;
                },
                readingTime() {
                    const count = this.wordCount();
                    return count === 0 ? 0 : Math.max(1, Math.ceil(count / 200));
                },
                addTag() {
                    const value = this.tagInput.trim();
                    if (!value) return;
                    const exists = this.tags.some(tag => tag.toLowerCase() === value.toLowerCase());
                    if (!exists) {
                        this.tags = [...this.tags, value];
                    }
                    this.tagInput = '';
                },
                removeTag(index) {
                    this.tags = this.tags.filter((_, i) => i !== index);
                },
                addCategory() {
                    const value = this.categoryInput.trim();
                    if (!value) return;
                    const exists = this.categories.some(category => category.toLowerCase() === value.toLowerCase());
                    if (!exists) {
                        this.categories = [...this.categories, value];
                    }
                    this.categoryInput = '';
                },
                removeCategory(index) {
                    this.categories = this.categories.filter((_, i) => i !== index);
                }
            }"
            class="grid gap-6 lg:grid-cols-[1.4fr_1fr]"
        >
            <div class="space-y-6">
                <div class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">
                    <div class="border-b border-zinc-200 pb-4">
                        <h2 class="text-lg font-semibold text-zinc-900">Article Details</h2>
                        <p class="text-sm text-zinc-500">Update the title, content, and featured image.</p>
                    </div>

                    <div class="mt-6 space-y-5">
                        <div>
                            <label for="title" wire:dirty.class='text-red-500' wire:target='form.title' class="text-sm font-semibold ">Title <span wire:dirty wire:target='form.title' >*</span></label>
                            <input type="text" id="title" x-model="title" class="mt-2 block w-full rounded-2xl border border-zinc-200 px-4 py-3 text-sm text-zinc-700 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-2 focus:ring-zinc-900/20">
                            @error('title') <span class="mt-2 block text-xs font-semibold text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label wire:dirty.class='text-red-500' wire:target='form.content' for="content" class="text-sm font-semibold">Content <span wire:dirty wire:target='form.content'>*</span></label>
                            <textarea id="content" x-model="content" rows="10" class="mt-2 block w-full rounded-2xl border border-zinc-200 px-4 py-3 text-sm text-zinc-700 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-2 focus:ring-zinc-900/20"></textarea>
                            @error('content') <span class="mt-2 block text-xs font-semibold text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="photo" wire:dirty.class='text-red-500' wire:target='form.photo' class="text-sm font-semibold text-zinc-700">Featured Photo</label>
                            <div class="mt-3 flex flex-col gap-4 rounded-2xl border border-dashed border-zinc-200 bg-zinc-50 px-4 py-4">
                                @if($form->photo)
                                <img src="{{ $form->photo->temporaryUrl() }}" alt="Preview Photo" class="h-44 w-full rounded-2xl object-cover">
                                @elseif($form->photo_path)
                                <img src="{{ Storage::url($form->photo_path) }}" alt="Article Photo" class="h-44 w-full rounded-2xl object-cover">
                                @else
                                <div class="flex flex-col items-center justify-center text-center text-sm text-zinc-400">
                                    <ion-icon name="image-outline" class="text-3xl"></ion-icon>
                                    <p class="mt-2">Upload a high quality cover image.</p>
                                </div>
                                @endif
                                <div class="flex flex-wrap items-center gap-3">
                                    <input type="file" id="photo" wire:model="form.photo" class="block w-full text-sm text-zinc-600 file:mr-4 file:rounded-full file:border-0 file:bg-zinc-900 file:px-4 file:py-2 file:text-xs file:font-semibold file:text-white hover:file:bg-zinc-800">
                                    @if($form->photo_path)
                                    <button type="button" class="inline-flex items-center gap-2 rounded-full border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-900" wire:click.prevent="downloadPhoto">
                                        <ion-icon name="download-outline" class="text-sm"></ion-icon>
                                        Download current
                                    </button>
                                    @endif
                                </div>
                            </div>
                            @error('photo') <span class="mt-2 block text-xs font-semibold text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">
                    <div class="border-b border-zinc-200 pb-4">
                        <h2 class="text-lg font-semibold text-zinc-900">Tags & Categories</h2>
                        <p class="text-sm text-zinc-500">Keep taxonomy clean for discoverability.</p>
                    </div>

                    <div class="mt-6 grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="text-sm font-semibold text-zinc-700">Tags</label>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="(tag, index) in tags" :key="tag + index">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-zinc-900 px-3 py-1 text-xs font-semibold text-white">
                                        <span x-text="tag"></span>
                                        <button type="button" @click="removeTag(index)" class="text-white/70 hover:text-white">&times;</button>
                                    </span>
                                </template>
                                <span x-show="tags.length === 0" class="text-xs text-zinc-400">No tags yet.</span>
                            </div>
                            <div class="mt-3 flex items-center gap-2 rounded-2xl border border-zinc-200 bg-white px-3 py-2">
                                <input type="text" x-model="tagInput" @keydown.enter.prevent="addTag" @keydown.comma.prevent="addTag" placeholder="Add a tag and press enter" class="w-full border-0 bg-transparent text-xs text-zinc-700 outline-none placeholder:text-zinc-400">
                                <button type="button" @click="addTag" class="rounded-full bg-zinc-900 px-3 py-1 text-xs font-semibold text-white">Add</button>
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-zinc-700">Categories</label>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="(category, index) in categories" :key="category + index">
                                    <span class="inline-flex items-center gap-2 rounded-full border border-zinc-200 bg-zinc-50 px-3 py-1 text-xs font-semibold text-zinc-700">
                                        <span x-text="category"></span>
                                        <button type="button" @click="removeCategory(index)" class="text-zinc-400 hover:text-zinc-900">&times;</button>
                                    </span>
                                </template>
                                <span x-show="categories.length === 0" class="text-xs text-zinc-400">No categories yet.</span>
                            </div>
                            <div class="mt-3 flex items-center gap-2 rounded-2xl border border-zinc-200 bg-white px-3 py-2">
                                <input type="text" x-model="categoryInput" @keydown.enter.prevent="addCategory" @keydown.comma.prevent="addCategory" placeholder="Add a category and press enter" class="w-full border-0 bg-transparent text-xs text-zinc-700 outline-none placeholder:text-zinc-400">
                                <button type="button" @click="addCategory" class="rounded-full border border-zinc-900 px-3 py-1 text-xs font-semibold text-zinc-900">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-zinc-900">Writing Insights</h3>
                    <p class="mt-1 text-sm text-zinc-500">Track reading time and length in real time.</p>
                    <div class="mt-5 grid grid-cols-2 gap-4">
                        <div class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-zinc-400">Word Count</p>
                            <p class="mt-3 text-2xl font-semibold text-zinc-900" x-text="wordCount()"></p>
                        </div>
                        <div class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-zinc-400">Reading Time</p>
                            <p class="mt-3 text-2xl font-semibold text-zinc-900" x-text="readingTime() === 0 ? '0 min' : readingTime() + ' min'"></p>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-zinc-900">Live Preview</h3>
                        <span class="text-xs font-semibold text-emerald-600">Split view</span>
                    </div>
                    <div class="mt-4 space-y-4">
                        @if($form->photo)
                        <img src="{{ $form->photo->temporaryUrl() }}" alt="Preview" class="h-40 w-full rounded-2xl object-cover">
                        @elseif($form->photo_path)
                        <img src="{{ Storage::url($form->photo_path) }}" alt="Preview" class="h-40 w-full rounded-2xl object-cover">
                        @endif
                        <div>
                            <p class="text-xs uppercase tracking-[0.2em] text-zinc-400">Title</p>
                            <h4 class="mt-2 text-lg font-semibold text-zinc-900" x-text="title || 'Untitled draft'"></h4>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-[0.2em] text-zinc-400">Excerpt</p>
                            <p class="mt-2 text-sm text-zinc-600 whitespace-pre-wrap" x-text="content || 'Start writing to see the preview here.'"></p>
                        </div>
                        <div class="flex flex-wrap gap-2" x-show="tags.length || categories.length">
                            <template x-for="tag in tags" :key="tag">
                                <span class="rounded-full bg-zinc-900 px-3 py-1 text-xs font-semibold text-white" x-text="tag"></span>
                            </template>
                            <template x-for="category in categories" :key="category">
                                <span class="rounded-full border border-zinc-200 bg-zinc-50 px-3 py-1 text-xs font-semibold text-zinc-700" x-text="category"></span>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-zinc-900">Publishing</h3>
                    <p class="mt-1 text-sm text-zinc-500">Control visibility for readers.</p>
                    <label class="mt-5 flex items-center justify-between rounded-2xl border border-zinc-200 px-4 py-3 text-sm font-semibold text-zinc-700">
                        <span>Published</span>
                        <input type="checkbox" class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900" name="published" wire:model.boolean="form.published">
                    </label>
                </div>

                <div class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-zinc-900">Notifications<span wire:dirty wire:dirty wire:target='form.notifications'>*</h3>
                    <p class="mt-1 text-sm text-zinc-500">Choose if followers should be notified.</p>
                    <div class="mt-5 space-y-3">
                        <label class="flex items-center gap-2 text-sm text-zinc-700">
                            <input wire:model.boolean="form.allowNotifications" class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900" type="radio" value="true">
                            Notify subscribers
                        </label>
                        <label class="flex items-center gap-2 text-sm text-zinc-700">
                            <input wire:model.boolean="form.allowNotifications" class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900" type="radio" value="false">
                            Do not notify
                        </label>
                    </div>
                    <div x-show="$wire.form.allowNotifications" class="mt-4 flex flex-col gap-3 rounded-2xl border border-zinc-200 bg-zinc-50 px-4 py-3">
                        <label class="flex items-center gap-2 text-xs font-semibold text-zinc-600">
                            <input wire:model="form.notifications" class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900" type="checkbox" value="email">
                            Email
                        </label>
                        <label class="flex items-center gap-2 text-xs font-semibold text-zinc-600">
                            <input wire:model="form.notifications" class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900" type="checkbox" value="sms">
                            SMS
                        </label>
                        <label class="flex items-center gap-2 text-xs font-semibold text-zinc-600">
                            <input wire:model="form.notifications" class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900" type="checkbox" value="push">
                            Push
                        </label>
                    </div>
                </div>

                <div class="rounded-3xl border border-zinc-200 bg-zinc-900 p-6 text-white shadow-lg shadow-zinc-900/20">
                    <h3 class="text-base font-semibold">Ready to update?</h3>
                    <p class="mt-2 text-sm text-white/70">Save changes to keep the article fresh.</p>
                    <div class="mt-6 flex flex-col gap-3">
                        <button type="submit" wire:dirty.class='hover:bg-zinc-800' wire:dirty.remove.attr="disabled" class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-zinc-900 shadow-sm transition hover:-translate-y-0.5 disabled:opacity-40" disabled>
                            Save changes
                        </button>
                        <p class="text-xs text-white/60">Updates apply immediately after save.</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
