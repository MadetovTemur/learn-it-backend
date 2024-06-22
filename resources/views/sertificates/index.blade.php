<x-app-layout>
    <x-slot name="title">
        Сертификаты
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Сертификаты
            </h5>

            @push('navigation')
                <a href="{{ route('sertificates.create') }}" class="ml-2 btn btn-light px-5">Создавать</a>
                <button disabled class="btn btn-light px-5">Скачать</button>
            @endpush

            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="coll">Выбирать</th>
                            <th scope="col">
                                @if (array_key_exists('sort', request()->query()) and request()->query()['sort'] == '-id')
                                    <a href="?sort=id">ID</a>
                                @else
                                    <a href="?sort=-id">ID</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (array_key_exists('sort', request()->query()) and request()->query()['sort'] == '-full_name')
                                    <a href="?sort=full_name">Полное имя</a>
                                @else
                                    <a href="?sort=-full_name">Полное имя</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (array_key_exists('sort', request()->query()) and request()->query()['sort'] == '-telephone')
                                    <a href="?sort=telephone">Телефон</a>
                                @else
                                    <a href="?sort=-telephone">Телефон</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (array_key_exists('sort', request()->query()) and request()->query()['sort'] == '-created_at')
                                    <a href="?sort=created_at">Дата создания</a>
                                @else
                                    <a href="?sort=-created_at">Дата создания</a>
                                @endif
                            </th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sertificates as $item)
                            <tr id="{{ $item['id'] }}">
                                <td scope="row">
                                    <input type="checkbox" id="student" name="students[]" value="{{ $item['id'] }}">
                                </td>
                                <td>{{ $item['id'] }}</td>
                                <td>
                                    <a href="{{ route('sertificates.show', $item['id']) }}">{{ $item['full_name'] }}</a>
                                </td>
                                <td>{{ $item['telephone'] }}</td>
                                <th scope="row">{{ date_create($item['created_at'])->format('d.m.Y') }}</th>
                                <td style="display: flex; gap: 5px;">
                                    <a style="padding: 6px 19px;" class="btn btn-light px-5 mb-2"
                                        href="{{ route('sertificates.edit', $item['id']) }}">
                                        <i class="zmdi zmdi-brush"></i>
                                    </a>
                                    <a href="{{ route('sertificates.destroy', $item['id']) }}" id="delete_from"
                                        class="btn btn-light px-5 mb-2" data-method="DELETE"><i
                                            class="zmdi zmdi-block"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if (!isset(request()->query()['q']))
            <div class="card-footer">
                {{ $sertificates->links() }}
            </div>
        @endif


    </div>
    @push('scripts')
        <script type="text/javascript" src="{{ asset('assets/pages/sertificates-index.js') }}"></script>
    @endpush
</x-app-layout>
