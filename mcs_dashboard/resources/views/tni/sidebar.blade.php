<div class="flex flex-col gap-4 bg-[#E6E2DF] rounded-2xl w-[255px] min-h-screen">
    <div class="flex items-center justify-center mt-[28px]">
        <img class="" src="{{ asset('images/LOGO sidebar.png') }}" alt="logo tni sidebar">
    </div>
    <div class="flex flex-col m-4 gap-1">
        <a class="p-2 text-[#747474] text-sm rounded-md hover:bg-white @if(Request::is('home')) bg-white font-bold @else font-medium @endif" href="/home">Beranda</a>
        <a class="p-2 text-[#747474] text-sm rounded-md hover:bg-white @if(Request::is('mcs-data')) bg-white font-bold @else font-medium @endif" href="/mcs-data">Liat Data MCS</a>
        <a class="p-2 text-[#747474] text-sm rounded-md hover:bg-white @if(Request::is('gangguan')) bg-white font-bold @else font-medium @endif" href="">Laporan Gangguan Layanan</a>
    </div>
</div>