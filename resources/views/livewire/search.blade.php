<div class="w-2xl p-2">
    <form>
        <div class="m-2">
            <input wire:model.live.debounce.300ms="searchText" type="text" class="w-full border-2 border-black px-8 py-2 hover:text-blue-600" placeholder="{{ $placeholder }}">
            {{-- <button {{empty($searchText) ? 'disabled' : ''}} wire:click.prevent="clear()" class="disabled:bg-gray-300/50 p-4 border bg-blue-700 text-white rounded-md">clear</button> --}}
        </div>
    </form>

    {{-- @if(!empty($searchText))
    <livewire:search-results :results="$results" :show="!empty($results)" :placeholder="$placeholder" />
    @endif --}}
    @if(!empty($searchText))
        <div wire:transition.duration.1s class="mt-2">
            <livewire:search-results :results="$results" />
        </div>
    @endif
</div>
