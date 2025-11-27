@extends('master')
@section('content')
<section class="section">
    <form action="{{ route('task.create') }}" method="POST" class="mt-20 p-6 bg-[#361500] rounded">
        @csrf
        <div class="grid grid-cols-2 gap-4 text-2xl">
            <label for="title">TITLE:</label>
            <input class="border-white border-2 rounded" type="text" name="title" />

            <label for="priority">PRIORITY:</label>
            <select name="priority" class="text-[#E9E3DF] rounded">
                <option class="text-[#603601]" value="high">High</option>
                <option class="text-[#603601]" value="medium">Medium</option>
                <option class="text-[#603601]" value="low">Low</option>
            </select>

            <label for="due_date">DUE DATE:</label>
            <input class="border-white border-2 rounded" type="date" name="due_date" />

            <div></div>
            <button class="p-4 bg-[#CC9544] col-span-2 font-bold text-[#603601] rounded">CREATE TASK!</button>
        </div>
    </form>
</section>
@endsection