<x-app-layout>
    <div class="pb-6">
        <div class="bg-primary mt-16 w-10/12 mx-auto p-4 flex flex-col rounded-lg">
            <div class='flex w-50 mx-auto font-semibold'>
                <h1 class="text-white text-4xl text-center mb-10">Agregar una Nueva Propuesta de Empleo</h1>
            </div>
            <x-jet-validation-errors class="mb-4" />
            <form action="{{route('jobs.store')}}" method="POST">
                @csrf
                <div class='mx-2 md:mx-10'>
                    
                    <div class="flex flex-col text-lg mb-4">
                        <label class='text-white block'>Nombre de la Plaza Disponible: </label>
                        <input class='w-full rounded-md ml-2' type='text' name='title' id='title' placeholder='Digite el titulo del trabajo a publicar...'  />
                    </div>
                    <div class="flex gap-x-5">
                        <div class="grow flex flex-col text-lg mb-4">
                            <label class='text-white block'>Tipo de Contratacion: </label>
                            <input class='w-full rounded-md ml-2' type='text' name='hiring_type' id='hiring_type' placeholder='Digite si el trabajo es temporal o permanente...'  />
                        </div>
                        
                        <div class="grow flex flex-col text-lg mb-4">
                            <label class='text-white block'>Propuesta de Salario: </label>
                            <input class='w-full rounded ml-2' type='number' name='salary' id='salary' placeholder='Digite la cantidad que se ofrece...'  />
                        </div>
                        
                    </div>
                    <div class="flex flex-col text-lg mb-4">
                        <label class='text-white block'>Descripcion del Trabajo: </label>
                        <textarea class='w-full rounded-md ml-2 h-80 resize-none' name='description' id='description' placeholder='Describa todos los detalles del proyecto (experiencia, requisitos, horarios, presencial, virtual, entre otros)...'></textarea>
                    </div>
                </div>
                <div class="flex justify-center">
                    
                <div class='flex text-lg mt-2'>
                    <a href='{{route('home')}}' class='bg-red-700 hover:bg-red-900 transition-colors ease-in-out p-4 m-4 rounded text-lg text-white'>
                        Cancelar
                    </a>
                    <input type='submit' class='bg-emerald-600 hover:bg-emerald-800 transition-colors ease-in-out p-4 m-4 rounded text-lg text-white cursor-pointer' title='publishJob' id='publishJob' value='Publicar Empleo'/>
                </div>
            </div>
        </form>
    </div>
</div>
</x-app-layout>