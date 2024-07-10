@props(['listing'])

<x-card>
    <div class="flex w-18">
        <img
            class="hidden w-20 mr-6 md:block"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/login">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tag :tagCSV="$listing->tags"/>
            <div class="text-lg mt-4">
                <a href="/?location={{ $listing->location }}" class="fa-solid fa-location-dot"></a>
                {{ $listing->location }} Ksh: {{ $listing->price }}
            </div>
        </div>
    </div>
</x-card>
