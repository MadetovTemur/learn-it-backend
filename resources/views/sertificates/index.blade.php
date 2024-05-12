
<x-app-layout>
    <x-slot name="title">
        Sertificates   
    </x-slot>
    <div class="card">
    <div class="card-body">
      <h5 class="card-title">Sertificates</h5>
      <a href="{{ route('sertificates.create') }}" class="btn btn-light px-5 mb-2">Create</a>
      <button disabled class="btn btn-light px-5 mb-2">Download</button>

      <div class="table-responsive">
       <table class="table table-striped">
          <thead>
            <tr>
              <th scope="coll">Select</th>
              <th scope="col">ID</th>
              <th scope="col">Full Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sertificates as $item)
              <tr>
                <td scope="row">
                  <input type="checkbox" id="student" name="students[]" value="{{ $item['id'] }}">
                </td>
                <td >{{ $item['id'] }}</td>
                <td><a href="{{ route('sertificates.show', $item['id']) }}" >{{ $item['full_name'] }}</a></td>
                <td style="display: flex; gap: 5px;">
                  <a style="padding: 6px 19px;" class="btn btn-light px-5 mb-2" href="{{ route('sertificates.edit', $item['id']) }}">
                    <i class="zmdi zmdi-brush"></i>
                  </a>
                  <form action="{{ route('sertificates.destroy', $item['id']) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button style="padding: 3px 19px;" class="btn btn-light px-5 mb-2" type="submit">
                      <i class="zmdi zmdi-block"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      {{ $sertificates->links() }}
    </div>
  </div>

  <script type="text/javascript">
    var inputes = document.getElementsByName('students')

   
  </script>
</x-app-layout>
