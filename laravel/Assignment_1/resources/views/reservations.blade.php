@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- Display Validation Errors -->
  @include('common.errors')

  <!-- New reservation Form -->
  <form action="/reservation" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- reservation Name -->
    <div class="form-group">
      <label for="name" class="col-sm-3 control-label">Hotel Name</label>
      <div class="col-sm-6">
        <select name="name" class="form-select ">
        @foreach ($hotels as $hotel)
          <option value="{{ $hotel->hotel_name }}">{{ $hotel->hotel_name }}</option>
        @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="guest" class="col-sm-3 control-label">Number of guests</label>
      <div class="col-sm-6">
        <input type="number" min=0 name="guest" class="form-control" required>
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
    

    <!-- Add reservation Button -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" onSubmit="return confirm('Do you want to add this reservation?')" class="btn btn-success">
          <i class="fa fa-plus"></i> Add reservation
        </button>
      </div>
    </div>
  </form>
  <div class="text-right">
    <a class="btn btn-info" href="/export-reservation">
    <i class="fas fa-file-export"></i> Export Reservation</a>
  </div>

  <!-- Current reservations -->
  @if (count($reservations) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      Current reservations
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
              <th>Delete Action</th>
              <th>Update Action</th>
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
         
            <!-- Delete Button -->
            <td>
              <form action="/reservation/{{ $reservation->id }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Delete
                </button>
              </form>
              </td>
             <!-- Update Button -->
            <td>
              <form action="/update/{{ $reservation->id }}" method="POST" >
              {{ csrf_field() }}
                <button type="submit" class="btn btn-warning">
                  <i class="fa fa-btn fa-pencil"></i>Update
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>

<!-- TODO: Current reservations -->
@endsection