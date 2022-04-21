<x-app-layout>
    <x-slot name="header">
        @if (session('pesan'))
            <div class="bg-indigo-400 text-gray-200 p-2 rounded-md">{{ session('pesan') }}</div>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Child Category') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-2 px-2">
        <div class="flex flex-col">
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-end">
                    <a href=" {{ route('child_categories.create') }} " class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">New Category</a>
                </div>
            </div>

            <div class="max-w-7xl sm:px-6 lg:px-8">
                <table class="table-auto w-full text-left shadow">
                    <thead class="shadow">
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Slug</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Image</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($child_categories as $category )
                        <tr>
                            <td class="px-4 py-3">
                                <div class="flex items-center">{{ $category->name }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center">{{ $category->slug }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    <img class="w-12 h-12" src="{{ Storage::url("$category->image") }}" alt="image" >
                                </div>
                            </td>
                            <td class="px-4 py-3 text-lg text-gray-900">
                                <a href=" {{route('child_categories.edit', $category->id)}} " class="text-indigo-600">Edit</a>
                                <form action="{{ route('child_categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" href=" {{route('child_categories.destroy', $category->id)}}" class="text-red-600">Delete</button>
                                </form>
                            </td>
                            @empty
                            <td class="m-2 p-2">No Child Category</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
