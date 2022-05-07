<x-app-layout>
    <div class="bg-primary mt-16 m-8 p-8 flex flex-col rounded-lg">
        <div class='flex w-50 mx-auto font-semibold'>
            <h1 class="text-white text-4xl content-center mb-10">Agregar una Nueva Propuesta de Empleo</h1>
        </div>
        <form>
            <div class='mx-10'>
                <div class="flex flex-col text-lg mb-4">
                    <label class='text-white block'>Nombre de la Plaza Disponible: </label>
                    <input class='w-full rounded-sm ml-2' type='text' name='title' id='title' placeholder='Digite el titulo del trabajo a publicar...'  />
                </div>
                <div class="flex flex-col text-lg mb-4">
                    <label class='text-white block'>Tipo de Contratacion: </label>
                    <input class='w-full rounded-sm ml-2' type='text' name='hiring_type' id='hiring_type' placeholder='Digite si el trabajo es temporal o permanente...'  />
                </div>
                
                <div class="flex flex-col text-lg mb-4">
                    <label class='text-white block'>Propuesta de Salario: </label>
                    <input class='w-1/4 rounded ml-2' type='number' name='salary' id='salary' placeholder='Digite la cantidad que se ofrece...'  />
                </div>
                <div class="flex flex-col text-lg mb-4">
                    <label class='text-white block'>Descripcion del Trabajo: </label>
                    <textarea class='w-full rounded-sm ml-2 h-20' title='description' id='description' placeholder='Describa todos los detalles del proyecto (experiencia, requisitos, horarios, presencial, virtual, entre otros)...'></textarea>
                </div>
            </div>
            <div class='flex flex-row text-lg mt-2 w-1/5 mx-auto'>
                <div class='bg-emerald-600 p-4 m-4 rounded text-lg'>
                    <input type='submit' class='text-white' title='publishJob' id='publishJob' value='Publicar Empleo'/>
                </div>
                <div class='bg-red-700 p-4 m-4 rounded text-lg'>
                    <a href='' class='text-white' title='returnMain' id='returnMain'>Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>