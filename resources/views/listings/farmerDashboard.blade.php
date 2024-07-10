<x-blank-card>
    @include('partials.supplier_hero')
    @include('partials.search')

    <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($listings) == 0)
            @foreach ($listings as $listing)
                <x-farmers-card :listing="$listing"/>
            @endforeach
        @else
            <p>No Listing Found</p>
        @endunless
    </div>

    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>
</x-blank-card>
