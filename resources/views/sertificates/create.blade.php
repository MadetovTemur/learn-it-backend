<x-app-layout>
    <x-slot name="title">
        Создать сертификат
    </x-slot>
    <div class="card">
        {{-- <div class="card-title mt-2 ml-3"></div> --}}
        <div class="card-body">

            <form action='{{ route('sertificates.store') }}' method="POST" id="form">
                @csrf
                <div class="form-group">
                    <label for="full_name">Полное имя *</label>
                    <input type="text" class="form-control" name="full_name" id="full_name"
                        value="{{ old('full_name') }}" required>
                    @error('full_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telephone">Телефон </label>
                    <input type="text" class="form-control" name="telephone" id="telephone"
                        value="{{ old('telephone') }}" placeholder="+99899 000 0202">
                    @error('telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Описание сертификата *</label>
                    <textarea type="text" required class="form-control" style="height: 250px" name="discription" id="message"></textarea>
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
        <script src="{{ asset('assets\pages\sertificates-create.js') }}"></script>
    @endpush
</x-app-layout>
