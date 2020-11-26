<div class="bg-gray-200 rounded-lg py-4 px-6">
<h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>
        @if(auth()->check())
            @forelse(auth()->user()->followers as $user)
                <li class="{{$loop->last?'':'mb-4'}}">
                    <div class="flex items-center text-sm">
                        <a href="{{route('profile', $user)}}">
                            @if($user->avatar)
                                <img
                                    src="/storage/{{ $user->avatar }}"
                                    alt=""
                                    class="rounded-full mr-2"
                                    style=" height:40px ; width: 40px"

                                >
                            @else
                                <img
                                    src="/images/default-avatar.jpeg"
                                    alt=""
                                    class="rounded-full mr-2"
                                    style=" height:40px ; width: 40px"

                                >
                            @endif

                        </a>
                        <a href="{{$user->path()}}">  {{ $user->name }}</a>
                    </div>
                </li>
            @empty
                <li>
                    <div class="flex items-center text-sm"> No Friends yet!!</div>
                </li>
            @endforelse
        @endif
    </ul>
</div>
