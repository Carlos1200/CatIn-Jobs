<x-app-layout>
    <div class="mt-5 ">
        <div class="flex flex-row m">
            <div class="text-white px-6">
                <!-- Caja de Mis Empleados Aplicados -->
                @if (Auth::user()->rol=="user")
                <div class="bg-primary rounded-lg m-7 px-6 py-4">
                    <!-- Titulo -->
                    <div class="flex flex-row items-center text-xl mb-4">
                        <i class="fa-solid fa-bookmark mr-3"></i>
                        <label>Mis Empleos Guardados</label>
                    </div>
                    <!-- Empleos Guardaos -->
                    <ul class="flex flex-col text-justify text-md">
                        @foreach ($save_jobs as $save_job)
                            <li class="flex gap-x-2">
                                        <a class="grow" href="{{route('jobs.showDetails',['id'=>$save_job->id])}}">- {{$save_job->title}}</a>                              
                                </form>
                                <form action="{{route('profile.save.unsave')}}" method="POST" class="shrink">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{$save_job->id}}">
                                    <button type="submit" class="text-red-500">Eliminar</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Boton Publicar Nuevo Empleo -->
                @if (Auth::user()->rol=="company")
                <a href="{{route("jobs.show")}}" class="flex flex-row items-center border-teal-700 border-2 rounded-lg m-7 p-6">
                    <i class="fa-solid fa-pen-to-square mr-3 text-xl"></i>
                    <p class="text-xl font-bold ">Publicar un Nuevo Empleo</p>
                </a>
                @endif
            </div>

            <!-- Oportunidades de Empleo a tu Alcance -->
            <div class="md:w-3/5 w-full bg-primary rounded-lg mr-3 ">
                <div class="text-center text-white text-3xl mx-5">
                    <p>Oportunidades de Empleo</p>
                </div>
                @if ($jobs->count()>0)
                    
                @foreach ($jobs as $job)
                    <hr class="mx-5">
                    <div class="m-5  flex flex-col text-white text-basic ">
                        <!-- Contenedor de Empleos -->
                        <div class="flex flex-row mx-5">
                            <!-- Informacion -->
                            <div class="mx-5 flex grow">
                                @if (Auth::user()->rol=="user")
                                <form action="{{route('profile.save')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{$job->id}}">
                                    <button type="submit" class="flex flex-row items-center bg-alt-secondary border-2 rounded-lg p-4">
                                        <i class="fa-solid fa-bookmark text-3xl"></i>
                                    </button>
                                </form>
                                @endif
                                <div class="mx-4">
                                    <a href="{{route('jobs.showDetails',['id'=>$job->id])}}" class="text-3xl font-bold">{{$job->title}}</a>
                                    <p>{{$job->company_name}}</p>
                                    <p>{{$job->location}} ({{$job->hiring_type}})</p>
                                </div>
                            </div>
                            <!-- Icono de Guardado y Fecha -->
                            <div class="mx-5 text-right shrink flex items-end">
                                <p class="p-2">{{$job->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <h2 class="text-center text-white text-4xl mt-5">No tenemos ofertas de empleo que ofrecerte</h2>
                @endif
            </div>
        </div>

</x-app-layout>