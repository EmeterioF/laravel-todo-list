@extends('master')
@section('content')
<section class="section flex flex-col items-center gap-20">
    
    <form action="{{ route('task.create') }}" method="POST" class="mt-20 p-6 bg-[#3C3D37] rounded">
    @csrf
    <div class="grid grid-cols-2 gap-4 text-2xl">
        <label for="title">TITLE:</label>
        <div class="flex flex-col">
            <input value="{{ old('title') }}" class="border-white border-2 rounded" type="text" name="title" />
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <label for="priority">PRIORITY:</label>
        <div class="flex flex-col">
            <select name="priority" class="text-[#E9E3DF] rounded">
                <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }} class="text-[#181C14]">High</option>
                <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }} class="text-[#181C14]">Medium</option>
                <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }} class="text-[#181C14]">Low</option>
            </select>
            @error('priority')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <label for="due_date">DUE DATE:</label>
        <div class="flex flex-col">
            <input value="{{ old('due_date') }}" class="border-white border-2 rounded" type="date" name="due_date" />
            @error('due_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <a href="{{ route('task.home') }}" class="p-4 bg-[#697565] text-center font-bold text-[#ECDFCC] rounded">BACK</a>
        <button class="p-4 bg-[#697565] font-bold text-[#ECDFCC] rounded">CREATE TASK!</button>
    </div>
</form>

    <img 
        class="w-64 h-64"
        src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNm13bnBmYTl3OWh4Ynhma3pxcGE1cjIxdmUxZjJwcnV5dHR2NmtsYyZlcD12MV9zdGlja2Vyc19zZWFyY2gmY3Q9cw/H7o1rKmSUQbx18TwXv/giphy.gif" alt="oguricap">
</section>
<h1>EVERY TASK IS ONE STEP CLOSER TO YOUR GOAL</h1>
@endsection