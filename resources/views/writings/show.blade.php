@extends('layouts.app')

@section('content')

@vite(['resources/scss/rating.scss'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container">
    <div class="row justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! \Session::get('success') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        
        @can('update', $writing)
            <div class="col-md-10">
                <a class="btn btn-sedondary my-3 float-end" href="{{route('post.create',[$writing->id])}}">{{ __('Add post') }}</a>
            </div>
        @endcan
        <div class="col-md-10">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <b >{{ $writing->name }}</b>
                    @can('update', $writing)
                        <a class="p-3" href="{{route('writing.edit',['writing' => $writing->id])}}">{{__('Edit')}}</a>
                    @endcan

                    @cannot('update', $writing)
                        {{__('by')}} {{ $writing->user->name }}
                    @endcannot()

                    <div class="">
                        {{__('Genre')}}: {{ $genre->name }}
                    </div>
                </div>
                <form action=" {{ route('writing.rate', $writing) }}" method="POST">
                    @csrf
                    
                    <div class="wrapper float-end" style="left: 0%">
                        <input name="ratingRadio" type="radio" id="st1" value="1" />
                        <label for="st1"></label>
                        <input name="ratingRadio" type="radio" id="st2" value="2" />
                        <label for="st2"></label>
                        <input name="ratingRadio" type="radio" id="st3" value="3" />
                        <label for="st3"></label>
                        <input name="ratingRadio" type="radio" id="st4" value="4" />
                        <label for="st4"></label>
                        <input name="ratingRadio" type="radio" id="st5" value="5" />
                        <label for="st5"></label>
                    </div>
                </form>
                
                  
                <div class="card-body">
                   
                    @foreach ($writing->posts as $post)
                        <div class="mb-2">
                            <a href="{{route('post.show',['post' => $post->id])}}">
                                "{{$post->title}}"
                            </a>
                        </div>

                        <div class="mb-4">
                            @if(strlen($post->content) > 3000)
                                {!! substr($post->content, 0, 3000). '[...]' !!}
                            @else
                                {!! $post->content !!}
                            @endif
                            
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>

        
    </div>
</div>

<script>

$("[name='ratingRadio']").on('click', function(){
    $("form").submit();
})

</script>

@endsection
