<x-app-layout>
    <x-slot name="title">
        Редактировать сертификаты
    </x-slot>
    <div class="card">
        <div class="card-title mt-2 ml-3"></div>
        <div class="card-body">

            <form action='{{ route('sertificates.update', $sertificate->id) }}' method="POST" id="form">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="full_name">Полное имя *</label>
                    <input type="text" class="form-control" name="full_name" id="full_name"
                        value="{{ old('full_name') ?? $sertificate->full_name }}" required maxlength="255">
                    @error('full_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telephone">Телефон</label>
                    <input type="text" class="form-control" name="telephone" id="telephone"
                        value="{{ old('telephone') ?? $sertificate->telephone }}" maxlength="30" placeholder="+99899 000 0202">
                    @error('telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Описание сертификата *</label>
                    <textarea type="text" required class="form-control" style="height: 250px" name="discription" id="message">{{ $sertificate->discription }}</textarea>
                    @error('discription')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-light px-5">Добавлять</button>
                    <button type="reset" class="btn btn-light px-5">Очищать</button>
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
