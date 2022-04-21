<div class="grid grid-cols gap-6">
    <div class="col-span-6 sm:col-span-3 md:col-span-2">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>

        <select wire:model="selectedCategory" name="category_id" id="category_id" class="mt-1 flex rounded-md shadow-sm w-full py-2 px-3">
            @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    @if (!is_null($selectedCategory))
    <div class="col-span-6 sm:col-span-3 md:col-span-2">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Sub Category</label>

        <select wire:model="selectedSubCategory" name="sub_category_id" id="sub_category_id" class="mt-1 flex rounded-md w-full py-2 px-3 shadow-sm">
            @foreach ($subCategories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('sub_category_id')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    @endif

    @if (!is_null($selectedSubCategory))
    <div class="col-span-6 sm:col-span-3 md:col-span-2">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Child Category</label>

        <select name="child_category_id" id="child_category_id" class="mt-1 flex rounded-md shadow-sm w-full py-2 px-3">
            @foreach ($childCategories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('child_category_id')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    @endif
</div>
