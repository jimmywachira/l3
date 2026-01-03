<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>


        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 mb-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class=" truncate">Total Articles</dt>
                                <dd class="text-lg">{{ $totalArticles }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="">
                        <a href="{{ route('articles.index') }}" class=text-blue-600 hover:text-blue-500">View all</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Articles -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Manage Articles</h1>
            <a wire:navigate href="/dashboard/articles/create" class="bg-blue-600 hover:bg-blue-700 hover:text-white font-bold py-2 px-4 rounded-full flex items-center gap-2 shadow-md transition transform hover:scale-105">
                <ion-icon name="add-circle-outline" class="text-xl"></ion-icon>
                <span>Create Article</span>
            </a>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-200">

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left font-bold  capitalize tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left font-bold  capitalize tracking-wider">Preview</th>
                            <th scope="col" class="px-6 py-3 text-left font-bold  capitalize tracking-wider">Created</th>
                            <th scope="col" class="px-6 py-3 text-right font-bold  capitalize tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($articles as $article)
                        <tr wire:key="article-{{ $article->id }}" class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">{{ $article->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm  line-clamp-1 max-w-xs">{{ Str::limit($article->content, 60) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex leading-5 font-bold rounded-full bg-green-100 text-green-800">
                                    {{ $article->created_at->format('M d, Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 capitalize whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-4">
                                    <a wire:navigate href="/articles/{{ $article->id }}" class=" hover:text-blue-600 transition-colors" title="View">
                                        <ion-icon size="large" name="eye-outline" class="text-sm font-bold text-blue-400 hover:text-blue-600 transition-colors">show</ion-icon>
                                    </a>
                                    <a wire:navigate href="/dashboard/articles/{{ $article->id }}/edit" class=" hover:text-indigo-600 transition-colors" title="Edit">
                                        <ion-icon size="large" name="create-outline" class="text-sm font-bold text-blue-800 hover:text-blue-600 transition-colors">edit</ion-icon>
                                    </a>
                                    <button wire:click="delete({{ $article->id }})" wire:confirm="Are you sure you want to delete this article?" class=" hover:text-red-600 transition-colors" title="Delete">
                                        <ion-icon size="large" name="trash-outline" class="text-sm font-bold text-red-800 hover:text-red-600 capitalize transition-colors">delete</ion-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center ">
                                <div class="flex flex-col items-center justify-center">
                                    <ion-icon name="document-text-outline" class="text-4xl mb-2 text-gray-300"></ion-icon>
                                    <p class="text-lg">No articles found.</p>
                                    <p class="text-sm">Get started by creating a new article.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
