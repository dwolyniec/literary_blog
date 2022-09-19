@extends('layouts.app')

@section('content')
<style>
  .cke_reset{
    width:100%
  }
</style>

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
        <div class="form-group row col-4 mb-2">
          
          <input type="hidden" name="writing_id" value=" {{ $writing->id }}">

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
            class="form-control ckeditor  @error('content') is-invalid @enderror" name="content" 
            
            required autocomplete="content" autofocus
            rows="30"
            >
            {{ old('content',$post->content) }}
          </textarea>

          @error('content')
              
                  <strong>{{ $message }}</strong>
              
          @enderror
        </div>

        <div class="row pt-3 w-25">
          <button class="btn btn-primary">{{ $action_name }}</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection

<script src="{{url('/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor({ width: "100%",height: "500px"});

     

    });
</script>
