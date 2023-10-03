<?php

namespace App\View\Components;

use App\Models\TodoItem;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class TodoList extends Component
{
    public string $status;
    public Collection $items;

    public function __construct(string $status = 'all')
    {
        $this->items = collect();
        $this->status = $status;
    }

    public function render()
    {
        $this->items = match($this->status) {
            'all' => TodoItem::query()->orderBy('status', 'desc')->get(),
            'open' => TodoItem::where('status', 'open')->get(),
            'done' => TodoItem::where('status', 'done')->get(),
            default => throw new \Exception(),
        };
        return view('components.todo-list');
    }
}
