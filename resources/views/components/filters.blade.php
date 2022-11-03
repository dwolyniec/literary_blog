<form action={{ $action }} id="filter_form">
    <div class="d-flex mb-3">
        
        @csrf

        <label for="name" class="pe-2 col-form-label ">{{ __('Writing') }}</label>

        <div class="col-md-2 pe-3">
            <input id="name" type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                name="name" value="{{ old('name') }}" 
                autocomplete="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <label for="genre_id" class="pe-2 col-form-label ">{{ __('Genre') }}</label>

        <div class="col-md-2 pe-3">
            <select id="genre_id" type="text" 
                class="form-control @error('genre_id') is-invalid @enderror" 
                name="genre_id" value="{{ old('genre_id') }}" 
                autocomplete="genre_id">
                <option value="" style="color:gray">{{ __('Choose') }}...</option>
                @foreach ($genres as $genre)
                    <option value="{{$genre->id}}"
                      @if ($genre->id == old('genre_id') )
                          selected
                      @endif>
                      {{$genre->name}}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <label for="author" class="pe-2 col-form-label ">{{ __('Author') }}</label>

        <div class="col-md-2 pe-3">
            <select id="author" type="text" 
                class="form-control @error('author') is-invalid @enderror" 
                name="author" value="{{ old('author') }}" 
                autocomplete="author">
                <option value="" style="color:gray">{{ __('Choose') }}...</option>
                @foreach ($authors as $author)
                    <option value="{{$author->id}}"
                      @if ($author->id == old('author') )
                          selected
                      @endif>
                      {{$author->name}}
                    </option>
                @endforeach
            </select>
            @error('author')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <label for="title" class="pe-2 col-form-label ">{{ __('Post title') }}</label>

        <div class="col-md-2 pe-3">
            <input id="title" type="text" 
                class="form-control @error('title') is-invalid @enderror" 
                name="title" value="{{ old('title') }}" 
                autocomplete="title">

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <button type="button" onclick="filter()" class="btn btn-secondary">{{__('Search')}}</button>
    </div>

</form>

<script>
    function filter()
    {   
        var filter_form = $("#filter_form");
        $.ajax({
            type : 'POST',
            url : '',
            data : filter_form.serialize(),
            success:function(data){
                            $('#filtered_writings').html(data);
                        }
        });
    }
</script>