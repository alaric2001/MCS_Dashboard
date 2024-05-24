@extends('layouts.tni')

@section('judul','Home')

@section('content')
    <div class="mx-[42px]">
        <div class="rounded-2xl bg-[#EAE5DD] h-[280px] mt-[30px] flex justify-between">
            <div class="ml-[40px] my-[40px] flex flex-col gap-4">
                <p class="font-bold text-3xl text-[#394C29]">
                    SELAMAT DATANG DI MONITORING <br>
                    SISTEM KOMUNIKASI TNI.
                </p>
                <p class="leading-[18px] text-[#394C29] font-medium">
                    Aplikasi ini akan membantu Anda untuk memonitoring <br>
                    penggunaan MCS Dan juga pelaporan gangguan layanan
                </p>
                <button id="openModalButton" class="bg-[#394C29] font-bold rounded-xl px-4 py-3 w-[192px] text-white ">Laporan Gangguan</button>
            </div>
            <div class="w-[40%] flex items-end ">
                <img class="rounded-2xl" src="{{ asset('images/bg.png') }}" alt="bg">
            </div>
            
            
        </div>
    </div>
    
    <!-- Modal -->
    <div id="myModal" class="hidden">
        {{-- <div id="modalOverlay" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
        <div id="modalOverlay" class="modal-container fixed top-0 left-0 z-50 w-full h-full flex items-center justify-center"> --}}
            <div class="modal-content w-[440px] bg-white p-8 rounded-lg shadow-md m-auto h-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold mb-4">Tambah Laporan</h1>
                    <button id="closeModalButton" class="p-2">
                        <h1 class="text-lg font-semibold mb-4">x</h1>
                    </button>
                </div>
                
                <form action="/inputlaporan" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="data_mcs_id" class="block text-sm font-medium text-gray-700">Nomor MCS</label>
                        {{-- <input type="text" name="data_mcs_id" id="data_mcs_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                        <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="data_mcs_id" id="data_mcs_id" required>
                            <option value="" disabled selected hidden>Pilih Nomor MCS</option>
                            @foreach ($datamcs as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->no_mcs }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="pic" class="block text-sm font-medium text-gray-700">PIC</label>
                        <input type="text" name="pic" id="pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Nomor HP PIC</label>
                        <input type="number" name="no_hp_pic" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="ket" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea name="ket" id="ket" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <div>
                            <a href="/gangguan" id="closeModalButton" class="bg-[#6C757D] text-white px-4 py-2 rounded-md hover:bg-[#52595e]">Batal</a>
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Simpan</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        // Open modal when button clicked
        document.getElementById('openModalButton').addEventListener('click', function() {
            document.getElementById('myModal').classList.remove('hidden');
            document.getElementById('myModal').classList.add('modal', 'fixed', 'top-0', 'left-0', 'w-full', 'h-full', 'flex', 'items-center', 'justify-center');
        });
        // Close modal when close button clicked
        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('myModal').classList.add('hidden');
        });


        window.onclick = function(event) {
            if (event.target == myModal) {
                document.getElementById('myModal').classList.add('hidden');
            }
        }
    </script>
@endsection