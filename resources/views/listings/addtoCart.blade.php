<x-blank-card>
    @include('partials.search')

    <a href="/farmerDashboard" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card class="bg-black">
            <div class="flex flex-col items-center justify-center text-center">
                <form id="cart-form" action="{{ route('addtoCart') }}" method="POST" class="d-none">
                    @csrf
                    <img
                        id="logo"
                        class="w-48 mr-6 mb-6"
                        src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png')}}"
                        alt=""
                    />

                    <h3 id="product_name" class="text-2xl mb-2">{{$listing->title}}</h3>
                    <div id="company_name" class="text-xl font-bold mb-4">{{$listing->company}}</div>
                    <p id="unit_price" class="text-xl font-bold mb-4">{{$listing->price}}</p>
                    
                    <x-listing-tag :tagCSV="$listing->tags"/>
                    
                    <div class="text-lg my-4">
                        <i id="location" class="fa-solid fa-location-dot"></i> {{$listing->location}}
                    </div>
                    
                    <input type="hidden" name="product_id" value="{{$listing->id}}">
                    <input type="hidden" name="name" value="{{$listing->title}}">
                    <input type="hidden" name="unit_price" value="{{$listing->price}}">
                    <input type="hidden" name="quantity" value="{{$listing->quantity}}">
                    <input type="hidden" name="location" value="{{$listing->location}}">
                    
                    <div class="mb-6">
                        <label for="quantity" class="inline-block text-lg mb-2">quantity</label>
                        <input type="int" class="border border-gray-100 rounded p-1 w-10" name="quantity" value="{{ old('price') }}" />
                        <button type="submit" class="bg-laravel text-black rounded py-2 px-4 hover:bg-white">Add to Cart</button>
                    </div>
                    @error('quantity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    
                </form>
                
                <div class="border border-gray-200 w-full mb-6"></div>
                
                <div>
                    <h3 class="text-3xl font-bold mb-4">Product Description</h3>
                    <div class="text-lg space-y-6">
                        {{$listing->description}}
                        <br>
                        <a
                            href="mailto:{{$listing->email}}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i> Contact Employer</a>

                        <a
                            href="{{$listing->website}}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit Website</a>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{$listing->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Drop from Cart
            </a>
        </x-card>
    </div>
</x-blank-card>
