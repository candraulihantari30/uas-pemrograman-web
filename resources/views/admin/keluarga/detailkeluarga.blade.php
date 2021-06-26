<x-template-layout>
    
        <div class="rounded-tl-3xl bg-gradient-to-r from-orange-400 to-red-300 p-4 shadow text-2xl text-black">
            <div class=" font-serif font-sm"> <i class="fas fa-bars">&nbsp</i> {{$title}} </div>

            <div class="shadow px-6 py-4 divide-gray-200 rounded sm:px-1 sm:py-1 sm:br-gray-100 flex justify-end">
            <button type="submit" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">     
                <a href="{{route('keluarga.index')}}">
                 Kembali &nbsp
                </a>
            </button>
        </div>
    </div>

    <table class="ml-4 mt-2 w-1/2  border-4">
        <tr class="font-serif">
            <td>Nama</td>
            <td> : </td>
            <td>{{$keluarga->nama}}</td>
        </tr>
        
        <tr >
            <td class="font-serif">NIK</td>
            <td  class="font-serif"> : </td>
            <td class="font-mono">{{$keluarga->nik}}</td>
        </tr>
        <tr>
            <td  class="font-serif">No KK</td>
            <td  class="font-serif"> : </td>
            <td class="font-mono">{{$keluarga->no_kk}}</td>
        </tr>
        <tr>
            <td class="font-serif">Nik Adat</td>
            <td  class="font-serif"> : </td>
            <td class="font-mono">{{$keluarga->nik_adat}}</td>
        </tr>
        <tr  class="font-serif">
            <td>Tempat</td>
            <td> : </td>
            <td>{{$keluarga->tempat}}</td>
        </tr>
        <tr >
            <td  class="font-serif">Tanggal Lahir</td>
            <td class="font-serif" > : </td>
            <td  class="font-mono">{{$keluarga->tanggal_lahir}}</td>
        </tr>
        <tr class="font-serif" >
            <td>Jenis Kelamin</td>
            <td> : </td>
            <td>{{$keluarga->jk}}</td>
        </tr>
        <tr class="font-serif" >
            <td>Status Dalam Keluarga</td>
            <td> : </td>
            <td >{{$keluarga->status_kk}}</td>
        </tr>
        <tr  class="font-serif">
            <td>Pekerjaan</td>
            <td> : </td>
            <td>{{$keluarga->pekerjaan}}</td>
        </tr>
        <tr  class="font-serif">
            <td>Pendidikan</td>
            <td> : </td>
            <td>{{$keluarga->pendidikan}}</td>
        </tr>
        <tr  class="font-serif">
            <td>Nama Tempekan </td>
            <td> : </td>
            <td>{{$keluarga->nam_tem}}</td>
        </tr>
        <tr  class="font-serif">
            <td>Tempekan Bagian</td>
            <td> : </td>
            <td>{{$keluarga->tem_bag}}</td>
        </tr>
        <tr>
            <td  class="font-serif">Foto</td>
            <td  class="font-serif"> : </td>
            <td><img src="{{asset('storage/' .$keluarga->foto)}}" class="w-24 h-24" alt=""></td>
        </tr>
        <tr  class="font-serif">
            <td>Keterangan</td>
            <td> : </td>
            <td>{{$keluarga->keterangan}}</td>
        </tr>
    </table>
</x-template-layout>