<x-app>
<header class="mb-6" >
    <div class="relative">
        <img src="/images/default-profile-banner.jpg"
             class="mb-2">
        @if($user->avatar)
        <img
            src="/storage/{{ $user->avatar }}"
            class="rounded-full mr-2 absolute buttom-0 transform -translate-x-1/2 -translate-y-1/2 height-150px"
            style="left:50%; height: 150px"
            width="150px"

        >
        @else
            <img
                src="/images/default-avatar.jpeg"
                class="rounded-full mr-2 absolute buttom-0 transform -translate-x-1/2 -translate-y-1/2 "
                style="left:50%; height: 150px"
                width="150"
            >
            @endif

    </div>

    <div class="flex justify-between items-center mb-4">
        <div style="max-width: 270px;">
            <h3 class="font-bold text-2xl ">{{$user->name}}</h3>
            <p class="text-sm ">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
        <div class="flex">
           @if(Current_user()->is($user))
              <a href="/profiles/{{$user->username}}/edit" class="rounded-full border border-gray-300 mr-4 py-2 px-4 text-black text-xm ">Edit profile </a>
            @endif
              <x-follow-button :user="$user"></x-follow-button>
        </div>
    </div>
    <div class="border border-gray-300 rounded-full mt-6 ">
    <p class="text-sm p-4 "><b>Bio</b><br>The Biotechnology Innovation Organization is the largest trade organization
        in the world that represents the biotechnology industry. It was founded in 1993 as the Biotechnology Industry
        Organization, and changed its name to the Biotechnology Innovation Organization on January 4, 2016.</p>
    </div>

</header>
           @include('timeline.timeline', ['tweets'=>$tweets])

</x-app>
