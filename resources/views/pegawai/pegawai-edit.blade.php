<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- update data --}}
        <div class="flex justify-center items-center">
            <div class="bg-white w-[600px] p-8 rounded-md">
                <div class=" mb-6">

                    <form action="{{ route('pegawai.update', ['id' => $dataPegawai->id ]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="flex flex-col gap-4">
                            <div>
                                <label for="nama_pegawai" class="block text-sm font-medium text-gray-700">Nama Pegawai:</label>
                                <input type="text" value="{{ $dataPegawai->nama_pegawai }}" name="nama_pegawai" id="nama_pegawai" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir:</label>
                                <input type="text" value="{{ $dataPegawai->tempat_lahir }}" name="tempat_lahir" id="tempat_lahir" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir:</label>
                                <input type="text" value="{{ $dataPegawai->tgl_lahir }}" name="tgl_lahir" id="tgl_lahir" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin:</label>
                                <input type="text" value="{{ $dataPegawai->jenis_kelamin }}" name="jenis_kelamin" id="jenis_kelamin" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="agama" class="block text-sm font-medium text-gray-700">Agama:</label>
                                <input type="text" value="{{ $dataPegawai->agama }}" name="agama" id="agama" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
                                <input type="text" value="{{ $dataPegawai->alamat }}" name="alamat" id="alamat" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label for="id_kelurahan" class="block text-sm font-medium text-gray-700">Nama Kelurahan :</label>
                                <select name="id_kelurahan" id="id_kelurahan" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                    <option value="{{ $dataPegawai->id_kelurahan }}" selected>{{ $dataPegawai->kelurahan->nama_kelurahan }}</option>
                                    @foreach ($kel as $kelurahan)
                                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama_kelurahan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="id_kecamatan" class="block text-sm font-medium text-gray-700">Nama Kecamatan:</label>
                                <select name="id_kecamatan" id="id_kecamatan" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                    <option value="{{ $dataPegawai->id_kecamatan }}" selected>{{ $dataPegawai->kecamatan->nama_kecamatan }}</option>
                                    @foreach ($kec as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="id_provinsi" class="block text-sm font-medium text-gray-700">Nama Provinsi:</label>
                                <select name="id_provinsi" id="id_provinsi" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                    <option value="{{ $dataPegawai->id_provinsi }}" selected>{{ $dataPegawai->provinsi->nama_provinsi }}</option>
                                    @foreach ($prov as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                            <a href="{{ route('pegawai') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    {{-- update data --}}
</x-layout>