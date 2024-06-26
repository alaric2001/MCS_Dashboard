@extends('layouts.tni')

@section('judul','Gangguan')

@section('content')
    <div class="mx-[42px] w-[1050px]">
        <div class="my-[30px] flex justify-between">
            <p class=" font-[600] text-xl">Laporan Gangguan Layanan</p>
            <div class="flex gap-4">
                <button id="openFilter" class="flex justify-between items-center  px-4 py-3 border border-[#A6A6A6] text-black bg-white h-[44px] w-[112px] rounded-xl hover:bg-gray-200">
                    <i class="material-icons">filter_list</i>
                    <p>Filter</p>
                </button>
                {{-- <button id="open_importdata_btn" class="flex justify-between items-center  px-4 py-3 border border-[#A6A6A6] text-black bg-white h-[44px] w-[162px] rounded-xl hover:bg-gray-200">
                    <i class="material-icons">file_upload</i>
                    <p>Import Data</p>
                </button> --}}
                <button id="openModalButton" class="flex justify-between items-center  px-4 py-3 border border-[#394C29] text-white bg-[#394C29] h-[44px] rounded-xl hover:bg-[#4c6637]">
                    + Buat Laporan
                </button>
            </div>
            
        </div>
        <div class="pb-10">
            <table class="table-auto w-[1050px]">
                <thead>
                    <tr class="bg-[#8A7F56] py-[30px] px-[12px] text-white">
                        <th>No</th>
                        <th>Nomor MCS</th>
                        <th>PIC</th>
                        <th>Nomor HP PIC</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gangguan as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->no_mcs }}</td>
                        <td>{{ $item->pic }}</td>
                        <td>{{ $item->no_hp_pic }}</td>
                        <td>{{ $item->ket }}</td>
                        <td>
                            <a class="font-semibold text-[12px] rounded-md text-white bg-red-500 p-2" href="/delete_laporan/{{ $item->id }}" onclick="return confirm('Anda yakin akan menghapus Laporan?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Input Laporan -->
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
                            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-[#6d805d]">Simpan</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Filter -->
    <div id="modal_filter" class="hidden ">
        {{-- <div id="modalOverlay" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
        <div id="modalOverlay" class="modal-container fixed top-0 left-0 z-50 w-full h-full flex items-center justify-center"> --}}
            <div class="modal-content w-[440px] bg-white p-8 rounded-lg shadow-md m-auto h-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold mb-4">Filter Laporan</h1>
                    <button id="close_filter" class="p-2">
                        <h1 class="text-lg font-semibold mb-4">x</h1>
                    </button>
                </div>
                
                <form action="/gangguan" method="GET">
                    @csrf
                    <div class="mb-4">
                        <label for="data_mcs_id" class="block text-sm font-medium text-gray-700">Nomor MCS</label>
                        <input value="{{ request()->get('nomor_mcs') }}" type="number" name="nomor_mcs" id="nomor_mcs" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="pic" class="block text-sm font-medium text-gray-700">PIC</label>
                        <input value="{{ request()->get('pic') }}" type="text" name="pic" id="pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Nomor HP PIC</label>
                        <input value="{{ request()->get('no_hp_pic') }}" type="number" name="no_hp_pic" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        {{-- <input value="{{ request()->get('kategori') }}" type="text" name="satuan" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                        <textarea value="{{ request()->get('ket') }}" name="ket" id="ket" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <div>
                            <a href="/gangguan" id="close_filter" class="bg-[#6C757D] text-white px-4 py-2 rounded-md hover:bg-[#52595e]">Batal</a>
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Simpan</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Import Data -->
    <div id="modal_importdata" class="hidden">
        {{-- <div id="modalOverlay" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
        <div id="modalOverlay" class="modal-container fixed top-0 left-0 z-50 w-full h-full flex items-center justify-center"> --}}
            <div class="modal-content w-[440px] bg-white p-8 rounded-lg shadow-md m-auto h-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold mb-4">Import Data</h1>
                    
                    <button id="close_importdata_btn" class="p-2">
                        <h1 class="text-lg font-semibold mb-4">x</h1>
                    </button>
                </div>
                
                <form action="/inputlaporan" method="POST">
                    @csrf
                    <div class="mb-4 flex flex-col items-center">
                        {{-- <label for="ket" class="block text-sm font-medium text-gray-700">Keterangan</label> --}}
                        <i class="material-icons text-3xl font-semibold">cloud_upload</i>
                        <input type="file" name="data_laporan" id="data_laporan" class="mt-1 border p-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></input>
                    </div>
                    <div class="flex justify-end">
                        <div>
                            <a href="" id="close_importdata_btn" class="bg-[#6C757D] text-white px-4 py-2 rounded-md hover:bg-[#52595e]">Batal</a>
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

        // const modalOverlay = document.getElementById('modalOverlay');
        // const modal = document.getElementById('myModal');

        //Modal Filter
        document.getElementById('openFilter').addEventListener('click', function() {
            document.getElementById('modal_filter').classList.remove('hidden');
            document.getElementById('modal_filter').classList.add('modal', 'fixed', 'top-0', 'left-0', 'w-full', 'h-full', 'flex', 'items-center', 'justify-center');
        });
        document.getElementById('close_filter').addEventListener('click', function() {
            document.getElementById('modal_filter').classList.add('hidden');
        });


        document.getElementById('open_importdata_btn').addEventListener('click', function() {
            document.getElementById('modal_importdata').classList.remove('hidden');
            document.getElementById('modal_importdata').classList.add('modal', 'fixed', 'top-0', 'left-0', 'w-full', 'h-full', 'flex', 'items-center', 'justify-center');
        });
        document.getElementById('close_importdata_btn').addEventListener('click', function() {
            document.getElementById('modal_importdata').classList.add('hidden');
        });


        window.onclick = function(event) {
            if (event.target == myModal) {
                document.getElementById('myModal').classList.add('hidden');
            }
        }
    </script>
@endsection