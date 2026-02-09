<div class="min-h-screen bg-gradient-to-b from-zinc-50 via-white to-zinc-100">
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.2em] text-zinc-400">Overview</p>
                <h1 class="mt-2 text-3xl font-bold text-zinc-900 sm:text-4xl">Dashboard</h1>
                <p class="mt-2 max-w-xl text-base text-zinc-600">
                    Manage content, track activity, and keep your publishing pipeline moving.
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a wire:navigate href="/dashboard/articles" class="inline-flex items-center gap-2 rounded-full border border-zinc-900/10 bg-white px-5 py-2 text-sm font-semibold text-zinc-900 shadow-sm transition hover:-translate-y-0.5 hover:bg-zinc-900 hover:text-white">
                    <ion-icon name="grid-outline" class="text-lg"></ion-icon>
                    Manage Articles
                </a>
                <a wire:navigate href="/dashboard/articles/create" class="inline-flex items-center gap-2 rounded-full bg-zinc-900 px-5 py-2 text-sm font-semibold text-white shadow-lg shadow-zinc-900/20 transition hover:-translate-y-0.5 hover:bg-zinc-800">
                    <ion-icon name="add-circle-outline" class="text-lg"></ion-icon>
                    Create Article
                </a>
            </div>
        </div>

        <div class="mt-8 grid gap-5 lg:grid-cols-3">
            <div class="group rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-[0.2em] text-zinc-400">Published</p>
                        <p class="mt-3 text-3xl font-bold text-zinc-900">{{ max($totalArticles - $draftArticles, 0) }}</p>
                        <p class="mt-2 text-sm text-zinc-500">Articles live on site</p>
                    </div>
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-emerald-500/10 text-emerald-600">
                        <ion-icon name="checkmark-done-outline" class="text-2xl"></ion-icon>
                    </div>
                </div>
                <div class="mt-6 h-2 w-full rounded-full bg-emerald-100">
                    <div class="h-2 w-3/5 rounded-full bg-emerald-500/80"></div>
                </div>
            </div>

            <div class="group rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-[0.2em] text-zinc-400">Drafts</p>
                        <p class="mt-3 text-3xl font-bold text-zinc-900">{{ $draftArticles }}</p>
                        <p class="mt-2 text-sm text-zinc-500">Ready for review</p>
                    </div>
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-amber-500/10 text-amber-600">
                        <ion-icon name="document-text-outline" class="text-2xl"></ion-icon>
                    </div>
                </div>
                <div class="mt-6 flex items-center gap-2 text-xs font-semibold text-amber-600">
                    <span class="inline-flex h-2 w-2 rounded-full bg-amber-400"></span>
                    Draft queue in progress
                </div>
            </div>

            <div class="group rounded-2xl border border-zinc-200 bg-zinc-900 p-6 text-white shadow-lg shadow-zinc-900/20 transition hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-[0.2em] text-zinc-300">Total Articles</p>
                        <p class="mt-3 text-3xl font-bold">{{ $totalArticles }}</p>
                        <p class="mt-2 text-sm text-zinc-300">All time inventory</p>
                    </div>
                    <div class="grid h-12 w-12 place-items-center rounded-2xl bg-white/10 text-white">
                        <ion-icon name="albums-outline" class="text-2xl"></ion-icon>
                    </div>
                </div>
                <a wire:navigate href="/dashboard/articles" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-white/90 hover:text-white">
                    View all articles
                    <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                </a>
            </div>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-[2fr_1fr]">
            <div class="rounded-2xl border border-zinc-200 bg-white shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-zinc-200 px-6 py-5">
                    <div>
                        <h2 class="text-lg font-semibold text-zinc-900">Recent Articles</h2>
                        <p class="text-sm text-zinc-500">Latest updates across your content library.</p>
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-emerald-600">
                        <span class="inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                        Live sync
                    </div>
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
                            @forelse($articles as $article)
                            <tr wire:key="article-{{ $article->id }}" class="transition hover:bg-zinc-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-zinc-900">{{ $article->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-zinc-600 line-clamp-1 max-w-xs">{{ Str::limit($article->content, 60) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        {{ $article->created_at->format('M d, Y') }}
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
                                        <button wire:click="delete({{ $article->id }})" wire:confirm="Are you sure you want to delete this article?" class="text-zinc-500 hover:text-red-600" title="Delete">
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
            </div>

            <div class="flex flex-col gap-6">
                <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-semibold text-zinc-900">Quick Actions</h3>
                    <p class="mt-2 text-sm text-zinc-500">Jump into high impact tasks.</p>
                    <div class="mt-6 space-y-3">
                        <a wire:navigate href="/dashboard/articles/create" class="flex items-center justify-between rounded-xl border border-zinc-200 px-4 py-3 text-sm font-semibold text-zinc-900 transition hover:border-zinc-900 hover:bg-zinc-50">
                            Draft a new article
                            <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                        </a>
                        <a wire:navigate href="/dashboard/articles" class="flex items-center justify-between rounded-xl border border-zinc-200 px-4 py-3 text-sm font-semibold text-zinc-900 transition hover:border-zinc-900 hover:bg-zinc-50">
                            Review drafts
                            <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                        </a>
                        <a wire:navigate href="/" class="flex items-center justify-between rounded-xl border border-zinc-200 px-4 py-3 text-sm font-semibold text-zinc-900 transition hover:border-zinc-900 hover:bg-zinc-50">
                            Preview site
                            <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                        </a>
                    </div>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-zinc-900 p-6 text-white shadow-lg shadow-zinc-900/20">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-base font-semibold">Editorial Momentum</h3>
                            <p class="mt-2 text-sm text-white/70">Keep drafts moving to published.</p>
                        </div>
                        <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-semibold">This week</span>
                    </div>
                    <div class="mt-6 space-y-4 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-white/70">Drafts in queue</span>
                            <span class="font-semibold">{{ $draftArticles }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-white/70">Published</span>
                            <span class="font-semibold">{{ max($totalArticles - $draftArticles, 0) }}</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-white/10">
                            <div class="h-2 w-2/3 rounded-full bg-white/60"></div>
                        </div>
                        <p class="text-xs text-white/70">Aim for two publishes per week to stay ahead.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
