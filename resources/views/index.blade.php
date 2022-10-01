<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100" >


        <div  class="container px-4" >
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($users as $user )
                <div class="bg-white rounded-lg ">
                <h1 class="text-center text-lg mb-4 font-bold uppercase">{{$user->name}}</h1>
                <p class="text-center text-md mb-4">{{$user->email}}</p>
                <p class="text-center text-md mb-4">{{$user->profile_id}} {{$user->profile->name}}</p>
                <p class="text-center text-md mb-4">{{$user->state}}</p>
            </div>
                @endforeach
            </div>
            <div class="mb-10">
                {{$users->links()}}
            </div>

        </div>


    </body>
</html>
