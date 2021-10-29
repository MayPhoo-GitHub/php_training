@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

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