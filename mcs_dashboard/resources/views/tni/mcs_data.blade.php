@extends('layouts.tni')

@section('judul','Data')

@section('content')
    <div class="mx-[42px] w-[1050px]">
        <div class="my-[30px] flex justify-between">
            <p class=" font-[600] text-xl">Data MCS</p>
            <button class="flex justify-between items-center  px-4 py-3 border border-[#A6A6A6] text-black bg-white h-[44px] w-[112px] rounded-xl hover:bg-gray-200">
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
    
@endsection