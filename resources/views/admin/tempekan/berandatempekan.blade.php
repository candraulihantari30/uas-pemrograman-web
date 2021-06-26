<x-template-layout>
    <h2 class="font-semiibold text-xl text-gray-800 leading-tight"></h2>
      <div class="rounded-tl-3xl bg-gradient-to-r from-orange-400 to-red-300 p-4 shadow text-1xl text-black font-serif">
        <div class="text-medium"> <i class="fas fa-bars">&nbsp</i> {{$title}} </div>
  
       <div class="shadow px-6 py-4 divide-gray-200 rounded sm:px-1 sm:py-1 sm:br-gray-100 flex justify-end">
            <button>     
            <a href="{{route('tempekan.create')}}" class="px-4 py-1 text-sm rounded text-white-400 border border-purple-500 hover:text-white hover:bg-purple-600 font-serif ">
            Tambah &nbsp <i class="fas fa-plus-square"> &nbsp </i>
            </a>
            </button>
      </div>
        
  
  <div class="shadow  mt-3">
    <table class="min-w-full divide-y bg-white">
  
              <tr class="font-serif">
                <th class="px-6 py-3 text-left text-xs text-small text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs text-small text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs text-small text-gray-500 uppercase tracking-wider">Nama Tempekan</th>
                <th class="px-6 py-3 text-left text-xs text-small text-gray-500 uppercase tracking-wider">Aksi</th>
              </tr>
              <!-- More items... -->
              <?php $no = 1; ?>
              @foreach ($tempekan as $item)
              <tr class="font-serif" >
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{$no}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{$item->nama}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{$item->nam_tem}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  
                  <form action="{{route('tempekan.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Apakah anda yakin menghapus data ini ?')">
                    <a href="{{route('tempekan.edit',$item->id)}}" class="px-4 py-1 text-sm rounded text-blue-700 border border-blue-500 hover:text-white hover:bg-blue-600">
                      <i class="fas fa-edit"></i>
                    </a> &nbsp |
                      @csrf
                      @method('DELETE')
                    <button class="px-4 py-1 text-sm rounded text-red-700 border border-red-500 hover:text-white hover:bg-red-600"><i class="far fa-trash-alt"></i></button> |

                    <a href="{{route('tempekan.show',$item->id)}}" class="px-4 py-1 text-sm rounded text-yellow-400 border border-yellow-500 hover:text-white hover:bg-yellow-600">
                      <i class="fas fa-info "></i>
                    </a>
                  </form>
                </td>
            
              </tr>
              <?php $no++; ?>
              @endforeach
          </table> 
      </div>
      <div class="card-footer mt-2 font-serif">
        {{$tempekan->Links ()}}
      </div>
    </div>
    @include('sweetalert::alert')
  </x-template-layout>