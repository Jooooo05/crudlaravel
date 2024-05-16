<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- update data --}}
            <div class="flex justify-center items-center">
                <div class="bg-white w-[600px] p-8 rounded-md">
                    <div class=" mb-6">
                        <form action="{{ route('kecamatan.update', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="flex flex-col gap-4 bg-white bg-opacity-50 shadow-lg p-8">
                                <div>
                                    <label for="kode" class="block text-sm font-medium text-gray-700">Kode:</label>
                                    <input value="{{ $data->kode_kec }}" type="text" name="kode_kec" id="kode" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="nama_kecamatan" class="block text-sm font-medium text-gray-700">Nama Provinsi:</label>
                                    <input value="{{ $data->nama_kecamatan }}" type="text" name="nama_kecamatan" id="nama_kecamatan" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                </div>
                                <div class="">
                                    <label class="inline-flex items-center mb-5 cursor-pointer">
                                        <input type="checkbox" value="1" name="active" class="sr-only peer" {{ $data->active == 1 ?'checked' : '' }}>
                                        <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                <a href="{{ route('kecamatan') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
    {{-- update data --}}
</x-layout>