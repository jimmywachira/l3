<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Manage Articles</h1>
        <a wire:navigate href="/dashboard/articles/create" class="border text-blue-600 border-blue-600 hover:bg-blue-700 hover:text-white py-2 px-4 rounded-full flex items-center gap-2 shadow transition transform hover:scale-105">
            <ion-icon name="add-circle-outline" class="text-xl"></ion-icon>
            <span>Create Article</span>
        </a>

    </div>

    <div class="justify-end flex gap-4 mb-4">
        <button class=" text-blue-600 p-2 rounded-full hover:text-2xl border-2 border-blue-700" wire:click='showAll()'>show all</button>
        <button wire:click='showPublished()' class="text-blue-600 p-2 rounded-full hover:text-2xl border-2 border-blue-700">published (
            <livewire:published-count placeholder-text="loading" />)
        </button>
    </div>

    <div class="px-6 py-4 rounded-full bg-white border-t border-gray-200">
        {{ $articles->links() }}
    </div>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 capitalize tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 capitalize tracking-wider">Preview</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 capitalize tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 capitalize tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($articles as $article)
                    <tr wire:key="article-{{ $article->id }}" class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-bold text-gray-900">{{ $article->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500 line-clamp-1 max-w-xs">{{ Str::limit($article->content, 60) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800">
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
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">
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
