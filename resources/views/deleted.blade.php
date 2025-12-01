@extends('master')

@section('content')
    <section class="section flex-col justify-center h-full items-center w-full rounded-2xl bg-[#1E2A2A] p-7 mt-10">
        <!-- DELETED TASKS CONTAINER -->
        <div class="grid grid-cols-4 gap-6 text-[#F0E8D0]">
            <!-- Header -->
            <h2 class="font-bold text-2xl text-[#F0E8D0]">TITLE</h2>
            <h2 class="font-bold text-2xl text-[#F0E8D0]">PRIORITY</h2>
            <h2 class="font-bold text-2xl text-[#F0E8D0]">DUE DATE</h2>
            <div></div>

            <!-- Deleted / Archived Tasks -->
            @foreach($deletes as $deleted)
                <p class="text-lg">{{ $deleted->title }}</p>
                <p class="text-lg capitalize">{{ $deleted->priority }}</p>
                <p class="text-lg">{{ $deleted->due_date }}</p>
                <div class="flex justify-center">
                    <form action="{{ route('task.restore', $deleted->id) }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="text-xl font-bold text-[#F0E8D0] hover:text-white transition px-4">
                            RESTORE
                        </button>
                    </form>
                    <form action="{{ route('task.permaDelete', $deleted->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-xl font-bold text-[#F0E8D0] hover:text-white transition px-4">
                            DELETE
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
@endsection