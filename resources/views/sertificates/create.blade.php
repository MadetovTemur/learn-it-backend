<x-app-layout>
    <x-slot name="title">
       Create Sertificate  
    </x-slot>
		<div class="card">
        <div class="card-title mt-2 ml-3">
        </div>
         <div class="card-body">
         
           <form action='{{ route('sertificates.store') }}' method="POST" id="form">
          	   @csrf
               <div class="form-group">
                <label for="input-1">Full Name</label>
                <input type="text" class="form-control" name="full_name" id="input-1" placeholder="Enter Your Name" value="{{old('full_name')}}">
                @error('full_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
               </div>

               <div class="form-group">
                <label for="input-1">Serificat Discription</label>
                <input type="number" class="form-control" name="sertificate_discription_id" id="input-1" value="{{old('full_name')}}" placeholder="Enter Dertificate Discription ID">
                <span> 
                  <a href="{{ route('discriptions.index') }}">
                    All Disciptions
                  </a>
                </span>
                @error('sertificate_discription_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
               </div>

               <div class="form-group">
                  <label for="input-1">Ridericte Back</label>
                  <input type="checkbox" name="redirect" value='1'>
               </div>
             <div class="form-group">

              <button type="submit" class="btn btn-light px-5">Register</button>
            </div>
         	</form>
        </div>
    </div>
  @push('scripts')
   
    </script>
  @endpush
</x-app-layout>