@extends('layouts.tni')

@section('judul','Data')

@section('content')
    <div class="mx-[42px]">
        <p class="my-[30px] font-[600] text-xl">Data MCS</p>
        <div class="pb-10">
            <table class="table-auto ">
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