@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="text-center">
      <h2>Update Reservation</h2>
    </div>
  </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="/updateReservation/{{ $reservation->id }}" method="POST" onSubmit="return confirm('Do you want to update this reservation?')" class="form-horizontal">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="reservation" class="col-sm-3 control-label">Hotel Name</label>
    <div class="col-sm-6">
      <select name="name" class="form-select ">
        @foreach ($hotels as $hotel)
          @if ($reservation->hotel_name == $hotel->hotel_name)
            <option value="{{ $hotel->hotel_name }}" selected="selected">{{ $hotel->hotel_name }}</option>
          @else
          <option value="{{ $hotel->hotel_name }}">{{ $hotel->hotel_name }}</option>
        @endif
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="reservation" class="col-sm-3 control-label">Number of guests</label>
    <div class="col-sm-6">
      <input type="number" min=0 name="guest" value="{{ $reservation->num_of_guests }}" class="form-control" placeholder="Number of Guests">
    </div>
  </div>
  <div class="form-group">
    <label for="reservation" class="col-sm-3 control-label">Arrival</label>
    <div class="col-sm-6">
      <input type="date" name="arrival" value="{{ $reservation->arrival }}" class="form-control" placeholder="Arrive">
    </div>
  </div>
  <div class="form-group">
    <label for="reservation" class="col-sm-3 control-label">Departure</label>
    <div class="col-sm-6">
      <input type="date" name="departure" value="{{ $reservation->departure }}" class="form-control" placeholder="Departure">
    </div>
  </div>
  <div class="col-sm-12  text-center">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

</form>
@endsection