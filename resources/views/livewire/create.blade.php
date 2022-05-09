<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
    
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    
      <div class="inline-block align-bottom py-5 bg-primary rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <h2 class="text-center text-3xl text-white py-3">Sube tu CV</h2>
        <div class="flex justify-center">
            <form action="{{route('jobinfo.upload')}}"  
            method="post"
            enctype="multipart/form-data"
            class="w-1/2 mt-8">
                @csrf
                    <div class=" flex justify-center">
                        <div>
                            <input type="hidden" name="id_hiring" value="{{$job->id}}">
                            <input type="file" accept=".pdf" name="cv" id="cv" class="text-white border border-white p-2 rounded-lg file:p-2  file:rounded-md file:border-0 file:text-xl file:bg-secondary file:cursor-pointer file:text-white file:font-bold cursor-pointer">
                            @error('cv')
                                <p class="text-red-500 text-xs italic">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button type="submit" class="bg-secondary text-white p-2 rounded-lg">Subir CV</button>
                    </div>
            </form>
            
        </div>
        <form action="{{route('jobs.showDetails',['id'=>$job->id])}}" method="GET" class="absolute top-0 left-0">
          <input type='submit' class='bg-red-600 p-4 m-4 font-bold rounded-lg text-white hover:bg-transparent hover:border-2 hover:text-red-600 hover:border-red-600 transition-colors ease-in-out' value='Volver' />
      </form>
      </div>
    </div>
  </div>