<x-blank-card>
    @include('partials.supplier_hero')
    @include('partials.search')

    <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($orders) == 0)
            @foreach ($orders as $order)
                <x-showCart-card :order="$order"/>
            @endforeach
        @else
            <p>cart is empty</p>
        @endunless
    </div>

    <div class="mt-6 p-4">
        {{ $orders->links() }}
    </div>
</x-blank-card>
