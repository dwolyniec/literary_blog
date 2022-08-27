@extends('layouts.app')

@section('content')
<form action="{{ $action }}" enctype="multipart/form-data" method="POST">

  @csrf 
  
  @if($post->id)
    @method('PATCH');
  @endif

  <div class="container" >
    <div class="row">
      <div class="col-10 offset-1">
        <div class="row">
          <h2>{{ $action_name }}</h2>
        </div>
        <div class="form-group row col-4">
          <label for="title" class="col-md-4 col-form-label ">{{ __('title') }}</label>
          <input id="title" 
            type="text" 
            class="form-control @error('title') is-invalid @enderror" name="title" 
            value="{{ old('title',$post->title) }}" 
            required autocomplete="title" autofocus>

          @error('title')
              
                  <strong>{{ $message }}</strong>
              
          @enderror

        </div>
        <div class="form-group row">
          <label for="content" class="col-md-4 col-form-label ">{{ __('content') }}</label>
          <textarea id="content" 
            class="form-control @error('content') is-invalid @enderror" name="content" 
            value="{{ old('content',$post->content) }}" 
            required autocomplete="content" autofocus
            rows="30" >
          </textarea>

          @error('content')
              
                  <strong>{{ $message }}</strong>
              
          @enderror
        </div>

        <div class="row pt-3">
          <button class="btn btn-primary">{{ $action_name }}</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
