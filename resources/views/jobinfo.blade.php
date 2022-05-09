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
    </div>
</x-app-layout>