<?php

namespace App\Http\Controllers;

use App\Http\ViewComponentResponse;
use App\Models\TodoItem;
use App\View\Components\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): Response|View
    {
        return view('index', [
            'status' => 'all',
        ]);
    }

    public function list(Request $request): Response
    {
        $status = $request->query('status', 'all');

        return new ViewComponentResponse(new TodoList($status));
    }

    public function complete(Request $request): Response
    {
        /** @var TodoItem $todoItem */
        $todoItem = TodoItem::find($request->get('id'));
        $todoItem->status = 'done';

        $todoItem->save();

        return $this->list($request);
    }

    public function add(Request $request): Response
    {
        $todoItem = new TodoItem();
        $todoItem->name = $request->get('name');
        $todoItem->status = 'open';

        $todoItem->save();

        return $this->list($request);
    }
}
