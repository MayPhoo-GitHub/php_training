@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- Display Validation Errors -->
  @include('common.errors')

  <!-- New reservation Form -->
  <form action="/api-view" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- reservation Name -->
    <div class="form-group">
      <label for="guest" class="col-sm-3 control-label">Hotel Name</label>
      <div class="col-sm-6">
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="guest" class="col-sm-3 control-label">Number of guests</label>
      <div class="col-sm-6">
        <input type="number" min=0 name="guest" id="guest"  class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="arrival" class="col-sm-3 control-label">Arrival</label>
      <div class="col-sm-6">
        <input type="date" name="arrival" id="arrival" class="form-control"required>
      </div>
    </div>
    <div class="form-group">
      <label for="departure" class="col-sm-3 control-label">Departure</label>
      <div class="col-sm-6">
        <input type="date" name="departure" id="departure" class="form-control" required>
      </div>
    </div>
</form>

  <!-- Add reservation Button -->

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button class="btn btn-success" onclick="add()" >
          <i class="fa fa-plus"></i> Add reservation
        </button>
      </div>
    </div>
</div>
  <!-- Current reservations -->
<div class="panel panel-default">
  <div class="panel-heading">
    Current reservations
  </div>

  <div class="panel-body">
      <table class="table table-bordered mt-5" id="api-reservation">
          <thead>
              <th>ID</th>
              <th>Hotel Name</th>
              <th>Number of Guest</th>
              <th>Arrival</th>
              <th>Departure</th>
              <th>Created at</th>
              <th>Updated at</th>
              <th>Delete Action</th>
              <th>Update Action</th>
          </thead>
          <tbody></tbody>
      </table>
    </div>
</div>
<!-- TODO: Current reservations -->
@endsection