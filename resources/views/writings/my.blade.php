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
            <a class="btn btn-sedondary my-3 float-end" href="{{route('writing.create')}}">{{ __('Add writing') }}</a>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My writings') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($writings as $writing)
                        <div class="pb-3">
                            <div>
                                <a href="{{route('writing.show',['writing' => $writing->id])}}"><b>{{$writing->name}}</b></a>
                            </div>

                            <div>
                                Posts: {{$writing->posts()->count()}}
                            </div>

                            
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            {{ $writings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
