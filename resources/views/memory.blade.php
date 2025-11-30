@extends('master')

@section('content')
    <section class="section flex-col justify-center h-full items-center w-full rounded-2xl bg-[#1E2A2A] p-7 mt-10">
        <!-- MEMORY / DELETED TASKS CONTAINER -->
        <div class="grid grid-cols-4 gap-6 text-[#F0E8D0]">
            <!-- Header -->
            <h2 class="font-bold text-2xl text-[#F0E8D0]">TITLE</h2>
            <h2 class="font-bold text-2xl text-[#F0E8D0]">PRIORITY</h2>
            <h2 class="font-bold text-2xl text-[#F0E8D0]">DUE DATE</h2>
            <div></div>

            <!-- Deleted / Archived Tasks -->
            @foreach($memories as $memory)
                <p class="text-lg">{{ $memory->title }}</p>
                <p class="text-lg capitalize">{{ $memory->priority }}</p>
                <p class="text-lg">{{ $memory->due_date }}</p>
                <div class="flex justify-center">
                    <form action="{{ route('task.restore', $memory->id) }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="text-xl font-bold text-[#F0E8D0] hover:text-white transition px-4">
                            RESTORE
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
@endsection