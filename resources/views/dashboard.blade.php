<x-app-layout>
    <div class="mt-5 ">
        <div class="flex flex-row m">
            <div class="text-white">
                <!-- Caja de Mis Empleados Aplicados -->
                <div class="bg-gray-600 border-gray-200 border-2 rounded-lg m-7 p-6">
                    <!-- Titulo -->
                    <div class="flex flex-row items-center text-xl mb-4">
                        <i class="fa-solid fa-bookmark mr-3"></i>
                        <label>Mis Empleos Guardados</label>
                    </div>
                    <!-- Empleos Guardaos -->
                    <div class="flex flex-col text-justify text-md">
                        <label>- Desarrollador Web con PHP</label>
                        <label>- Desarrollador Web con PHP</label>
                        <label>- Desarrollador Web con PHP</label>
                        <label>- Desarrollador Web con PHP</label>
                        <label>- Desarrollador Web con PHP</label>
                        <label>- Desarrollador Web con PHP</label>
                        <label>- Desarrollador Web con PHP</label>
                    </div>
                    <!--Mostrar Mas -->
                    <div class="flex flex-col justify-center items-center cursor-pointer mt-4">
                        <p class="text-xl text-white">Mostrar Más</p>
                        <i class="fa-solid fa-sort-down text-3xl text-white"></i>
                    </div>
                </div>
                <!-- Boton Publicar Nuevo Empleo -->
                <div class="flex flex-row items-center border-gray-200 border-2 rounded-lg m-7 p-6">
                    <i class="fa-solid fa-pen-to-square mr-3 text-xl"></i>
                    <p class="text-xl font-bold ">Publicar un Nuevo Empleo</p>
                </div>
            </div>

            <!-- Oportunidades de Empleo a tu Alcance -->
            <div class="m-5">
                <div>Oportunidades de Empleo</div>
            </div>
        </div>

</x-app-layout>