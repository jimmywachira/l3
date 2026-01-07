<div class=" min-h-screen py-12">
    <div wire:offline class="bg-red-600 text-white p-2 rounded-md mb-4 text-center"> You are currently offline. Some features may not be available. </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Latest Insights</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Discover the latest trends, tutorials, and stories from our team of developers and designers.
            </p>
        </div>

        @if($articles->count() > 0)
        {{-- Featured Article (First one) --}}
        @php $featured = $articles->first(); @endphp
        <div wire:offline.class.remove='bg-blue-300' class="mt-12 relative rounded-2xl shadow-xl overflow-hidden lg:grid lg:grid-cols-2 lg:gap-4 bg-white hover:shadow-2xl transition-shadow duration-300 group">
            <div class="relative h-64 lg:h-full overflow-hidden">
                <img class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://picsum.photos/seed/{{ $featured->id }}/800/600" alt="{{ $featured->title }}">
            </div>
            <div class="p-8 lg:p-12 flex flex-col justify-center">
                <div class="flex items-center text-sm font-medium text-blue-600 mb-2">
                    <span class="bg-blue-100 text-blue-800 px-2 py-0.5 rounded text-xs uppercase tracking-wide">Featured</span>
                    <span class="mx-2 text-gray-300">&bull;</span>
                    <span class="text-gray-500">{{ $featured->created_at->format('M d, Y') }}</span>
                </div>
                <a wire:navigate href="/articles/{{ $featured->id }}" class="block mt-2">
                    <h3 class="text-3xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-200">{{ $featured->title }}</h3>
                    <p class="mt-4 text-lg text-gray-500 line-clamp-3">{{ Str::limit($featured->content, 200) }}</p>
                </a>
                <div class="mt-6 flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-sm">
                            {{ substr($featured->title, 0, 1) }}
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-500 ">Editorial Team</p>
                        <div class="flex space-x-1 text-sm text-gray-500">
                            <time datetime="{{ $featured->created_at->format('Y-m-d') }}">{{ $featured->created_at->format('M d, Y') }}</time>
                            <span aria-hidden="true">&middot;</span>
                            <span>{{ ceil(str_word_count($featured->content) / 200) }} min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grid for the rest --}}
        <div class="mt-12 max-w-lg mx-auto grid gap-8 lg:grid-cols-3 lg:max-w-none">
            @foreach($articles->skip(1) as $article)
            <div wire:key="article-{{ $article->id }}" class="flex flex-col rounded-xl shadow-lg overflow-hidden bg-white hover:shadow-2xl transition-all duration-300 group transform hover:-translate-y-1">
                <div class="flex-shrink-0 relative h-48 overflow-hidden">
                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://picsum.photos/seed/{{ $article->id }}/600/400" alt="{{ $article->title }}">
                    <div class="absolute top-0 right-0 m-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-2 py-1 rounded shadow-sm">
                            Article
                        </span>
                    </div>
                </div>
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <a wire:navigate href="/articles/{{ $article->id }}" class="block mt-2">
                            <p class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $article->title }}</p>
                            <p class="mt-3 text-base text-gray-500 line-clamp-3">{{ Str::limit($article->content, 100) }}</p>
                        </a>
                    </div>
                    <div class="mt-6 flex items-center border-t border-gray-100 pt-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 font-bold border border-gray-200">
                                {{ substr($article->title, 0, 1) }}
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                Editorial Team
                            </p>
                            <div class="flex space-x-1 text-xs text-gray-500">
                                <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                                    {{ $article->created_at->format('M d') }}
                                </time>
                                <span aria-hidden="true">&middot;</span>
                                <span>{{ ceil(str_word_count($article->content) / 200) }} min</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center mt-20 py-20 bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                <ion-icon name="newspaper-outline" class="text-3xl text-gray-400"></ion-icon>
            </div>
            <h3 class="text-lg font-medium text-gray-900">No articles found</h3>
            <p class="mt-2 text-gray-500">Check back later for new content.</p>
        </div>
        @endif
    </div>
</div>
