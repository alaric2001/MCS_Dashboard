@extends('layouts.tni')

@section('judul','Home')

@section('content')
    <div class="mx-[42px]">
        <div class="rounded-2xl bg-[#EAE5DD] h-[280px] mt-[30px] flex justify-between">
            <div class="ml-[40px] my-[40px]">
                <p class="font-bold text-3xl mb-3 text-[#394C29]">
                    SELAMAT DATANG DI MONITORING <br>
                    SISTEM KOMUNIKASI TNI.
                </p>
                <p class="leading-[18px] text-[#394C29] font-medium">
                    Aplikasi ini akan membantu Anda untuk memonitoring <br>
                    penggunaan MCS Dan juga pelaporan gangguan layanan
                </p>
                <button class="bg-[#394C29] font-bold rounded-xl px-4 py-3 text-white mt-[30px]">Laporan Gangguan</button>
            </div>
            <div class="w-[40%] flex items-end ">
                <img class="rounded-2xl" src="{{ asset('images/bg.png') }}" alt="bg">
            </div>
            
            
        </div>
    </div>
    
    
@endsection