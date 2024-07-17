<x-blank-card>
    @include('partials.search')

    <a href="/farmerDashboard" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card>
            <div class="flex flex-col items-center justify-center text-center space-y-6">
                <img
                    id="logo"
                    class="w-48 mb-4 object-cover"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="Product Image"
                />

                <h3 id="product_name" class="text-2xl font-bold mb-2">{{ $listing->title }}</h3>
                <div id="company_name" class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <p id="unit_price" class="text-xl font-bold mb-4">Ksh: {{ $listing->price }}</p>

                <x-listing-tag :tagCSV="$listing->tags"/>

                <div class="text-lg mb-4">
                    <i id="location" class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>

                <form id="cart-form" action="{{ route('addtoCart') }}" method="POST" class="w-full max-w-sm mx-auto">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $listing->id }}">
                    <input type="hidden" name="name" value="{{ $listing->title }}">
                    <input type="hidden" name="unit_price" value="{{ $listing->price }}">
                    <input type="hidden" name="quantity" value="1"> <!-- Default quantity -->
                    <input type="hidden" name="location" value="{{ $listing->location }}">
                    <input type="hidden" name="logo" value="{{ $listing->logo }}">

                    <div class="mb-4 flex items-center justify-between">
                        <label for="quantity" class="inline-block text-lg mb-2">Quantity:</label>
                        <input type="number" class="border border-gray-200 rounded p-2 w-16" name="quantity" value="1" min="1">
                        <button type="submit" class="bg-blue-300 text-black rounded py-2 px-4 ml-4 hover:bg-blue-700">Add to Cart</button>
                    </div>
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </form>

                <div class="border border-gray-200 w-full mb-6"></div>

                <div>
                    <h3 class="text-3xl font-bold mb-4">Product Description</h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->description }}
                        <br>
                        <a href="mailto:{{ $listing->email }}" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-envelope"></i> Contact Employer
                        </a>
                        <a href="{{ $listing->website }}" target="_blank" class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-globe"></i> Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-blank-card>
