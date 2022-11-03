
@extends('layouts.app')

  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-3">
                
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        {{ __('Filters') }}
                    </button>
                </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        @include('components.filters')
                    </div>
                  </div>
            </div>

            @include('components.filtered_writings')
           
        </div>
    </div>
</div>
@endsection

