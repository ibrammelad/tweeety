<div class="border border-blue-400 rounded-lg px-8 py-4" >
    <form  method="post" action="/tweets">
        @csrf
            <textarea
                class="w-full"
                name="body"
                placeholder="What 's up doc ?"
                rows="3"
                onfocus
                required
            >

            </textarea>

            <hr class="my-2">

            <footer class="flex justify-between items-center">
               @if(auth()->user()->avatar)
                <img
                    src="/storage/{{auth()->user()->avatar}}"
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
                <button
                    type="submit"
                    class="bg-blue-500 rounded-lg shadow py-2 px-8 hover:bg-blue-800 text-white font-bold"
                >
                    Publish!
                </button>
            </footer>
    </form>
    @error('body')
    <div class="text-red-500 text-sm mt-2"> {{ $message }}</div>
    @enderror
</div>
