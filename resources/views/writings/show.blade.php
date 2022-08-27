@extends('layouts.app')

@section('content')
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
        

        <div class="col-md-10">
            <a class="btn btn-sedondary my-3 float-end" href="{{route('post.create')}}">{{ __('Add post') }}</a>
        </div>
        <div class="col-md-10">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <b >{{ $writing->name }}</b>
                    <a class="p-3" href="{{route('writing.edit',['writing' => $writing->id])}}">Edit</a>

                    <div class="">
                        Genre: {{ $genre->name }}
                    </div>
                </div>

                <div class="card-body">
                   
                    @foreach ($writing->posts as $post)
                        <div class="mb-2">
                            <a href="{{route('post.show',['post' => $post->id])}}">
                                "{{$post->title}}"
                            </a>
                        </div>

                        <div class="mb-4">
                            {{$post->content}}
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
