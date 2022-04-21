<x-app-layout>
    <x-slot name="header">
        @if (session('pesan'))
            <div class="bg-indigo-400 text-gray-200 p-2 rounded-md">{{ session('pesan') }}</div>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('State') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-2 px-2">
        <div class="flex flex-col">
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-end">
                    <a href=" {{ route('states.create') }} " class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">New State</a>
                </div>
            </div>

            <div class="max-w-7xl sm:px-6 lg:px-8">
                <table class="table-auto w-full text-left shadow">
                    <thead class="shadow">
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Slug</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Country Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($states as $state )
                        <tr>
                            <td class="px-4 py-3">
                                <div class="flex items-center">{{ $state->name }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center">{{ $state->slug }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    {{ $state->country->name }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-lg text-gray-900">
                                <a href=" {{route('states.edit', $state->id)}} " class="text-indigo-600">Edit</a>
                                <form action="{{ route('states.destroy', $state->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" href=" {{route('states.destroy', $state->id)}}" class="text-red-600">Delete</button>
                                </form>
                            </td>
                            @empty
                            <td class="m-2 p-2">No State</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $states->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
