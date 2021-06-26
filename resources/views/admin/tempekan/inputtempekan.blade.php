<x-template-layout>
    <h2 class="font-semiibold text-xl text-gray-800 leading-tight"></h2>
    
    <div class="rounded-tl-3xl bg-gradient-to-r from-orange-400 to-red-300 p-4 shadow text-2xl text-black">
        <div class="font-serif font-sm"><i class="fas fa-bars"> </i>&nbsp {{$title}} </div>
  <form action="{{(isset($tempekan))?route('tempekan.update', $tempekan->id):route('tempekan.store')}}" method="POST" enctype="multipart/from-data">
    
    @csrf
    @if (isset($tempekan))
        @method ('PUT')
    @endif

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5  sm:p-3">
            <div class="grid grid-cols-3 gap-3">

              <div class="col-span-6 sm:col-span-3">
                <label for="nama" class="block text-sm font-medium text-gray-700 font-serif">Nama</label>
                <input type="text" name="nama" value="{{(isset($tempekan))?$tempekan->nama:old('nama')}}" id="nama" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 rounded-md h-9 mt-1 font-serif" placeholder="Masukkan Nama Lengkap">
              </div>
  
              <div class="col-span-3 sm:col-span-3">
                <div class="col-span-2">
                    <label for="periode" class="block text-sm font-medium text-gray-700 font-serif">Periode</label>
                    <input type="text" name="periode" id="periode" value="{{(isset($tempekan))?$tempekan->periode:old('periode')}}" autocomplete="periode" class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 rounded-md h-9 mt-1 font-serif" placeholder="Masukan Periode">
                </div>

              <div class="col-span-3 sm:col-span-3">
                <label for="jabatan" class="block text-sm font-medium text-gray-700 font-serif">Jabatan</label>
                <select name="jabatan" id="jabatan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif">
                  <option>-- Pilih Jabatan--</option>
                  @foreach ($tjabatan as $item)
                  <option value="{{$item->id_jb}}" {{(old('jabatan')== $item->id_jb || (isset($tempekan) && $tempekan->jabatan =$item ->id_jb))
                           ? 'selected' : '' }}>{{$item->jabatan}}</option>
                  @endforeach
                </select>
              </div>
        
                <div class="col-span-3 sm:col-span-3 mt-2">
                  <label for="nam_tem" class="block text-sm font-medium text-gray-700 font-serif">Nama Tempekan</label>
                    <select name="nam_tem" id="nam_tem" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif">
                      <option>-- Pilih Nama Tempekan--</option>
                      @foreach ($nam_tem as $item)
                      <option value="{{$item->id_nam}}" {{(old('nam_tem')== $item->id_nam || (isset($tempekan) && $tempekan->nam_tem =$item ->id_nam))
                          ? 'selected' : '' }}>{{$item->nam_tem}}</option>
                        @endforeach
                      </select>
                    </div>
                
                  <div class="col-span-3 sm:col-span-3 mt-3">
                    <label for="tem_bag" class="block text-sm font-medium text-gray-700 font-serif">Tempekan Bagian</label>
                     <select name="tem_bag" id="tem_bag" class=" block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-2 font-serif">
                        <option>-- Pilih Tempekan Bagian--</option>
                        @foreach ($tem_bag as $item)
                        <option value="{{$item->id_tem}}" {{(old('tem_bag') == $item->id_tem || (isset($tempekan) && $tempekan->tem_bag =$item ->id_tem))
                          ? 'selected' : '' }}>{{$item->tem_bag}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-span-3 sm:col-span-3 mt-3">
                      <label for="ket" class="block text-sm font-medium text-gray-700 font-serif">Keterangan</label>
                      <select name="ket" id="ket" class=" block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-2 font-serif">
                    <option>-- Pilih Keterangan--</option>
                    @foreach ($tbket as $item)
                    <option value="{{$item->id_ket}}" {{(old('ket')== $item->id_ket || (isset($tempekan) && $tempekan->ket =$item ->id_ket))
                      ? 'selected' : '' }}>{{$item->ket}}</option>
                    @endforeach
                  </select>
                </div>
     
                <div class="px-4 py-3 text-right sm:px-6 font-serif">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-serif">     
                        <a href="{{route('tempekan.index')}}">Kembali &nbsp</a>
                    </button>
                    <button type="submit" class="inline-flex justify-center bg-gray py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">Save</button>
                </div>
            </div>
        </div>
    </div>
  </form>
</div>
</x-template-layout>
