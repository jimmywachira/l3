<div class="m-2 p-2">
    <form>
        <div class="m-2">
            <input wire:model.live="searchText" type="text" class="w-full border-2 border-black px-8 py-2 hover:text-blue-600 rounded-full rounded-l" placeholder="{{ $placeholder }}">
            {{-- <button {{empty($searchText) ? 'disabled' : ''}} wire:click.prevent="clear()" class="disabled:bg-gray-300/50 p-4 border bg-blue-700 text-white rounded-md">clear</button> --}}
        </div>
    </form>

    @if(!empty($searchText))
    <livewire:search-results :results="$results" :show="!empty($results)" :placeholder="$placeholder" />
    @endif
</div>
