@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->
  <!-- Add Import File  -->
  <form action="/import-hotel" method="POST" class="form-horizontal" enctype="multipart/form-data" onSubmit="return confirm('Do you want to import this file?')" >
    {{ csrf_field() }}

    <div class="form-group">
      <label for="file" class="col-sm-3 control-label">Choose file to import</label>
        <div class="col-sm-6">
          <input type="file" name="file" class="form-control" required>
        </div>
      </div>
      <!-- Add Import Button -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-info">
            <i class="fas fa-file-import"></i> Import File
          </button>
        </div>
      </div>
  </form>
<div class="panel-body">
  <!-- Current hotels -->
  @if (count($hotels) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Hotel Info
      </div>

      <div class="panel-body">
        <table class="table table-bordered mt-5">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Description</th>
            </tr>
            @foreach ($hotels as $hotel)
              <tr>
                  <td>{{ $hotel->id }}</td>
                  <td>{{ $hotel->hotel_name }}</td>
                  <td>{{ $hotel->location }}</td>
                  <td>{{ $hotel->description }}</td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
  @endif
</div>

<!-- TODO: Current hotels -->
@endsection