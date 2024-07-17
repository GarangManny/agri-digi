<x-post_job_1-card>
    @include('partials.search')

    <a href="/supplierDashboard" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="max-w-lg mx-auto">
        <x-card>
            <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="text-center">
                    <img
                        id="logo"
                        class="w-32 h-32 object-cover rounded-full mx-auto mb-4"
                        src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                        alt="Logo"
                    />
                    <input type="file" name="logo" class="block my-2 mx-auto">

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" value="{{ $listing->title }}" class="bg-white text-black border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="company" class="block text-gray-700 text-sm font-bold mb-2">Company</label>
                        <input type="text" name="company" value="{{ $listing->company }}" class="bg-white text-black border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="text" name="price" value="{{ $listing->price }}" class="bg-white text-black border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                        <input type="text" name="location" value="{{ $listing->location }}" class="bg-white text-black border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Product Description</label>
                        <textarea name="description" class="bg-white text-black border border-gray-300 rounded p-2 w-full">{{ $listing->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="text" name="email" value="{{ $listing->email }}" class="bg-white text-black border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="website" class="block text-gray-700 text-sm font-bold mb-2">Website</label>
                        <input type="text" name="website" value="{{ $listing->website }}" class="bg-white text-black border border-gray-300 rounded p-2 w-full">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-300 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Listing
                        </button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</x-post_job_1-card>
