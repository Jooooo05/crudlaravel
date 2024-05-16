<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    {{-- table start --}}
        <div class=" mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Kecamatan</h1>
                <button id="showAddForm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Data
                </button>
            </div>
            <table class="min-w-full bg-white">
                <thead class="bg-gray-400 text-white">
                    <tr>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">No</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Nama Pegawai</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Tempat Lahir</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Tgl. Lahir</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Jenis Kelamin</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Agama</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Kelurahan</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Kecamatan</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Provinsi</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($dataPegawai as $pegawai)
                    <tr class="text-center">
                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4">{{ $pegawai->nama_pegawai }}</td>
                        <td class="py-3 px-4">{{ $pegawai->tempat_lahir }}</td>
                        <td class="py-3 px-4">{{ $pegawai->tgl_lahir }}</td>
                        <td class="py-3 px-4">{{ $pegawai->jenis_kelamin }}</td>
                        <td class="py-3 px-4">{{ $pegawai->agama }}</td>
                        <td class="py-3 px-4">{{ $pegawai->alamat }}</td>
                        <td class="py-3 px-4">{{ $pegawai->kelurahan->nama_kelurahan }}</td>
                        <td class="py-3 px-4">{{ $pegawai->kecamatan->nama_kecamatan }}</td>
                        <td class="py-3 px-4">{{ $pegawai->provinsi->nama_provinsi }}</td>
                        <td class="py-3 px-4">
                            <div class="flex justify-center">
                                <a href="{{ route('pegawai.edit', ['id' => $pegawai->id]) }}" class="showFormEditData bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-6">
                                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                    </svg>
                                </a>
                                <form action="{{ route('pegawai.delete', ['id' => $pegawai->id]) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus Pegawai ini?')">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-6">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <!-- More rows can be added dynamically or fetched from a database -->
                </tbody>
            </table>
        </div>
    {{-- table start --}}

    
    {{-- add data --}}
    <div id="addFormContainer" class="hidden">
        <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50">
            <div class="bg-white w-[600px] p-8 rounded-md">
                <form action="{{ route("pegawai.post") }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Group 1: Personal Information -->
                        <div>
                            <label for="nama_pegawai" class="block text-sm font-medium text-gray-700">Nama Pegawai:</label>
                            <input type="text" name="nama_pegawai" id="nama_pegawai" class="input-field">
                        </div>
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir:</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="input-field">
                        </div>
                        <div>
                            <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir:</label>
                            <input type="text" name="tgl_lahir" id="tgl_lahir" class="input-field">
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin:</label>
                            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="input-field">
                        </div>
                        <div>
                            <label for="agama" class="block text-sm font-medium text-gray-700">Agama:</label>
                            <input type="text" name="agama" id="agama" class="input-field">
                        </div>
                        <!-- Group 2: Address Information -->
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
                            <input type="text" name="alamat" id="alamat" class="input-field">
                        </div>
                        <div>
                            <label for="id_kelurahan" class="block text-sm font-medium text-gray-700">Nama Kelurahan :</label>
                            <select name="id_kelurahan" id="id_kelurahan" class="input-field">
                                @foreach ($kel as $kelurahan)
                                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama_kelurahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="id_kecamatan" class="block text-sm font-medium text-gray-700">Nama Kecamatan:</label>
                            <select name="id_kecamatan" id="id_kecamatan" class="input-field">
                                @foreach ($kec as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="id_provinsi" class="block text-sm font-medium text-gray-700">Nama Provinsi:</label>
                            <select name="id_provinsi" id="id_provinsi" class="input-field">
                                @foreach ($prov as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        <button id="hideAddForm" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    {{-- add data --}}
</x-layout>