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
                <a href="/supplierDashboard/{{ $listing->id }}" class="text-black hover:underline">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-2">{{ $listing->company }}</div>
            <x-listing-tag :tagCSV="$listing->tags"/>
            <div class="text-lg mt-4">
                <a href="/?location={{ $listing->location }}" class="fa-solid fa-location-dot text-gray-700 mr-2"></a>
                {{ $listing->location }} - Ksh: {{ $listing->price }}
            </div>
            <div class="mt-4">
                <a href="/listings/{{ $listing->id }}/edit" class="inline-block hover:bg-blue-700 bg-blue-300 text-white font-bold py-1 px-3 rounded-xl">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>
</x-card>