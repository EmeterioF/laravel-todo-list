@extends('master')

@section('content')
    <div class="flex text-9xl font-bold justify-around items-center">
        <h1>EVEN LEGENDS</h1>
        <img 
        src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOWFiMzI3cW4yZDMxaXRzMHk3cHNuemxyYnRrcWp0cHZzNXdpbDB2byZlcD12MV9zdGlja2Vyc19zZWFyY2gmY3Q9cw/kfifjIkgtpjGZA9CxU/giphy.gif" 
        alt="Oguri Cap GIF"
        class="w-64 h-64 object-cover"/>
        <h1>PEEK AT THEIR PAST</h1>
    </div>
    <section class=" section flex-col justify-center h-full items-center w-full rounded-2xl bg-[#3C3D37] p-7 mt-10">
        <!--TO DO LIST CONTAINER-->
        <div class="grid grid-cols-4 gap-4">
            <h2 class="font-bold text-2xl ">TITLE</h2>
            <h2 class="font-bold text-2xl ">PRIORITY</h2>
            <h2 class="font-bold text-2xl ">DUE DATE</h2>
            <div></div>
            @foreach($memories as $memory)
                    <p>{{ $memory->title }}</p>
                    <p>{{ $memory->priority }}</p>
                    <p>{{ $memory->due_date }}</p>
                    <div class="flex justify-around">
                        <form action="{{ route('task.restore', $memory->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-xl font-bold">RESTORE</button>
                        </form>
                    </div>
            @endforeach
        </div>
    </section>
@endsection