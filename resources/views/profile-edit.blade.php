<x-app-layout>
    <h2 class="text-center text-white text-3xl mt-4">Actualiza la información de tu perfil</h2>
    <div class="mt-3 px-4">
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="ml-5">
                    <label for="name" class="text-white">Nombre</label>
                    <input type="text" placeholder="Nombre" name="name" id="name" class="border-2 border-white p-2 w-full rounded-lg" value="{{$info->user['name']}}">
                </div>
                <div class="ml-5">
                    <label for="email" class="text-white">Correo</label>
                    <input type="email" name="email" placeholder="Correo" id="email" class="border-2 border-white p-2 w-full rounded-lg" value="{{$info->user['email']}}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="ml-5">
                    <label for="birthday" class="text-white">Cumpleaños</label>
                    <input type="date" name="birthday" id="birthday" class="border-2 border-white p-2 w-full rounded-lg" value="{{$info->user['birthday']}}">
                </div>
                <div class="ml-5">
                    <label for="nationality" class="text-white">Nacionalidad</label>
                    <input type="text" placeholder="El Salvador" name="nationality" id="nationality" class="border-2 border-white p-2 w-full rounded-lg" value="{{$info->user['nationality']}}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="ml-5">
                    <label for="phone_contact" class="text-white">Teléfono de contacto</label>
                    <input type="text" placeholder="00000000" name="phone_contact" id="phone_contact" class="border-2 border-white p-2 w-full rounded-lg" value="{{$info->user['phone_contact']}}">
                </div>
                <div class="ml-5">
                    <x-jet-label for="gender" class="text-white" value="Género"/>
                    <select name="gender" id="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                        <option value="" disabled selected> --Select-- </option>
                        @foreach ($generos as $gender)
                            <option 
                                @if ($gender->gender==$info->user['gender'])
                                    selected
                                @endif
                            value="{{$gender->id}}">{{$gender->gender}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="ml-5">
                    <label for="about_me" class="text-white">Sobre mí</label>
                    <textarea name="about_me" class="border-2 border-white p-2 w-full rounded-lg" placeholder="Cuentanos tu vida" id="about_me">{{$info->user['about_me']}}</textarea>
                </div>
            </div>
            <div class="grid grid-cols-3">
                {{-- <div class="ml-5">
                    <label class="text-white block">Idiomas</label>
                    <div id="idiomasLista" class="mb-4 grid grid-cols-3">
                        @foreach ( $info->idioms as $idiom )
                        <div class="flex justify-start items-center">
                            <input type="text" disabled name="idiom[]" placeholder="Idioma" class="border-2 border-white p-2 w-full rounded-lg" value="{{$idiom->idiom}}">
                        </div>
                        @endforeach
                    </div>
                        <input type="text" id="idioma" placeholder="Idioma" class="border-2 border-white p-2 w-full rounded-lg">
                        <button type="button" onclick="addIdiom()" class="mt-3 py-3 px-2 rounded-md text-white  bg-alt-secondary">Agregar idioma</button>
                </div> --}}
            </div>
            <div class="flex justify-center items-center py-5">
                <button type="submit" class="mt-3 py-3 px-3 rounded-md text-white  bg-alt-secondary">Editar Perfil</button>
            </div>
        </form>
            <script type="text/javascript">
                function addIdiom(){
                    const idiom = document.getElementById('idioma').value;
                    const idiomasLista = document.getElementById('idiomasLista');
                    idiomasLista.innerHTML += `<div class="flex justify-start items-center">
                        <input type="text" disabled name="idiom[]" placeholder="Idioma" class="border-2 bg-transparent p-2 w-full rounded-lg" value="${idiom}">
                        </div>`;
                    idiom.value = '';
                }
            </script>
</x-app-layout>