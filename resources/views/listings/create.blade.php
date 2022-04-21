<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Listing') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="overflow-hidden sm:rounded-lg bg-gray-200 m-2 p-2">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action=" {{route('listing.store')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-4 bg-white space-y-6 sm:p-6">
                                @livewire('depended-category')
                                <div class="col-span-6">
                                    <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                                    <input type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">description</label>
                                    <textarea type="text" name="description" id="description" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>

                                <div class="col-span-6">
                                    <label for="price" class="block text-sm font-medium text-gray-700">price</label>
                                    <input type="text" name="price" id="price" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6">
                                    <label for="price_negotiable" class="block text-sm font-medium text-gray-700">price negotiable</label>
                                    <select name="price_negotiable" id="price_negotiable" class="mt-1 flex rounded-md shadow-sm">
                                        <option>Negotiable</option>
                                        <option>Fixed</option>
                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label for="condition" class="block text-sm font-medium text-gray-700">condition</label>
                                    <select name="condition" id="condition" class="mt-1 flex rounded-md shadow-sm">
                                        <option>New</option>
                                        <option>Used</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700"> location </label>
                                    <input type="text" name="location" id="location" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                    <label for="country_id" class="block text-sm font-medium text-gray-700">Country</label>

                                    <select name="country_id" id="country_id" class="mt-1 flex rounded-md shadow-sm w-full py-2 px-3">
                                        @foreach (App\Models\Country::all() as $country )
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                    <label for="state_id" class="block text-sm font-medium text-gray-700">State</label>

                                    <select name="state_id" id="state_id" class="mt-1 flex rounded-md w-full py-2 px-3 shadow-sm">
                                        @foreach (App\Models\State::all() as $state )
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                    <label for="city_id" class="block text-sm font-medium text-gray-700">City</label>

                                    <select name="city_id" id="city_id" class="mt-1 flex rounded-md shadow-sm w-full py-2 px-3">
                                        @foreach (App\Models\City::all() as $city )
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700">phone number</label>
                                    <input type="number" name="phone_number" id="phone_number" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6">
                                    <label for="is_publish" class="block text-sm font-medium text-gray-700">Publish</label>

                                    <select name="is_publish" id="is_publish" class="mt-1 flex rounded-md shadow-sm">
                                        <option value="0">Unpublished</option>
                                        <option value="1">Published</option>
                                    </select>
                                    @error('is_publish')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                @livewire('image-preview')
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
