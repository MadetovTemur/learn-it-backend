<x-app-layout>
    <x-slot name="title">
        Create Sertificate
    </x-slot>
    <div class="card">
        <div class="card-title mt-2 ml-3">
        </div>
        <div class="card-body">

            <form action='{{ route('sertificates.update', $sertificate->id) }}' method="POST" id="form">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name"
                        value="{{ old('full_name') ?? $sertificate->full_name }}">
                    @error('full_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="text" class="form-control" name="telephone" id="telephone"
                        value="{{ old('telephone') ?? $sertificate->telephone }}">
                    @error('telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Serificat Discription</label>
                    <textarea type="text" class="form-control" style="height: 250px" name="discription" id="message">{{ $sertificate->discription }}</textarea>
                    @error('discription')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-light px-5">Inster</button>
                    <button type="reset" class="btn btn-light px-5">Clear</button>
                </div>
            </form>

        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#form').on('submit', function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: $(this).context.action, // The URL to which the request is sent
                        method: 'POST',
                        dataType: 'json',
                        data: $(this).serializeArray(),
                        success: function(response) {
                            var message = $('#message').val();
                            $('#form')[0].reset();
                            $('#message').val(message);

                        },
                        error: function(data) {
                            console.error('Error:', data);
                        }
                    });

                });
            });
        </script>
    @endpush
</x-app-layout>
