<div id="todo-list-table">
    <div>
        <ul class="nav nav-pills" aria-label="Tabs">
            <li
                hx-get="{{ route('list', ['status' => 'all']) }}"
                hx-trigger="click"
                hx-target="#todo-list-table"
                class="nav-item"
            >
                <a class="nav-link {{ $status === 'all' ? 'active' : '' }}" href="#">
                    All
                </a>
            </li>
            <li
                hx-get="{{ route('list', ['status' => 'open']) }}"
                hx-trigger="click"
                hx-target="#todo-list-table"
                class="nav-item">
                <a class="nav-link {{ $status === 'open' ? 'active' : '' }}" href="#">
                    Open
                </a>
            </li>
            <li
                hx-get="{{ route('list', ['status' => 'done']) }}"
                hx-trigger="click"
                hx-target="#todo-list-table"
                class="nav-item">
                <a class="nav-link {{ $status === 'done' ? 'active' : '' }}" href="#">
                    Done
                </a>
            </li>
        </ul>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    @if($item->status === 'open')
                        <button
                            hx-put="{{ route('complete', ['id' => $item->id, 'status' => $status]) }}"
                            hx-target="#todo-list-table"
                            hx-swap="outerHTML"
                            class="btn btn-outline-primary"
                        >
                            Complete
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <form hx-target="#todo-list-table" hx-post="{{ route('add') }}">
        <label for="new-todo-name">Add a new todo item: </label>
        <input id="new-todo-name" type="text" name="name" placeholder="New todo"/>
        <button class="btn btn-outline-primary">Add</button>
    </form>
</div>
