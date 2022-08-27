@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Writing feed') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <div class="pb-3">
                            <div>
                                <b>{{$post->writing->name}}</b>
                            </div>

                            <div>
                                "{{$post->title}}"
                            </div>

                            <div>
                                {{$post->content}}
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
