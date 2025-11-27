<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>To-Do List</title>
</head>
<body class="h-screen w-full bg-[#181C14] text-[#ECDFCC] p-4">
    <div class="flex gap-4 mt-4 justify-between">
        <div>
            <a class="text-4xl font-bold" href="{{ route('task.home') }}">TO-DO LIST</a>
            <p class="opacity-80">powered by Figuracion</p>
        </div>
        <div class="flex gap-6 mr-4 items-center" >
            <a class="p-4 bg-[#697565] rounded font-bold text-[#ECDFCC]  " href="{{ route('go.task_creation') }}">ADD TO DO</a>
            <a class="p-4 bg-[#697565] rounded font-bold text-[#ECDFCC] " href="{{ route('task.memory') }}">MEMORY</a>
        </div>
    </div>
    
    <main class="flex flex-col items-center justify-center gap-4 p-10">
        @yield('content')
    </main>
    

</html>