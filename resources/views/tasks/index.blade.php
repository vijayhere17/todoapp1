<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-8 max-w-2xl">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold text-center mb-4">To-Do List</h1>
        <form action="/tasks" method="POST" class="mb-6">
            @csrf
            <div class="flex">
                <input type="text" name="name" class="border p-2 flex-grow rounded-l-lg" placeholder="New Task" required>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-r-lg hover:bg-blue-600">Add</button>
            </div>
        </form>
        <ul class="space-y-4">
            @foreach($tasks as $task)
                <li class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <form action="/tasks/{{ $task->id }}" method="POST" class="mr-4">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" {{ $task->completed ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-green-600" onchange="this.form.submit()">
                        </form>
                        <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }} text-lg">{{ $task->name }}</span>
                    </div>
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
