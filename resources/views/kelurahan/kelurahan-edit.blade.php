<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- update data --}}
        <div class="flex justify-center items-center">
            <div class="bg-white w-[600px] p-8 rounded-md">
                <div class=" mb-6">
                    <form action="{{ route('kelurahan.update', ['id' => $dataKelurahan->id]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="flex flex-col gap-4">
                            <div>
                                <label for="kode_kel" class="block text-sm font-medium text-gray-700">Kode Kelurahan:</label>
                                <input type="text" value="{{ $dataKelurahan->kode_kel }}" name="kode_kel" id="kode_kel" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="nama_kelurahan" class="block text-sm font-medium text-gray-700">Nama Kelurahan:</label>
                                <input type="text" value="{{ $dataKelurahan->nama_kelurahan }}" name="nama_kelurahan" id="nama_kelurahan" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="id_kecamatan" class="block text-sm font-medium text-gray-700">Nama Kecamatan:</label>
                                <select name="id_kecamatan" id="id_kecamatan" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                    <option value="{{ $dataKelurahan->id_kecamatan }}" selected>{{ $dataKelurahan->kecamatan->nama_kecamatan }}</option>
                                    @foreach ($kec as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <label class="inline-flex items-center mb-5 cursor-pointer">
                                    <input type="checkbox" value="1" name="active" class="sr-only peer" {{ $dataKelurahan->active == 1 ?'checked' : '' }}>
                                    <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                            <a href="{{ route('kelurahan') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Back</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    {{-- update data --}}
</x-layout>