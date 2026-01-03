<div class="{{ $show ? 'block' : 'hidden' }} relative z-50">
    <div class="absolute top-0 left-0 w-full mt-2 bg-white rounded-2 rounded-r shadow-2xl  overflow-hidden ring-1 ring-black ring-opacity-5 transform transition-all">
        @if(count($results) === 0)
        <div class="px-4 py-6 text-center">
            <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-gray-100">
                <ion-icon name="search-outline" class="text-gray-400 text-xl"></ion-icon>
            </div>
            <h3 class="mt-2 text-gray-900">No results found</h3>
            <p class="mt-1 text-gray-500">We couldn't find anything matching your search.</p>
        </div>
        @else
        <ul role="list" class="max-h-96 overflow-y-auto divide-y divide-gray-100">
            @foreach($results as $result)
            <li wire:key="result-{{ $result->id }}">
                <a wire:navigate href="/articles/{{ $result->id }}" class="block px-4 py-4 hover:bg-gray-50 transition duration-150 ease-in-out group">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class=text-gray-900 truncate group-hover:text-blue-600 transition-colors">
                                {{ $result->title }}
                            </p>
                            <p class="mt-1 text-xs text-gray-500 line-clamp-2">
                                {{ Str::limit($result->content, 80) }}
                            </p>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="bg-gray-50 px-4 py-2 text-xs text-gray-500 border-t border-gray-100 flex justify-between items-center">
            <span>{{ count($results) }} result{{ count($results) !== 1 ? 's' : '' }} found</span>
            <span class="text-gray-400">Press Esc to close</span>
        </div>
        @endif
    </div>
</div>
