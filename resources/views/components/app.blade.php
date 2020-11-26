<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">

                    <div class="lg:w-32">

                        @include('_sidebar-links')

                    </div>
                @auth
                    <div class="lg:flex-1 lg:mx-10 " style="max-width:750px">
                        {{ $slot }}
                    </div>
                        <div class="lg:w-1/6">
                            @include('friends-list')
                        </div>
                @endauth
            </div>
        </main>
    </section>
</x-master>
