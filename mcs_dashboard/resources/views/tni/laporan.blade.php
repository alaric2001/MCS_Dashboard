@extends('layouts.tni')

@section('judul','Gangguan')

@section('content')
    <div class="mx-[42px] w-[1050px]">
        <div class="my-[30px] flex justify-between">
            <p class=" font-[600] text-xl">Laporan Gangguan Layanan</p>
            <div class="flex gap-4">
                <button class="flex justify-between items-center  px-4 py-3 border border-[#A6A6A6] text-black bg-white h-[44px] w-[112px] rounded-xl hover:bg-gray-200">
                    <i class="material-icons">filter_list</i>
                    <p>Filter</p>
                </button>
                <button class="flex justify-between items-center  px-4 py-3 border border-[#394C29] text-white bg-[#394C29] h-[44px] rounded-xl hover:bg-[#4c6637]">
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
                        <td>-</td>
                    </tr>
                    @endforeach 
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection