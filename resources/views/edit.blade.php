@extends('master')
@section('content')
<section class="section flex flex-col items-center gap-20">
    
    <form action="{{ route('task.update', $task->id) }}" method="POST" class="mt-20 p-20 bg-[#1E2A2A] rounded-2xl">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4 text-2xl">

            <label for="title" class="text-[#F0E8D0]">TITLE:</label>
            <div class="flex flex-col">
                <input value="{{ old('title', $task->title) }}" 
                       class="bg-[#2A3A3A] border-white border-2 rounded text-white placeholder-[#A0B0B0] p-2" 
                       type="text" name="title" placeholder="Enter task title" />
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <label for="priority" class="text-[#F0E8D0]">PRIORITY:</label>
            <div class="flex flex-col">
                <select name="priority" class="bg-[#2A3A3A] text-[#F0E8D0] rounded p-2">
                    <option class="bg-[#1E2A2A] text-[#F0E8D0]" value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                    <option class="bg-[#1E2A2A] text-[#F0E8D0]" value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option class="bg-[#1E2A2A] text-[#F0E8D0]" value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                </select>
                @error('priority')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <label for="due_date" class="text-[#F0E8D0]">DUE DATE:</label>
            <div class="flex flex-col">
                <input value="{{ old('due_date', $task->due_date) }}" 
                       class="bg-[#2A3A3A] border-white border-2 rounded text-white p-2" 
                       type="date" name="due_date" />
                @error('due_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <a href="{{ route('task.home')}}" 
               class="p-4 bg-[#1E3A3A] hover:bg-[#152828] text-center font-bold text-[#F0E8D0] rounded transition">
               BACK
            </a>
            <button class="p-4 bg-[#1E3A3A] hover:bg-[#152828] font-bold text-[#F0E8D0] rounded transition">
                UPDATE TASK
            </button>
        </div>
    </form>
</section>

@endsection