<x-app-layout>
    <x-slot name="title">
       Create Sertificates Discriptions  
    </x-slot>
		<div class="card">
           <div class="card-body">
           <div class="card-title"></div>
          <form action='{{ route('discriptions.update', $sertificateDiscriptions['id']) }}' method="POST">
         	@csrf
         	@method('PUT')
	         <div class="form-group">
	          <label for="input-1">Name</label>
	          <textarea type="text" class="form-control" name="discription" id="input-1" placeholder="Enter Your Name">{{ $sertificateDiscriptions->discription }}</textarea>
	         	@error('discription')
	         		<div class="alert alert-danger">{{ $message }}</div>
	         	@enderror
	         </div>
	         <div class="form-group">
	          <button type="submit" class="btn btn-light px-5">Update</button>
	        </div>
        	</form>
    </div>
    </div>
    
</x-app-layout>

