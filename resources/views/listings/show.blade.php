<x-blank-card>
    @include('partials.search')

    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="max-w-lg mx-auto">
        <x-card>
            <div class="flex flex-col items-center justify-center text-center">
                <img
                    class="w-32 h-32 object-cover rounded-full mx-auto mb-4"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="Logo"
                />
                
                <h3 class="text-2xl font-bold mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-2">{{ $listing->company }}</div>
                <x-listing-tag :tagCSV="$listing->tags"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot text-gray-700 mr-2"></i> {{ $listing->location }} - Ksh: {{ $listing->price }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">Product Description</h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->description }}
                        <br>
                        <a
                            href="mailto:{{ $listing->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        >
                            <i class="fa-solid fa-envelope"></i> Contact Employer
                        </a>

                        <a
                            href="{{ $listing->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        >
                            <i class="fa-solid fa-globe"></i> Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 p-2 flex justify-center space-x-6">
            <a href="/listings/{{ $listing->id }}/edit" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>
        </x-card>
    </div>
</x-blank-card>
