<x-app-layout>
    <div class="min-h-screen grid grid-cols-8 ">
        <div class="bg-primary col-span-6 m-7 rounded-xl relative">
            <div class="bg-alt-secondary w-full h-1/2 rounded-xl relative">
                <div class="flex justify-end px-4 pt-5">
                    <a href="{{route('profile.edit')}}">
                        <i class="fa-solid fa-pen text-white text-3xl cursor-pointer"></i>
                    </a>
                </div>
            </div>
            <img src="{{asset('images/user.png')}}" class="rounded-full absolute top-1/4 left-6 w-52" alt="user">
            <div class="grid grid-cols-2 mt-24">
                <div class="ml-5">
                    <h2 class="text-3xl text-white">
                        @if (Auth::user()->rol=="user")
                            {{$user[0]['name']}}
                        @else
                            {{$user[0]['company_name']}}
                        @endif
                    </h2>
                    <p class="text-xl text-white">
                        @if (Auth::user()->rol=="user")
                            {{$user[0]['nationality']}}
                        @else
                            {{$user[0]['location']}}
                        @endif
                        
                    </p>
                    @if (Auth::user()->rol=="company")
                        <p class="text-xl text-white">
                            {{$user[0]['work_area']}}
                        </p>
                        <p class="text-xl text-white">
                            {{$user[0]['number_employees']}}
                        </p>
                    @endif
                </div>
                <div class="ml-5">
                    <p class="text-3xl text-white">
                        @if (Auth::user()->rol=="user")
                            Sobre Mí... <i class="fa-solid fa-rocket"></i>
                        @else
                            Información de la empresa <i class="fa-solid fa-rocket"></i>
                        @endif
                    </p> 
                    <p class="text-white ">
                        @if (Auth::user()->rol=="user")
                            @if ($user[0]['about_me'])
                                {{$user[0]['about_me']}}
                            @else
                                No hay información disponible
                            @endif
                        @else
                            {{$user[0]['information']}}
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
                    @if ($curriculums->count()>0)
                    <ul>
                        @foreach ($curriculums as $curriculum)
                        <li class="text-white cursor-pointer">
                            <form  method="POST" action="{{route("cv.download")}}">
                                @csrf
                                <input type="hidden" name="cv_path" value="{{$curriculum->cv_template}}">
                                <input type="hidden" name="cv_tittle" value="{{$curriculum->cv_tittle}}">
                                <button type="submit"> -{{$curriculum->cv_tittle}}</button>
                            </form>
                        </li>
                        @endforeach
                        
                    </ul>
                    @if ($curriculums->count()>=4)
                    <a href="{{route('cv.show')}}" class="flex flex-col justify-center items-center cursor-pointer mt-3">
                        <p class="text-xl text-white">Mostrar Más</p>
                        <i class="fa-solid fa-sort-down text-3xl text-white"></i>
                    </a>
                    @endif
                    @else
                        <p class="text-white text-xl text-center">No hay curriculums disponibles</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>