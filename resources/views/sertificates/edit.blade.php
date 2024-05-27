<x-app-layout>
    <x-slot name="title">
       Update Sertificate  
    </x-slot>
		<div class="card">
         <div class="card-body">
         <div class="card-title"></div>
       <form action="{{ route('sertificates.update', $sertificate['id']) }}" method="POST">
      	   @csrf
      	   @method('PATCH')
           <div class="form-group">
            <label for="input-1">Full Name</label>
            <input type="text" class="form-control" name="full_name" id="input-1" placeholder="Enter Your Name" value="{{ $sertificate['full_name'] }}">
            @error('full_name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
           </div>

           <div class="form-group">
            <label for="input-1">Serificat Discription</label>
            <input type="number" class="form-control" name="sertificate_discription_id" id="input-1" value="{{ $sertificate['sertificate_discription_id'] }}" placeholder="Enter Dertificate Discription ID">
            <span style="padding: 10px; color: red;"> 
              <a href="{{ route('discriptions.index') }}">
                All Disciptions
              </a>
            </span>
            @error('sertificate_discription_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
           </div>
         <div class="form-group">
          <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Update</button>
        </div>
     	</form>
    </div>
    </div>
    
</x-app-layout>