@extends('layouts.tni')

@section('judul','Data')

@section('content')
    <div class="mx-[42px] w-[1050px]">
        <div class="my-[30px] flex justify-between">
            <p class=" font-[600] text-xl">Data MCS</p>
            <button id="openModalButton" class="flex justify-between items-center  px-4 py-3 border border-[#A6A6A6] text-black bg-white h-[44px] w-[112px] rounded-xl hover:bg-gray-200">
                <i class="material-icons">filter_list</i>
                <p>Filter</p>
            </button>
        </div>
        
        <div class="pb-10">
            <table class="table-auto w-[1050px]">
                <thead>
                    <tr class="bg-[#8A7F56] py-[30px] px-[12px] text-white">
                        <th>No</th>
                        <th>Nomor MCS</th>
                        <th>Nama/Jenis/ID Pangkat</th>
                        <th>Satuan</th>
                        <th>Kategori</th>
                        <th>Tanggal Aktif</th>
                        <th>Paket Data</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datamcs as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->no_mcs }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->tgl_aktif }}</td>
                        <td>{{ $item->paket_data }}</td>
                        <td>{{ $item->status }}</td>
                        <td>-</td>
                    </tr>
                    @endforeach 
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal hidden fixed top-0 left-0 w-full h-full flex items-center justify-center">
        {{-- <div id="modalOverlay" class="modal-overlay fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
        <div id="modalOverlay" class="modal-container fixed top-0 left-0 z-50 w-full h-full flex items-center justify-center"> --}}
            <div class="modal-content w-[440px] bg-white p-8 rounded-lg shadow-md m-auto h-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold mb-4">Filter Data MCS</h1>
                    <button id="closeModalButton" class="p-2">
                        <h1 class="text-lg font-semibold mb-4">x</h1>
                    </button>
                </div>
                
                <form action="/inputlaporan" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="data_mcs_id" class="block text-sm font-medium text-gray-700">Nomor Mcs</label>
                        <input type="number" name="nomor mcs" id="data_mcs_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="pic" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Satuan</label>
                        <input type="text" name="satuan" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <input type="text" name="satuan" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Tanggal Aktif</label>
                        <input type="date" name="tgl_aktif" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Paket data</label>
                        <input type="text" name="paket data" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="no_hp_pic" class="block text-sm font-medium text-gray-700">Status</label>
                        <input type="text" name="status" id="no_hp_pic" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end">
                        <div>
                            <a href="/mcs-data" id="closeModalButton" class="bg-[#6C757D] text-white px-4 py-2 rounded-md hover:bg-[#52595e]">Batal</a>
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