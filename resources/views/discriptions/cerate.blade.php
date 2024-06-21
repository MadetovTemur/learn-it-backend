<x-app-layout>
    <x-slot name="title">
        Create Sertificates Discriptions
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="card-title"></div>
            <form action='{{ route('discriptions.store') }}' method="POST">
                @csrf
                <div class="form-group">
                    <label for="input-1">Name</label>
                    <textarea type="text" class="form-control" style="height: 250px" name="discription" id="input-1"
                        placeholder="Enter Your Name"> </textarea>
                    @error('discription')
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
