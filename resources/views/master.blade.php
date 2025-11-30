<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>To-Do List</title>
</head>
<body class="h-screen w-full bg-black text-[#1A2A2A] p-4">       
    <div class="flex gap-4 mt-4 justify-between">
        <div>
            <a class="text-4xl text-[#F0E8D0] font-bold" href="{{ route('task.home') }}">BARRIOS TO-DO LIST</a>
        </div>
        <div class="flex gap-6 mr-4 items-center" >
            <a class="p-4 bg-[#1E3A3A] rounded font-bold text-[#F0E8D0] hover:bg-[#152828] transition" 
               href="{{ route('go.task_creation') }}">ADD TO DO</a>      
            <a class="p-4 bg-[#1E3A3A] rounded font-bold text-[#F0E8D0] hover:bg-[#152828] transition" 
               href="{{ route('task.memory') }}">MEMORY</a>
        </div>
    </div>
    
    <main class="flex flex-col items-center justify-center gap-4 p-10">
        @yield('content')
    </main>
</html>