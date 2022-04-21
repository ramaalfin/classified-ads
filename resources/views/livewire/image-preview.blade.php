<div>
    <div class="m-2">
        @if ($featuredImage)
        <p>Photo Preview :</p>
        <div class="m-2 p-2 w-24 h-24">
            <img src="{{ $featuredImage->temporaryUrl() }}" alt="">
        </div>
        @endif
        <label class="block text-sm font-medium text-gray-700">featured image</label>
        <input wire:model="featuredImage" type="file" id="featured_image" name="featured_image">
    </div>
    <div class="m-2">
        @if ($imageOne)
        <p>Photo Preview :</p>
        <div class="m-2 p-2 w-24 h-24">
            <img src="{{ $imageOne->temporaryUrl() }}" alt="">
        </div>
        @endif
        <label class="block text-sm font-medium text-gray-700"> Image_one </label>
        <input wire:model="imageOne" type="file" id="image_one" name="image_one">
    </div>
    <div class="m-2">
        @if ($imageTwo)
        <p>Photo Preview :</p>
        <div class="m-2 p-2 w-24 h-24">
            <img src="{{ $imageTwo->temporaryUrl() }}" alt="">
        </div>
        @endif
        <label class="block text-sm font-medium text-gray-700"> Image_two </label>
        <input wire:model="imageTwo" type="file" id="image_two" name="image_two">
    </div>
    <div class="m-2">
        @if ($imageThree)
        <p>Photo Preview :</p>
        <div class="m-2 p-2 w-24 h-24">
            <img src="{{ $imageThree->temporaryUrl() }}" alt="">
        </div>
        @endif
        <label class="block text-sm font-medium text-gray-700"> Image_three </label>
        <input wire:model="imageThree" type="file" id="image_three" name="image_three">
    </div>
</div>
