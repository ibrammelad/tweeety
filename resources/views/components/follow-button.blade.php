  @unless(Current_user()->is($user))
    <form  method="post" action="/profiles/{{$user->username}}/follow">
        @csrf
        <button  type="submit"  class="bg-blue-700 rounded-full   py-2 px-4  text-xm text-white">
            {{ auth()->user()->following($user) ? 'Unfollow ' : 'Follow Me' }}
        </button>
    </form>
  @endunless
