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

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <a href="{{route('writing.show',['writing' => $post->writing->id])}}"><b>{{$post->writing->name}}</b></a>

                    @can('update', $post)
                        <a class="p-3" href="{{route('post.edit',['post' => $post->id])}}">Edit</a>
                    @endcan
                </div>

                <div class="card-body">
                   
                    <div class="mb-2">
                        
                            "{{$post->title}}"
                       
                    </div>

                    <div class="mb-4">
                        {!! $post->content !!}
                    </div>
                   
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
