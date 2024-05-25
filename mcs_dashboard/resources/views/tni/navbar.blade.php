<div class="flex justify-end">
    {{-- <a href="/profile" class="flex items-center gap-2">
        <div class="h-9 w-9 bg-[#8A7F56] rounded-[50%]"></div>
        User
    </a>  --}}
    {{-- <img class="h-9 w-9 object-cover rounded-[50%]" src="{{ asset('images/pakbos1.jpg') }}" alt="profile"> --}}

    <div class="flex items-center gap-2">
        @guest
            <a href="/login" class="rounded-md p-2 border border-black text-black hover:bg-[#dcc69e] text-sm">
                Log in
            </a>
            <a href="/register" class="rounded-md p-2 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                Register
            </a>
        @endguest
        @auth
            {{-- <div class="bg-[#00000050] w-0.5 h-6 mx-3"></div> --}}
            <a href="/profile" class="flex items-center gap-2">
                <div class="h-9 w-9 bg-[#8A7F56] rounded-[50%]"></div>
                {{-- <img class="h-9 w-9 object-cover rounded-[50%]" src="{{ asset('images/'. Auth::user()->user_foto) }}" alt=""> --}}
                <p class="">{{ Auth::user()->name }}</p>
            </a> 
        @endauth
    </div>

</div>