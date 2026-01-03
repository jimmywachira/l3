<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <!-- Breadcrumb Navigation -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center text-blue-600 space-x-4">
            <li>
                <div>
                    <a wire:navigate href="/" class="text-gray-400 hover:text-gray-500">
                        <ion-icon name="home-outline" class="flex-shrink-0 h-5 w-5"></ion-icon>
                        <span class="sr-only">Home</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <ion-icon name="chevron-forward-outline" class="flex-shrink-0 h-5 w-5 text-gray-300"></ion-icon>
                    <a wire:navigate href="/articles" class="ml-4 text-gray-500 hover:text-gray-700">Articles</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <ion-icon name="chevron-forward-outline" class="flex-shrink-0 h-5 w-5 text-gray-300"></ion-icon>
                    <span class="ml-4 text-gray-500 truncate max-w-xs" aria-current="page">{{ $article->title }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <article class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <!-- Hero Section with Image & Overlay -->
        <div class="relative h-96 w-full group">
            <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&auto=format&fit=crop&w=1679&q=80" alt="Cover image for {{ $article->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/50 to-transparent"></div>

            <div class="absolute bottom-0 left-0 p-8 w-full">
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-300 mb-4">
                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Technology</span>
                    <div class="flex items-center">
                        <ion-icon name="calendar-outline" class="mr-2"></ion-icon>
                        {{-- {{ $article->created_at->format('M d, Y') ?? '-'}} --}}
                    </div>
                    <div class="flex items-center">
                        <ion-icon name="time-outline" class="mr-2"></ion-icon>
                        {{ ceil(str_word_count($article->content) / 200) }} min read
                    </div>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight mb-2 drop-shadow-lg">
                    {{ $article->title }}
                </h1>
            </div>
        </div>

        <!-- Article Content Wrapper -->
        <div class="px-6 py-10 sm:px-10 lg:px-12">

            <!-- Author & Actions Bar -->
            <div class="flex flex-col sm:flex-row justify-between items-center border-b border-gray-100 pb-4 mb-5 gap-6">
                <div class="flex items-center space-x-4">
                    <div class="h-12 w-12 rounded-full bg-gradient-to-tr from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-xl shadow-md">
                        {{ substr($article->title, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Editorial Team</p>
                        {{-- <p class="text-xs text-gray-500">Published {{ $article->created_at->diffForHumans() }}</p> --}}
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <button class="group flex items-center justify-center h-10 w-10 rounded-full bg-gray-50 text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200" title="Share on Twitter">
                        <ion-icon size="large" name="logo-twitter" class="text-xl"></ion-icon>
                    </button>
                    <button class="group flex items-center justify-center h-10 w-10 rounded-full bg-gray-50 text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200" title="Share on Facebook">
                        <ion-icon size="large" name="logo-facebook" class="text-xl"></ion-icon>
                    </button>
                    <button class="group flex items-center justify-center  rounded-full bg-gray-50 text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition-all duration-200" title="Copy Link">
                        <ion-icon size="large" name="link-outline" class="text-xl"></ion-icon>
                    </button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="prose prose-lg prose-indigo max-w-none text-gray-600 leading-loose first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 first-letter:mr-3 first-letter:float-left">
                {!! nl2br(e($article->content)) !!}
            </div>

            <!-- Footer / Tags -->
            <div class="mt-12 pt-8 border-t border-gray-100">
                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-gray-50 text-gray-600 rounded-lg hover:bg-gray-100 cursor-pointer transition-colors">#Development</span>
                    <span class="px-4 py-2 bg-gray-50 text-gray-600 rounded-lg hover:bg-gray-100 cursor-pointer transition-colors">#Tech</span>
                </div>
            </div>
        </div>
    </article>
</div>
