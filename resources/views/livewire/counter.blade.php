<div class="p-16 flex justify-center gap-6 items-center">
    <button wire:click='inc' class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white">
        +
    </button>
    <span>{{$counter}}</span>
    <button wire:click='dec' class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white">
        -
    </button>
</div>
