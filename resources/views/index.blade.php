<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">


    <div  class="container bg-white max-w-md mx-auto h-48 my-8 rounded-lg overflow-hidden space-y-4">
    <p class="w-full py-4 bg-slate-100 mt-8  text-center">http://0.0.0.0:8080/api/users/ </p>
    <p class="w-full py-4 bg-slate-100 text-center">http://0.0.0.0:8080/api/profiles/</p>

    </div>
    <div class="container px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($users as $user)
                <div class="bg-white rounded-lg ">
                    <h1 class="text-center text-lg mb-4 font-bold uppercase">{{ $user->name }}</h1>
                    <p class="text-center text-md mb-4">{{ $user->email }}</p>
                    <p class="text-center text-md mb-4">{{ $user->profile_id }} {{ $user->profile->name }}</p>
                    <p class="text-center text-md mb-4">{{ $user->state }}</p>
                </div>
            @endforeach
            <div class="mb-10">
                {{ $users->links() }}
            </div>
        </div>


    </div>


</body>

</html>
