@props(['order'])

<x-card>
    <div class="flex w-25">
        <img
            class="hidden w-20 mr-6 md:block"
            src="{{ $order->logo ? asset('storage/' . $order->logo) : asset('images/no-image.png') }}"
            alt=""
        />
        <div>
            <div class="text-xl font-bold mb-4">{{ $order->name }}</div>
            <div class="text-lg mt-4">
                Ksh: {{ $order->total_price }}<br>
                Quantity: {{ $order->total_quantity }}
            </div>
            <form action="{{ route('orders.markAsPaid', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Mark as Paid
                </button>
            </form>
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="mt-4 bg-black hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>
        </div>
    </div>
</x-card>
