@use('Illuminate\Support\Str')

<x-app-layout>
    <x-slot name="title">
        Sertificates Discriptions  
    </x-slot>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Sertificates Discriptions </h5>
        <a href="{{ route('discriptions.create') }}" class="btn btn-light px-5 mb-2">Create</a>
        <div class="table-responsive">
         <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">
                  @if(request()->query()['id'] ?? 0 == 1)
                    <a href="?id=-1">ID</a>
                  @else
                    <a href="?id=1">ID</a>
                  @endif
                </th>
                <th scope="col">Discriptions</th>
                <th scope="col">Create At</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
            	@foreach($sertificateDiscriptions as $row)
                <tr>
                  <th scope="row">{{ $row['id'] }}</th>
                  <td>{{ Str::limit($row['discription'], 110) }}</td>
                  <th scope="row">{{ $row['created_at'] }}</th>
                  <td>
                  	<a href="{{ route('discriptions.edit', $row['id']) }}" >EDIT</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        {{ $sertificateDiscriptions->links() }}
      </div>
    </div>
</x-app-layout>
