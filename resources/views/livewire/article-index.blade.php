<div class="min-h-screen bg-gradient-to-b from-zinc-50 via-white to-zinc-100 py-12">
    <div wire:offline class="mx-auto mb-6 max-w-5xl rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-center text-sm font-semibold text-red-600">You are currently offline. Some features may not be available.</div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[1.3fr_0.7fr] lg:items-end">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-zinc-400">Latest Insights</p>
                <h2 class="mt-3 text-3xl font-bold text-zinc-900 sm:text-4xl">Discover the stories shaping the craft</h2>
                <p class="mt-3 max-w-2xl text-base text-zinc-600">
                    Tutorials, product updates, and editorial picks from our team. Fresh ideas, expertly curated.
                </p>
            </div>
            <div class="rounded-3xl border border-zinc-200 bg-white/80 p-5 shadow-sm backdrop-blur">
                <p class="text-xs uppercase tracking-[0.2em] text-zinc-400">Quick stats</p>
                <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
                    <div class="rounded-2xl border border-zinc-200 bg-white px-4 py-3">
                        <p class="text-xs text-zinc-500">Articles</p>
                        <p class="mt-2 text-2xl font-semibold text-zinc-900">{{ $articles->count() }}</p>
                    </div>
                    <div class="rounded-2xl border border-zinc-200 bg-white px-4 py-3">
                        <p class="text-xs text-zinc-500">Average read</p>
                        <p class="mt-2 text-2xl font-semibold text-zinc-900">~{{ $articles->count() ? ceil($articles->avg(fn ($article) => str_word_count($article->content)) / 200) : 0 }} min</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-8 max-w-4xl">
            <livewire:search />
        </div>

        @if($articles->count() > 0)
        @php $featured = $articles->first(); @endphp
        <div wire:offline.class.remove='bg-blue-300' class="mt-12 overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-xl transition-shadow duration-300 hover:shadow-2xl lg:grid lg:grid-cols-2">
            <div class="relative h-64 overflow-hidden lg:h-full">
                <img class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 hover:scale-105" src="https://picsum.photos/seed/{{ $featured->id }}/900/700" alt="{{ $featured->title }}">
                <div class="absolute left-6 top-6 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-zinc-700 shadow-sm">Featured</div>
            </div>
            <div class="flex flex-col justify-center p-8 lg:p-12">
                <div class="flex items-center gap-2 text-xs font-semibold text-zinc-400">
                    <span>{{ $featured->created_at->format('M d, Y') }}</span>
                    <span>&bull;</span>
                    <span>{{ ceil(str_word_count($featured->content) / 200) }} min read</span>
                </div>
                <a wire:navigate href="/articles/{{ $featured->id }}" class="mt-4 block">
                    <h3 class="text-3xl font-bold text-zinc-900 transition-colors hover:text-zinc-700">{{ $featured->title }}</h3>
                    <p class="mt-4 text-base text-zinc-600 line-clamp-3">{{ Str::limit($featured->content, 200) }}</p>
                </a>
                @if(!empty($featured->tags))
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach($featured->tags as $tag)
                        <span class="rounded-full bg-zinc-900 px-3 py-1 text-xs font-semibold text-white">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
                <div class="mt-6 flex items-center gap-3">
                    <div class="grid h-10 w-10 place-items-center rounded-2xl bg-zinc-900 text-sm font-semibold text-white">
                        {{ substr($featured->title, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-zinc-900">Editorial Team</p>
                        <p class="text-xs text-zinc-500">Feature story</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 grid gap-8 lg:grid-cols-3">
            @foreach($articles->skip(1) as $article)
            <div wire:key="article-{{ $article->id }}" class="group flex flex-col overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <div class="relative h-48 overflow-hidden">
                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://picsum.photos/seed/{{ $article->id }}/700/500" alt="{{ $article->title }}">
                    <div class="absolute right-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-zinc-700">Article</div>
                </div>
                <div class="flex flex-1 flex-col p-6">
                    <a wire:navigate href="/articles/{{ $article->id }}" class="mt-2 block">
                        <p class="text-xl font-semibold text-zinc-900 transition-colors group-hover:text-zinc-700">{{ $article->title }}</p>
                        <p class="mt-3 text-sm text-zinc-600 line-clamp-3">{{ Str::limit($article->content, 110) }}</p>
                    </a>
                    @if(!empty($article->categories))
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach($article->categories as $category)
                            <span class="rounded-full border border-zinc-200 bg-zinc-50 px-3 py-1 text-xs font-semibold text-zinc-600">{{ $category }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="mt-6 flex items-center gap-3 border-t border-zinc-100 pt-4">
                        <div class="grid h-10 w-10 place-items-center rounded-2xl bg-zinc-100 text-sm font-semibold text-zinc-600">
                            {{ substr($article->title, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-zinc-900">Editorial Team</p>
                            <div class="flex items-center gap-2 text-xs text-zinc-500">
                                <time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->format('M d') }}</time>
                                <span>&bull;</span>
                                <span>{{ ceil(str_word_count($article->content) / 200) }} min</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="mt-16 rounded-3xl border border-zinc-200 bg-white p-12 text-center shadow-sm">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-zinc-100">
                <ion-icon name="newspaper-outline" class="text-3xl text-zinc-400"></ion-icon>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-zinc-900">No articles found</h3>
            <p class="mt-2 text-sm text-zinc-500">Check back later for new content.</p>
        </div>
        @endif
    </div>
</div>
