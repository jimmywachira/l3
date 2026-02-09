<div class="min-h-screen bg-gradient-to-b from-zinc-50 via-white to-zinc-100">
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-zinc-200 bg-white/80 p-6 shadow-sm backdrop-blur">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-zinc-400">Content Hub</p>
                    <h1 class="mt-2 text-3xl font-bold text-zinc-900 sm:text-4xl">Manage Articles</h1>
                    <p class="mt-2 text-sm text-zinc-500">Track drafts, publish fast, and keep everything organized.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <div class="flex items-center gap-2 rounded-full border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-500">
                        <span class="inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                        Showing {{ $this->articles->count() }} of {{ $this->articles->total() }}
                    </div>
                    <a wire:navigate href="/dashboard/articles/create" class="inline-flex items-center gap-2 rounded-full bg-zinc-900 px-5 py-2 text-sm font-semibold text-white shadow-lg shadow-zinc-900/20 transition hover:-translate-y-0.5 hover:bg-zinc-800">
                        <ion-icon name="add-circle-outline" class="text-lg"></ion-icon>
                        Create Article
                    </a>
                </div>
            </div>

            <div class="mt-6 grid gap-4 lg:grid-cols-[1.3fr_1fr_1fr]">
                <div class="flex items-center gap-3 rounded-2xl border border-zinc-200 bg-white px-4 py-3">
                    <ion-icon name="search-outline" class="text-lg text-zinc-400"></ion-icon>
                    <input type="text" placeholder="Search by title or keyword" class="w-full border-0 bg-transparent text-sm text-zinc-700 outline-none placeholder:text-zinc-400">
                </div>
                <div class="flex items-center gap-2 rounded-2xl border border-zinc-200 bg-white px-4 py-3 text-sm text-zinc-500">
                    <ion-icon name="calendar-outline" class="text-lg"></ion-icon>
                    <span>Created date</span>
                    <span class="ml-auto text-xs font-semibold text-zinc-900">Newest first</span>
                </div>
                <div class="flex items-center gap-2 rounded-2xl border border-zinc-200 bg-white px-4 py-3 text-sm text-zinc-500">
                    <ion-icon name="funnel-outline" class="text-lg"></ion-icon>
                    <span>Status filters</span>
                    <span class="ml-auto text-xs font-semibold text-zinc-900">Auto</span>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap items-center gap-3">
                <button wire:click='togglePublished(false)' @class([
                    'rounded-full border border-zinc-900 bg-zinc-900 px-4 py-2 text-xs font-semibold text-white shadow-sm' => !$this->showOnlyPublished,
                    'rounded-full border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-600 hover:border-zinc-900 hover:text-zinc-900' => $this->showOnlyPublished,
                ])>Show All</button>

                <button wire:click='togglePublished(true)' @class([
                    'rounded-full border border-zinc-900 bg-zinc-900 px-4 py-2 text-xs font-semibold text-white shadow-sm' => $this->showOnlyPublished,
                    'rounded-full border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-600 hover:border-zinc-900 hover:text-zinc-900' => !$this->showOnlyPublished,
                ])>
                    Show Published (<livewire:published-count placeholder-text="loading" />)
                </button>
            </div>
        </div>

        @if(session()->has('message'))
        <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <div class="mt-6 flex flex-col gap-4">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="text-sm text-zinc-500">Browse, edit, and publish across your entire catalog.</div>
                <div class="rounded-full border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-500">
                    Page {{ $this->articles->currentPage() }} of {{ $this->articles->lastPage() }}
                </div>
            </div>

            <div class="rounded-2xl border border-zinc-200 bg-white shadow-sm">
                <div class="flex items-center justify-between border-b border-zinc-200 px-6 py-4">
                    <h2 class="text-base font-semibold text-zinc-900">Article Library</h2>
                    <div class="text-xs font-semibold text-zinc-500">Updated in real time</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-zinc-200">
                        <thead class="bg-zinc-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">Title</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">Preview</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">Created</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-zinc-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-100">
                            @forelse($this->articles as $article)
                            <tr wire:key="article-{{ $article->id }}" class="transition hover:bg-zinc-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-zinc-900">{{ $article->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-zinc-600 line-clamp-1 max-w-xs">{{ Str::limit($article->content, 60) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center rounded-full bg-zinc-100 px-2.5 py-1 text-xs font-semibold text-zinc-700">
                                        {{ $article->created_at->format('M d Y') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end gap-4 text-sm">
                                        <a wire:navigate href="/articles/{{ $article->id }}" class="text-zinc-500 hover:text-zinc-900" title="View">
                                            <ion-icon name="eye-outline" class="text-lg"></ion-icon>
                                        </a>
                                        <a wire:navigate href="/dashboard/articles/{{ $article->id }}/edit" class="text-zinc-500 hover:text-zinc-900" title="Edit">
                                            <ion-icon name="create-outline" class="text-lg"></ion-icon>
                                        </a>
                                        <button wire:click="delete({{ $article->id }})" wire:confirm=" Are you sure you want to delete this article?" class="text-zinc-500 hover:text-red-600" title="Delete">
                                            <ion-icon name="trash-outline" class="text-lg"></ion-icon>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <ion-icon name="document-text-outline" class="text-4xl text-zinc-300"></ion-icon>
                                        <p class="mt-3 text-base font-semibold text-zinc-900">No articles found</p>
                                        <p class="mt-1 text-sm text-zinc-500">Create your first story to start building momentum.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="border-t border-zinc-200 px-6 py-4">
                    {{ $this->articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
