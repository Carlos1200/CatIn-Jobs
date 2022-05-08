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
                        <li>- Desarrollador Web con PHP</li>
                        <li>- Desarrollador Backend con SQL Server</li>
                        <li>- Analista de Datos con Power BI</li>
                        <li>- Desarrollador Full Stack con C# y SQL Server</li>
                        <li>- Auditor de Sistemas con certificado en Office</li>
                        <li>- Pasantías como Administrador de Redes y mantenimiento de Data Center</li>
                        <li>- Desarrollador Angular Temporal por Proyecto </li>
                    </ul>
                    <!--Mostrar Mas -->
                    <div class="flex flex-col justify-center items-center cursor-pointer mt-4">
                        <p class="text-xl text-white">Mostrar Más</p>
                        <i class="fa-solid fa-sort-down text-3xl text-white"></i>
                    </div>
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
            <div class="w-full bg-primary rounded-lg mr-3">
                <div class="text-center text-white text-3xl mx-5">
                    <p>Oportunidades de Empleo</p>
                </div>
                @if ($jobs->count()>0)
                    
                @foreach ($jobs as $job)
                    <hr class="mx-5">
                    <div class="m-5 flex flex-col text-white text-basic items-center">
                        <!-- Contenedor de Empleos -->
                        <div class="flex flex-row mx-5">
                            <!-- Cuadrado -->
                            <div class="mx-5">
                                <i class="fa-solid fa-square"></i>
                            </div>
                            <!-- Informacion -->
                            <div class="mx-5 w-52">
                                <p>{{$job->title}}</p>
                                <p>{{$job->company_name}}</p>
                                <p>{{$job->location}} ({{$job->hiring_type}})</p>
                            </div>
                            <!-- Icono de Guardado y Fecha -->
                            <div class="mx-5 w-48 text-right">
                                <i class="fa-light fa-bookmark text-3xl"></i>
                                <p class="p-2">Hace 6 dias</p>
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