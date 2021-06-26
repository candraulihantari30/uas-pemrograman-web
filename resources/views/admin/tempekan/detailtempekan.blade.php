<x-template-layout>
    
    <div class="rounded-tl-3xl bg-gradient-to-r from-orange-400 to-red-300 p-4 shadow text-2xl text-black">
        <div class=" font-serif font-sm"> <i class="fas fa-bars">&nbsp</i> {{$title}} </div>

        <div class="shadow px-6 py-4 divide-gray-200 rounded sm:px-1 sm:py-1 sm:br-gray-100 flex justify-end">
        <button type="submit" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">     
            <a href="{{route('tempekan.index')}}">
             Kembali &nbsp
            </a>
        </button>
    </div>
</div>

    <table class="ml-4 mt-2 border-4 w-1/2">

        
        <tr class="font-serif ">
            <td>Nama</td>
            <td> : </td>
            <td>{{$tempekan->nama}}</td>
        </tr>
        
        <tr class="font-serif">
            <td>Jabatan</td>
            <td> : </td>
            <td>{{$tempekan->jabatan}}</td>
        </tr>
        <tr class="font-serif">
            <td>Periode</td>
            <td> : </td>
            <td>{{$tempekan->periode}}</td>
        </tr>
        <tr class="font-serif">
            <td>Nama Tempekan</td>
            <td> : </td>
            <td>{{$tempekan->nam_tem}}</td>
        </tr>
        <tr class="font-serif">
            <td>Tempekan Bagian</td>
            <td> : </td>
            <td>{{$tempekan->tem_bag}}</td>
        </tr>
        <tr class="font-serif" >
            <td>Keterangan</td>
            <td> : </td>
            <td>{{$tempekan->ket}}</td>
        </tr>
    </table>
</x-template-layout>