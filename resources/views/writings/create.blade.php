@extends('layouts.app')

@section('content')
<form action="{{ $action }}" enctype="multipart/form-data" method="POST">

  @csrf 
  
  @if($writing->id)
    @method('PATCH');
  @endif

  <div class="container" >
    <div class="row">
      <div class="col-4 offset-2">
        <div class="row">
          <h2>{{ $action_name }}</h2>
        </div>
        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>
            <input id="name" 
                  type="text" 
                  class="form-control @error('name') is-invalid @enderror" name="name" 
                  value="{{ old('name',$writing->name) }}" 
                  required autocomplete="name" autofocus>

            @error('name')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        </div>
        <div class="form-group row mt-3">
            <label for="genre_id" class="col-md-4 col-form-label ">{{ __('Genre') }}</label>
            <select class="form-select " name="genre_id" id="genre_id" required>
                <option value="" style="color:gray">Choose genre...</option>
                @foreach ($genres as $genre)
                    <option value="{{$genre->id}}"
                      @if ($genre->id == old('genre_id',$writing->genre_id) )
                          selected
                      @endif>
                      {{$genre->name}}
                    </option>
                @endforeach
            </select>
            
        </div>

        <div class="form-group row mt-3">
            <label for="private" class="col-md-4 col-form-label w-100">{{ __('Private') }}</label>
            <input type='hidden' value='0' name='private'>
            <input type='checkbox' value='1' name='private' 
              class="float-start w-25"
              @if ( old('private',$writing->private) )
                  checked="true"
              @endif
              >
            
        </div>

        <div class="row pt-3">
          <button class="btn btn-primary">{{ $action_name }}</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
