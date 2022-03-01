<x-app-layout>
    <div class="min-h-screen grid grid-cols-8 ">
        <div class="bg-primary col-span-6 m-7 rounded-xl relative">
            <div class="bg-alt-secondary w-full h-1/2 rounded-xl relative">
                <i class="fa-solid fa-camera text-3xl text-white cursor-pointer absolute right-4 top-2"></i>
            </div>
            <img src="{{asset('images/user.png')}}" class="rounded-full absolute top-1/4 left-6" alt="user">
            <div class="grid grid-cols-2 mt-24">
                <div class="ml-5">
                    <h2 class="text-3xl text-white">Carlos Herrera</h2>
                    <p class="text-xl text-white">San Salvador, El Salvador</p>
                </div>
                <div class="ml-5">
                    <p class="text-3xl text-white">
                        Sobre Mí... <i class="fa-solid fa-rocket"></i>
                    </p> 
                    <p class="text-white ">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem corporis incidunt nemo optio animi iure, unde architecto excepturi dicta maiores voluptate aspernatur culpa commodi magni deserunt adipisci impedit? Nisi, tempore.</p>
                </div>
            </div>
            <i class="fa-solid fa-pen-clip absolute top-1/2 mt-6 right-4 text-2xl text-white cursor-pointer"></i>
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