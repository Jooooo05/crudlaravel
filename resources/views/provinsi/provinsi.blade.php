<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    {{-- table start --}}
        <div class=" mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Provinsi</h1>
                <button id="showAddForm" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Data
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-400 text-white">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">No</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Kode</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Nama Provinsi</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Active</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($data as $provinsi)    
                        <tr class="text-center">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $provinsi->kode }}</td>
                            <td class="py-3 px-4">{{ $provinsi->nama_provinsi }}</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center justify-center">
                                    @if ($provinsi->active == 1)                                
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                                            <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                        </svg>                              
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-500">
                                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex justify-center">
                                    <a href="{{ route('provinsi.edit', ['id' => $provinsi->id]) }}" class="showFormEditData bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('provinsi.delete', ['id' => $provinsi->id]) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                        @csrf
                                        @method('delete')
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
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
        </div>
    {{-- table start --}}

    {{-- add data --}}
        <div id="addFormContainer" class="hidden">
            <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50">
                <div class="bg-white w-[600px] p-8 rounded-md">
                    <div class=" mb-6">
                        <form action="{{ route('provinsi.post') }}" method="POST">
                            @csrf
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label for="kode" class="block text-sm font-medium text-gray-700">Kode:</label>
                                    <input type="text" name="kode" id="kode" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="nama_provinsi" class="block text-sm font-medium text-gray-700">Nama Provinsi:</label>
                                    <input type="text" name="nama_provinsi" id="nama_provinsi" class="mt-1 p-2 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                </div>
                                <div class="">
                                    <label class="inline-flex items-center mb-5 cursor-pointer">
                                        <input type="checkbox" value="1" name="active" class="sr-only peer">
                                        <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                <button id="hideAddForm" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- add data --}}


</x-layout>