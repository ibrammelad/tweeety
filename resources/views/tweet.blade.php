    <div class="flex {{$loop->last ?'p-4':'p-4 border-b border-gray-400'}} ">
        <div class="mr-2 flex-shrink-0">
            @if($tweet->user->avatar)
                 <a href="{{ $tweet->user->path() }}">
                    <img
                        src="/storage/{{ $tweet->user->avatar }}"
                        alt=""
                        class="rounded-full mr-2 "
                        style=" height:50px ; width: 50px"

                    >
                 </a>
            @else
                <a href="{{ $tweet->user->path() }}">
                    <img
                        src="/images/default-avatar.jpeg"
                        alt=""
                        class="rounded-full mr-2 "
                        style=" height:50px ; width: 50px"
                    >
                </a>
            @endif
        </div>
        <div class="">
            <h5 class="font-bold mb-5">
                <a href="{{ $tweet->user->path() }}">{{ $tweet->user->name }}</a>
            </h5>
            <p class="text-sm mb-4">
                {{ $tweet->body }}
            </p>

            <x-likes-buttom :tweet="$tweet"></x-likes-buttom>
        </div>
    </div>

