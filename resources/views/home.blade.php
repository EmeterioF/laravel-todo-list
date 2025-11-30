@extends('master')

@section('content')
    <section class=" section flex-col text-[#F0E8D0] justify-center h-full items-center w-full rounded-2xl bg-[#2A3A3A] p-7 mt-10">
        <div class="grid grid-cols-4 gap-4">
            <h2 class="font-bold text-2xl ">TITLE</h2>
            <h2 class="font-bold text-2xl ">PRIORITY</h2>
            <h2 class="font-bold text-2xl ">DUE DATE</h2>
            <div></div>
            @foreach($tasks as $task)
                    <p>{{ $task->title }}</p>
                    <p>{{ $task->priority }}</p>
                    <p>{{ $task->due_date }}</p>
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