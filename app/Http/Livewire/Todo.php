<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class Todo extends Component
{
    public  $todoItems;
    public string $todoBody = '';
    public bool $todoBodyValid = true;

    public function mount()
    {
        $this->getTodoItems();
    }
    public function render()
    {
        return view('livewire.todo');
    }
    public function getTodoItems(): void
    {
        $this->todoItems = TodoItem::all();
    }
    public function add(): void
    {
        $newTodo = new TodoItem();
        if (trim($this->todoBody) === '') {
            $this->todoBodyValid = false;
            return;
        }
        $this->todoBodyValid = true;

        $newTodo->body = $this->todoBody;
        $newTodo->completed = false;
        $newTodo->save();
        $this->todoBody = '';
        $this->getTodoItems();
    }
    public function toggleTodo(int $id): void
    {
        $todo = TodoItem::findOrFail($id);
        $todo->completed = !(bool) $todo->completed;
        $todo->save();
        $this->getTodoItems();
    }

    public function delete(int $id): void
    {
        TodoItem::find($id)->delete();
        $this->getTodoItems();
    }
}
