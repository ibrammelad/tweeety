<x-app>
    <div>
        @foreach($users as $user)
            @if($user->avatar)
                <div class="flex m-3">
                    <a href="{{$user->path()}}">
                        <img
                            src="/storage/{{$user->avatar}}"
                            alt="{{$user->name}}"
                            style=" height:60px ; width: 60px"
                            class="rounded-lg"
                        >
                    </a>
                    <a href="{{$user->path()}}">
                        <h5 class="ml-3">
                            {{'@'.$user->name}}
                        </h5>
                    </a>
                </div>
            @else
                <div class="flex m-3">
                    <a href="{{$user->path()}}">
                        <img src="/images/default-avatar.jpeg"
                             alt="{{$user->name}}"
                             style=" height:60px ; width: 60px"
                             class="rounded-lg"

                        >
                    </a>
                    <a href="{{$user->path()}}">
                         <h5 class="ml-3 pt-3">
                             {{'@'.$user->name}}
                         </h5>
                    </a>
                </div>
            @endif

    @endforeach
    </div>
</x-app>
