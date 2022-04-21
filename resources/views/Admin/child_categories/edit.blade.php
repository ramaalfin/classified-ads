<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit child category
        </h2>
    </x-slot>

    <div class="container mx-auto py-2 px-2">
        <div class="flex flex-col">
            <div class="max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-end">
                    <a href=" {{ route('child_categories.index') }} " class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">Back</a>
                </div>
            </div>

            <div class="max-w-7xl sm:px-6 lg:px-8">
                <form action=" {{ route('child_categories.update', $child_category->id) }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" autocomplete="given-name" value="{{ $child_category->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="sub_category_id" class="block text-sm font-medium text-gray-700">Category</label>

                            <select name="sub_category_id" id="sub_category_id" class="mt-1 flex rounded-md shadow-sm">
                                @foreach (App\Models\SubCategories::all() as $sub_category )
                                    <option value="{{ $sub_category->id }}" {{ $sub_category->id == $child_category->sub_category_id ? 'selected' : '' }}>{{ $sub_category->name }}</option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                          <label class="block text-sm font-medium text-gray-700"> Image </label>
                          <div class="w-full m-2 p-2">
                              <img src="{{ Storage::url($child_category->image) }}" alt="image" class="h-24 w-24">
                          </div>
                          <input type="file" id="image" name="image">
                          @error('image')
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
