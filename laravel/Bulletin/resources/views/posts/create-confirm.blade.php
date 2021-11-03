@extends('layouts.app')
@section('content')
<!-- Styles -->
<link href="{{ asset('css/post-create-confirm.css') }}" rel="stylesheet">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Post</div>
        <div class="card-body">
          <form method="POST" action="{{ route('post.create.confirm') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label text-md-right required">{{ __('Title') }}</label>

              <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" readonly="readonly" name="title" value="{{ old('title') }}" autocomplete="name" autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

              <div class="col-md-6">
                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" readonly="readonly" name="description" autocomplete="description">{{ old('description') }}</textarea>
                  @error('description')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Confirm') }}
                </button>
                <a class="cancel-btn btn btn-secondary" onClick="window.history.back()">{{ __('Cancel') }}</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection