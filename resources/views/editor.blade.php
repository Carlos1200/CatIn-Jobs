<x-app-layout>
    <div class="mt-3 px-4">
        <h1 class="text-center text-3xl font-bold text-white">Sube tu CV aquí</h1>
        <p class="text-center text-xl text-white">Nosotros nos encargaremos de guardar tu curriculum y seleccionarlo cuando quieras postularte a un empleo</p>
        <div class="flex justify-center">
            <form action="{{route('cv.upload')}}"  
            method="post"
            enctype="multipart/form-data"
            class="w-1/2 mt-8">
                @csrf
                    <div class=" flex justify-center">
                        <div>
                            <label for="cv" class="text-white block">Sube tu CV</label>
                            <input type="file" accept=".pdf" name="cv" id="cv" class="text-white border border-white p-2 rounded-lg file:p-2  file:rounded-md file:border-0 file:text-xl file:bg-primary file:text-white file:font-bold">
                            @error('cv')
                                <p class="text-red-500 text-xs italic">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="bg-primary text-white p-2 rounded-lg">Subir CV</button>
                    </div>
            </form>
        </div>
        <div class="grid grid-cols-4 my-8">
            @foreach ($curriculums as $curriculum )
            <div>
            <div class="flex flex-col items-center">
                <form class="flex flex-col items-center" method="POST" action="{{route("cv.download")}}">
                    @csrf
                    <i class="fa-solid fa-file-pdf text-7xl text-white mb-2"></i>
                    <p class="text-center text-xl text-white">{{$curriculum->cv_tittle}}</p>

                    <input type="hidden" name="cv_path" value="{{$curriculum->cv_template}}">
                    <input type="hidden" name="cv_tittle" value="{{$curriculum->cv_tittle}}">

                    <button type="submit" class="bg-primary hover:bg-slate-800 text-white p-2 rounded-lg">Descargar</button>
                </form>
            </div>
            <div class="mt-2">
                <form class="flex flex-col items-center" method="POST" action="{{route("cv.delete")}}">
                    @csrf
                    <input type="hidden" name="cv_path" value="{{$curriculum->cv_template}}">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white p-2 rounded-lg">Eliminar</button>
                </form>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>