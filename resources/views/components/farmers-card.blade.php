@props(['listing'])

<x-card>
    <div class="flex items-center">
        <img
            class="hidden w-20 h-20 mr-6 md:block object-cover "
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl font-bold mb-2">
                <a href="/farmerDashboard/{{ $listing->id }}" class="text-black hover:underline">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-2">{{ $listing->company }}</div>
            <x-listing-tag :tagCSV="$listing->tags"/>
            <div class="text-lg mt-4">
                <a href="/farmerDashboard/?location={{ $listing->location }}" class="fa-solid fa-location-dot text-gray-700 mr-2"></a>
                {{ $listing->location }} - Ksh: {{ $listing->price }}
            </div>
        </div>
    </div>
</x-card>