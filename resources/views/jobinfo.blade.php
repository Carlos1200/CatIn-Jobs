<x-app-layout>
    <div class='pb-6'>
        <div class='bg-primary mt-16 w-10/12 mx-auto p-4 px-6 flex flex-col rounded-lg'>
            <div class='w-auto font-semibold ml-12'>
                <!-- Titulo del Trabajo -->
                <h1 class='text-white text-4xl mb-4'>React Developer - Oportunidades de Trabajo Remoto</h1>
            </div>
            <hr>
            <div class='flex flex-col mt-4 ml-12 text-lg'>
                <!--Tipo de Trabajo, Ubicacion y Salario-->
                <div class='flex flex-row text-lg mb-4'>
                    <label class='block text-white'><span class='font-bold'>Trabajo: </span>Temporal</label>
                    <label class='block text-white ml-6'><span class='font-bold'>Ubicacion: </span>San Salvador</label>
                    <label class='block text-white ml-6'><span class='font-bold'>Oferta salarial: </span>$3,500.75</label>
                </div>
                <!-- Descripcion del trabajo -->
                <div class='flex flex-col'>
                    <p class='text-white block font-bold'>Descripcion:</p>
                    <p class='text-white ml-2'>Plaza de Trabajo para Desarrollador Junior, que sea estudiante, egresado o gradudo de Ingenieria en Sistemas <br />
                        - Requisitos: Conocimientos intermedios en el framework de React, JavaScript, PHP, MySQL <br />
                        - Duracion: Plaza Temporal con duracion de 6 a 8 meses (mientras se desarrolla el proyecto). <br />
                        - Se Ofrece: Salario Quincenal y Prestaciones de Ley <br />
                        - Detalles Extras: 1 anio de Experiencia, Edad mayor a 18 anios, Trabajo presencial y genero indiferente.
                    </p>
                </div>
                <!-- Botones -->
                <div class='flex flex-row mt-4 text-lg'>
                    <input type='submit' class='bg-emerald-600 p-4 m-4 font-bold rounded-lg text-white' value='Aplicar' />
                    <input type='submit' class='text-green-600 p-4 m-4 font-bold rounded-lg border-2 border-teal-700' value='Guardar' />
                </div>
            </div>
        </div>
</x-app-layout>