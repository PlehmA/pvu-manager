<div class="sm:px-20 bg-gray-900">
    @if (Auth::user()->bearer_token)
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
        @foreach ($plants['data'] as $item)
            <div class="rounded overflow-hidden shadow-lg justify-center bg-gray-800">
                <img src="{{ $item['plant']['iconUrl'] }}" class="max-h-40 m-auto" alt="">
                
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-center border text-gray-500">{{ ucwords($item['plant']['stats']['type']) }}</div>
                    <p class="text-gray-500 text-base border text-center">
                        LE:{{ $item['plant']['farmConfig']['le'] }}/{{ $item['plant']['farmConfig']['hours'] }} Hora
                        
                    </p>
                    <p class="text-gray-500 text-base border text-center">
                        {{ $item['stage'] == 'farming' ? 'Farmings' : 'Crow' }}
                    </p>
                  </div>
            </div>
        @endforeach
      </div>
      @else
      <div class="bg-gray-500 border border-black text-gray-900 px-4 py-3 rounded relative mt-3" role="alert">
        <strong class="font-bold">Dear User!</strong>
        <span class="block sm:inline">You need to fill BEARER_TOKEN in profile user form to receive feed information. ♥</span>
      </div>
@endif
</div>
