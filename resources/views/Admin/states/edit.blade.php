<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit State
        </h2>
    </x-slot>

    <div class="container mx-auto py-2 px-2">
        <div class="flex flex-col">
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-end">
                    <a href=" {{ route('states.index') }} " class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">Back</a>
                </div>
            </div>

            <div class="max-w-7xl sm:px-6 lg:px-8">
                <form action=" {{ route('states.update', $state->id) }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" autocomplete="given-name" value="{{ $state->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="country_id" class="block text-sm font-medium text-gray-700">Country Name</label>

                            <select name="country_id" id="country_id">
                                @foreach ($countries as $country )
                                    <option value="{{ $country->id }}" {{ $country->id == $state->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
