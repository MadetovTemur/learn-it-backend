<x-app-layout>
    <x-slot name="title">
       Create Sertificate  
    </x-slot>
		<div class="card">
         <div class="card-body">
         <div class="card-title"></div>
       <form action='{{ route('sertificates.store') }}' method="POST">
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
          <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Register</button>
        </div>
     	</form>
    </div>
    </div>
    
</x-app-layout>