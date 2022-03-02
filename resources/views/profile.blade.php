<x-app-layout>
    <div class="min-h-screen grid grid-cols-8 ">
        <div class="bg-primary col-span-6 m-7 rounded-xl relative">
            <div class="bg-alt-secondary w-full h-1/2 rounded-xl relative">
            </div>
            <img src="{{$user[0]['profile_photo_url']}}" class="rounded-full absolute top-1/4 left-6 w-52" alt="user">
            <div class="grid grid-cols-2 mt-24">
                <div class="ml-5">
                    <h2 class="text-3xl text-white">{{$user[0]['name']}}</h2>
                    <p class="text-xl text-white">{{$user[0]['nationality']}}</p>
                </div>
                <div class="ml-5">
                    <p class="text-3xl text-white">
                        Sobre Mí... <i class="fa-solid fa-rocket"></i>
                    </p> 
                    <p class="text-white ">
                        @if ($user[0]['about_me'])
                            {{$user[0]['about_me']}}
                        @else
                            No hay información disponible
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="m-5 col-span-2">
            <div class="bg-primary rounded-lg w-full px-3 py-2">
                <p class="text-white text-xl"><i class="fa-solid fa-bookmark text-2xl"></i> Mis Empleos Aplicados</p>
                <div class="mt-2">
                    <ul>
                        <li class="text-white cursor-pointer">
                            <p> -Desarrollo web con PHP</p>
                        </li>
                        <li class="text-white cursor-pointer">
                            <p> -Backend Developer with MVC</p>
                        </li>
                        <li class="text-white cursor-pointer">
                            <p> -Frontend Developer with React</p>
                        </li>
                        <li class="text-white cursor-pointer">
                            <p> -.Net Project Manager</p>
                        </li>
                    </ul>
                    <div class="flex flex-col justify-center items-center cursor-pointer mt-3">
                        <p class="text-xl text-white">Mostrar Más</p>
                        <i class="fa-solid fa-sort-down text-3xl text-white"></i>
                    </div>
                </div>
            </div>
            <div class="bg-primary rounded-lg w-full px-3 py-2 mt-5">
                <p class="text-white text-xl"><i class="fa-solid fa-file-lines text-2xl"></i> Mis Curriculums</p>
                <div class="mt-2">
                    <ul>
                        <li class="text-white cursor-pointer">
                            <p> -Para Desarrollo web</p>
                        </li>
                        <li class="text-white cursor-pointer">
                            <p> -Para Backend Developer</p>
                        </li>
                        <li class="text-white cursor-pointer">
                            <p> -Para Frontend Developer</p>
                        </li>
                        <li class="text-white cursor-pointer">
                            <p> -Para SCRUM Master</p>
                        </li>
                    </ul>
                    <div class="flex flex-col justify-center items-center cursor-pointer mt-3">
                        <p class="text-xl text-white">Mostrar Más</p>
                        <i class="fa-solid fa-sort-down text-3xl text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>