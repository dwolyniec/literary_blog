<div id="filtered_writings" class="card">
    <div class="card-header">{{ __('Writing feed') }}</div>

    <div  class="card-body">
        @if(!$writings->isNotEmpty())
            {{__('No writings to display')}}
        @else
            @foreach ($writings as $writing)
                <div class="pb-3">
                    <div>
                        <a href="{{route('writing.show',['writing' => $writing->id])}}"><b>{{ strtoupper($writing->name) }}</b></a>
                        @cannot('update', $writing)
                            {{__('by')}} {{ $writing->user->name }}
                        @endcannot('update', $writing)
    
                    </div>
                    
                    @php
                        $post = $writing->posts()->get()->first();
                    @endphp

                    <div>
                        <b style="font-size: 1.2rem">"{{$post->title}}"</b>
                    </div>

                    <div>
                        @if(strlen($post->content) > 3000)
                            {!! substr($post->content, 0, 3000). '[...]' !!}
                        @else
                            {!! $post->content !!}
                        @endif
                    </div>
                    
                </div>
            @endforeach
        @endif
    </div>
</div>