<div class="border border-gray-300 mt-6  mb-6 rounded-lg">
    @forelse($tweets as $tweet)
        @include('tweet')
    @empty
        <p class="p-4"> No tweets yet. </p>
    @endforelse
    {{$tweets->links()}}
</div>
