@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- Display Validation Errors -->
  @include('common.errors')
  <div id="edit-form" class="form-horizontal">
  </div>
</div>
@endsection