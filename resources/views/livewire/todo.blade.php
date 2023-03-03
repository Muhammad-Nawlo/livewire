<div class="flex flex-col w-[300px] mx-auto py-16">
    <div class="flex gap-4 justify-between">
        <div>
            <input type="text" wire:model="todoBody" wire:keydown.enter="add" placeholder="Add new Todo"
                class="flex-1">
            @if (!$todoBodyValid)
                <p>Todo should not be empty</p>
            @endif
        </div>
        <button class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white" wire:click="add">Add
        </button>
    </div>
    <div class="py-6">
        @if (count($todoItems) == 0)
            <p class="text-gray-500 text-center">There are no todos</p>
        @endif
        @foreach ($todoItems as $index => $todoItems)
            <div class="flex gap-4 justify-between items-center py-1">
                <input type="checkbox" {{ $todoItems->completed ? ' checked' : '' }}
                    wire:change="toggleTodo({{ $todoItems->id }})">
                <label class="flex-1 {{ $todoItems->completed ? 'line-through' : '' }}">{{ $todoItems->body }}</label>
                <button wire:click="delete({{ $todoItems->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        @endforeach
    </div>
</div>
