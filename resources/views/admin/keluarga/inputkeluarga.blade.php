<x-template-layout>
    <h2 class="font-semiibold text-xl text-gray-800 leading-tight"></h2>
    
    <div class="rounded-tl-3xl bg-gradient-to-r from-orange-400 to-red-300 p-4 shadow text-2xl text-black">
      <div class=" font-serif font-medium"> <i class="fas fa-bars">&nbsp</i> {{$title}} </div>
  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <form action="{{(isset($keluarga))?route('keluarga.update', $keluarga->id):route('keluarga.store')}}" 
      method="POST" enctype="multipart/form-data">&nbsp
    
      @csrf
      @if (isset($keluarga))
        @method ('PUT')
      @endif
  
      <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5  sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="col-span-6 sm:col-span-3">
                <label for="nama" class="block text-sm font-medium text-gray-700 font-serif">Nama</label>
                <input type="text" name="nama" value="{{(isset($keluarga))?$keluarga->nama:old('nama')}}" id="nama" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-9 mt-1 font-serif" placeholder="Masukkan Nama Lengkap">
              </div>
  
              <div class="col-span-6 sm:col-span-3">
                <label for="nik" class="block text-sm font-medium text-gray-700 font-serif">NIK</label>
                <input type="text" name="nik" value="{{(isset($keluarga))?$keluarga->nik:old('nik')}}" id="nik" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-9 mt-1 font-mono" placeholder="Masukkan NIK">
              </div>
  
              <div class="col-span-6 sm:col-span-3">
                <label for="no_kk" class="block text-sm font-medium text-gray-700 font-serif">No KK</label>
                <input type="text" name="no_kk"  value="{{(isset($keluarga))?$keluarga->no_kk:old('no_kk')}}" id="no_kk" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-9 mt-1 font-mono" placeholder="Masukkan No KK">
              </div>
  
              <div class="col-span-6 sm:col-span-3">
                <label for="nik_adat" class="block text-sm font-medium text-gray-700 font-serif">NIK Adat</label>
                <input type="text" name="nik_adat" value="{{(isset($keluarga))?$keluarga->nik_adat:old('nik_adat')}}" id="nik_adat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-9 mt-1 font-mono" placeholder="Masukkan NIK Adat">
              </div>
  
              <div class="col-span-6 sm:col-span-3">
                <label for="tempat" class="block text-sm font-medium text-gray-700 font-serif">Tempat</label>
                <input type="text" name="tempat" value="{{(isset($keluarga))?$keluarga->tempat:old('tempat')}}" id="tempat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-9 mt-1 font-serif" placeholder="Lengkapi Dengan Tempat Lahir">
              </div>
  
              <div class="col-span-6 sm:col-span-3">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 font-serif">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{(isset($keluarga))?$keluarga->tanggal_lahir:old('tanggal_lahir')}}" id="tanggal_lahir" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-9 mt-1 font-mono" >
              </div>
    
              <div class="col-span-6 sm:col-span-3">
                <label for="id_jk" class="block text-sm font-medium text-gray-700 font-serif">Jenis Kelamin</label>
                <select name="id_jk" id="id_jk" class="mt-1 block w-full py-2 px-3 border border-gray-300 
                bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif">
                  <option>-- Pilih Jenis Kelamin --</option>
                  @foreach ($jk as $item)
                  <option value="{{$item->id_jkel}}" {{(old('id_jk')== $item->id_jkel || 
                  (isset($keluarga) &&  $keluarga->id_jk == item ->id_jkel))
                    ? 'selected' : '' }}>{{$item->jk}}</option>
                  @endforeach
                </select>
              </div>
  
              <div class="col-span-6 sm:col-span-3">
                <label for="status_kk" class="block text-sm font-medium text-gray-700 font-serif">
                  Status Dalam Keluarga</label>
                <select name="status_kk" class="mt-1 block w-full py-2 px-3 border border-gray-300
                 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                 sm:text-sm h-9 mt-1 font-serif">
                  <option>-- Pilih Status Dalam Keluarga --</option>
                  @foreach ($status_kk as $item)
                  <option value="{{$item->id_sta}}" {{(old('status_kk')== $item->id_sta || (isset($keluarga) && 
                  $keluarga->status_kk == $item ->id_sta))
                    ? 'selected' : '' }}>{{$item->status_kk}}</option>
                  @endforeach
                </select>
              </div>
  
  
              <div class="col-span-6 sm:col-span-3">
                <label for="pekerjaan" class="block text-sm font-medium text-gray-700 font-serif">Pekerjaan</label>
                <select name="pekerjaan" id="pekerjaan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif">
                  <option>-- Pilih Pekerjaan --</option>
                  @foreach ($tpekerjaan as $item)
                  <option value="{{$item->id_peker}}" {{(old('pekerjaan')== $item->id_peker || (isset($keluarga) && $keluarga->pekerjaan == $item ->id_peker))
                    ? 'selected' : '' }}>{{$item->pekerjaan}}</option>
                  @endforeach
                </select>
              </div>
  
              <div class="col-span-9 sm:col-span-3">
                <label for="pendidikan" class="block text-sm font-medium text-gray-700 font-serif">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif">
                  <option>-- Pilih Pendidikan --</option>
                  @foreach ($pendidikan as $item)
                  <option value="{{$item->id_pen}}" {{(old('pendidikan')== $item->id_pen || (isset($keluarga) && $keluarga->pendidikan == $item ->id_pen))
                    ? 'selected' : '' }}>{{$item->pendidikan}}</option>
                  @endforeach
                </select>
              </div>
  
              <div class="col-span-6 sm:col-span-3">
                <label for="nam_tem" class="block text-sm font-medium text-gray-700 font-serif">Nama Tempekan</label>
                <select name="nam_tem"  id="nam_tem" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif" placeholder="Pilih Tempekan">
                  <option>-- Pilih Nama Tempekan --</option>
                        @foreach ($nam_tem as $item)
                        <option value="{{$item->id_nam}}" {{(old('nam_tem')== $item->id_nam || (isset($keluarga) && $keluarga->nam_tem =$item ->id_nam))
                          ? 'selected' : '' }}>{{$item->nam_tem}}</option>
                        @endforeach
                      </select>
                    </div>

              <div class="grid grid-cols-8 gap-4">
                <div class="col-span-10">
                    <label for="tem_bag" class="block text-sm font-medium text-gray-700 font-serif">Tempekan Bagian</label>
                    <select id="tem_bag" name="tem_bag" id="tem_bag" autocomplete="tem_bag" class="text-gray-700 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif" >
                      <option>-- Pilih Tempekan Bagian --</option>
                      @foreach ($tem_bag as $item)
                      <option value="{{$item->id_tem}}" {{(old('tem_bag')== $item->id_tem || (isset($keluarga) && $keluarga->tem_bag =$item ->id_tem))
                        ? 'selected' : '' }}>{{$item->tem_bag}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
                  <div class="grid grid-cols-8 gap-4">
                    <div class="col-span-10">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 font-serif">
                          Keterangan
                        </label>
                        <select id="keterangan" name="keterangan"  autocomplete="tem_bag" class="text-gray-700 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-9 mt-1 font-serif">
                          <option>-- Pilih Keterangan--</option>
                          @foreach ($keterangan as $item)
                          <option value="{{$item->id_keter}}" {{(old('keterangan')== $item->id_keter || (isset($keluarga) && $keluarga->keterangan =$item ->id_keter))
                            ? 'selected' : '' }}>{{$item->keterangan}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
            
                    <div class="col-span-6 sm:col-span-6">
                      <label class="block text-sm font-medium text-gray-700 font-serif">Foto</label>
                      <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                          @if (isset($keluarga) && $keluarga->foto!='')
                          <img src="{{asset('storage/' .$keluarga->foto)}}" class="w-24 h-24" alt="">
                          @else
                          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                          @endif
                          <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                              <span>Upload a file</span>
                              <input id="file-upload" name="foto" type="file" class="sr-only ">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs text-gray-500">
                            PNG, JPG, up to 10MB
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 font-serif">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">     
                      <a href="{{route('keluarga.index')}}">
                        Kembali &nbsp
                      </a>
                    </button>
                    <button type="submit" class="inline-flex justify-left py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Save
                    </button>
          </div>
        </div>
        </div>
    </form>
  </div>
</x-template-layout>