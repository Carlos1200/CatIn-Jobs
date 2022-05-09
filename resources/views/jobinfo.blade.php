<x-app-layout>
    <div class='pb-6'>
        <div class='bg-primary mt-16 w-10/12 mx-auto p-4 px-6 flex flex-col rounded-lg'>
            <div class='w-auto font-semibold ml-12'>
                <!-- Titulo del Trabajo -->
                <h1 class='text-white text-4xl mb-4'>{{$job->title}}</h1>
            </div>
            <hr>
            <div class='flex flex-col mt-4 ml-12 text-lg'>
                <!--Tipo de Trabajo, Ubicacion y Salario-->
                <div class='flex flex-row text-lg mb-4 flex-wrap'>
                    <label class='block text-white'><span class='font-bold'>Compañía: </span>{{$job->company_name}} - {{$job->work_area}}</label>
                    <label class='block text-white ml-6'><span class='font-bold'>Trabajo: </span>{{$job->hiring_type}}</label>
                    <label class='block text-white ml-6'><span class='font-bold'>Ubicacion: </span>{{$job->location}}</label>
                    <label class='block text-white ml-6'><span class='font-bold'>Oferta salarial: </span>${{$job->salary}}</label>
                </div>
                <!-- Descripcion del trabajo -->
                <div class='flex flex-col'>
                    <p class='text-white block font-bold'>Descripcion:</p>
                    <p class='text-white ml-2 text-justify'>
                        {{$job->description}}
                    </p>
                </div>
                @if($isOpen)
                    @include('livewire.create')
                @endif
                <!-- Botones -->
                <div class='flex justify-center mt-4 text-lg'>
                    <form action="{{route('jobs.showDetails',['id'=>$job->id])}}" method="GET">
                        <input type="hidden" name="isOpen" value="true">
                        <input type='submit' class='bg-alt-secondary p-4 m-4 font-bold rounded-lg text-white hover:bg-transparent hover:text-alt-secondary hover:border-2 hover:border-alt-secondary transition-colors ease-in-out' value='Aplicar' />
                    </form>
                    <form action="{{route('profile.save')}}" method="POST">
                        @csrf
                        <input type='submit' class='text-alt-secondary transition-colors ease-in-out p-4 m-4 font-bold rounded-lg border-2 cursor-pointer border-alt-secondary hover:bg-alt-secondary hover:text-white hover:border-white' value='Guardar' />
                    </form>
                </div>
            </div>
        </div>
        @if (Auth::user()->id == $job->user_id)
            <div class="mt-5">
                <h3 class="text-white text-2xl text-center">CVs de aplicantes</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($cvs as $cv)
                    <div>
                        <div class="flex flex-col items-center">
                            <form class="flex flex-col items-center" method="POST" action="{{route("cv.download")}}">
                                @csrf
                                <i class="fa-solid fa-file-pdf text-7xl text-white mb-2"></i>
                                <p class="text-center text-xl text-white">{{$cv->cv_tittle}}</p>
            
                                <input type="hidden" name="cv_path" value="{{$cv->path}}">
                                <input type="hidden" name="cv_tittle" value="{{$cv->cv_tittle}}">
            
                                <button type="submit" class="bg-primary hover:bg-slate-800 text-white p-2 rounded-lg">Descargar</button>
                            </form>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-5">
                <h3 class="text-red-600 text-2xl text-center">Eliminar Publicacion</h3>
                <p class="text-white text-center">No se puede revertir los cambios una vez realizados</p>
                <form action="{{route('jobs.destroy',['id'=>$job->id])}}" method="POST" class="flex justify-center">
                    @csrf
                    <input type='submit' class='bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg' value='Eliminar' />
                </form>
            </div>
        @endif
        <div>

        </div>
    </div>
</x-app-layout>