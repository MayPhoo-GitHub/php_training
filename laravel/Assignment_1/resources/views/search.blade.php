@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- Display Validation Errors -->
  @include('common.errors')

  <!-- Search Form -->
  <form action="/search-reservation" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- reservation Name -->
    <div class="form-group">
      <label for="name" class="col-sm-3 control-label">Hotel Name</label>
      <div class="col-sm-6">
      <input type="text" name="name" class="form-control"required placeholder="search by hotel name">
      </div>
    </div>

    <div class="form-group">
      <label for="guests" class="col-sm-3 control-label">Number of guests</label>
      <div class="col-sm-6">
        <input type="number" min=0 name="guests" class="form-control" required>
      </div>
    </div>

    <div class="form-group">
      <label for="arrival" class="col-sm-3 control-label">Arrival</label>
      <div class="col-sm-6">
        <input type="date" name="arrival" class="form-control"required>
      </div>
    </div>

    <div class="form-group">
      <label for="departure" class="col-sm-3 control-label">Departure</label>
      <div class="col-sm-6">
        <input type="date" name="departure" class="form-control" required>
      </div>
    </div>

    <div class="form-group">
      <label for="arrival" class="col-sm-3 control-label">Start Date</label>
      <div class="col-sm-6">
        <input type="date" name="start_date" class="form-control"required>
      </div>
    </div>

    <div class="form-group">
      <label for="departure" class="col-sm-3 control-label">End Date</label>
      <div class="col-sm-6">
        <input type="date" name="end_date" class="form-control" required>
      </div>
    </div>
    

    <!-- search reservation Button -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" onSubmit="return confirm('Do you want to add this reservation?')" class="btn btn-success">
          <i class="fa fa-search"></i> Search reservation
        </button>
      </div>
    </div>
  </form>

  <!-- Result reservations -->
  <div class="panel panel-default">
    <div class="panel-heading">
      Search results
    </div>

    <div class="panel-body">
      <table class="table table-bordered mt-5">
          <tr>
              <th>ID</th>
              <th>Hotel Name</th>
              <th>Number of Guest</th>
              <th>Arrival</th>
              <th>Departure</th>
              <th>Created at</th>
              <th>Updated at</th>
          </tr>

          @foreach ($reservations as $reservation)
          <tr>
              <td>{{ $reservation->id }}</td>
              <td>{{ $reservation->hotel_name }}</td>
              <td>{{ $reservation->num_of_guests }}</td>
              <td>{{ $reservation->arrival }}</td>
              <td>{{ $reservation->departure }}</td>
              <td>{{ $reservation->created_at }}</td>
              <td>{{ $reservation->updated_at }}</td>
          </tr>
          @endforeach
      </table>
    </div>


</div>
@endsection