@extends('master')

@section('content')
    <div class="flex text-9xl font-bold justify-around items-center">
        <h1>DO THE</h1>
        <img
        src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOWFiMzI3cW4yZDMxaXRzMHk3cHNuemxyYnRrcWp0cHZzNXdpbDB2byZlcD12MV9zdGlja2Vyc19zZWFyY2gmY3Q9cw/kfifjIkgtpjGZA9CxU/giphy.gif"
        alt="Oguri Cap GIF"
        class="w-64 h-64 object-cover"/>
        <h1>WORK</h1>
    </div>
    <h2 class="text-4xl font-bold mr-380">TOTAL TASKS: {{ $total }}</h2>
    <section class=" section flex-col justify-center h-full items-center w-full rounded-2xl bg-[#3C3D37] p-7 mt-10">
        <!--TO DO LIST CONTAINER-->
        <div class="grid grid-cols-5 gap-4">
            <h2 class="font-bold text-2xl ">TITLE</h2>
            <h2 class="font-bold text-2xl ">PRIORITY</h2>
            <h2 class="font-bold text-2xl ">DUE DATE</h2>
            <h2 class="font-bold text-2xl ">COMPLETED</h2>
            <div></div>
            @foreach($tasks as $task)
                    <p>{{ $task->title }}</p>
                    <p>{{ $task->priority }}</p>
                    <p>{{ $task->due_date }}</p>
                    @if ($task->is_completed)
                        <form action="{{ route('task.toggle', $task->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-xl font-bold">COMPLETED</button>
                        </form>
                    @else
                        <form action="{{ route('task.toggle', $task->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-xl font-bold">NOT COMPLETED</button>
                        </form>
                    @endif
                    <div class="flex justify-around">

                        <form action="{{ route('task.editView', $task->id) }}" method="PUT">
                            @csrf
                            <button type="submit" class="text-xl font-bold">EDIT</button>
                        </form>
                        <form action="{{ route('task.delete', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xl font-bold">DELETE</button>
                        </form>
                    </div>
            @endforeach
        </div>
    </section>
@endsection
