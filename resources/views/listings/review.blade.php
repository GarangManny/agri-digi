<!-- resources/views/reviews/create.blade.php -->
<x-farmers-card>
<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    
    <div class="form-group">
        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="form-control" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>

    <div class="form-group">
        <label for="review">Review</label>
        <textarea name="review" id="review" class="form-control" rows="4" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit Review</button>
</form>

<!-- Display reviews -->
<h3>Reviews</h3>
@foreach($product->reviews as $review)
    <div>
        <strong>{{ $review->user->name }}</strong>
        <span>{{ $review->rating }} stars</span>
        <p>{{ $review->review }}</p>
    </div>
@endforeach
</x-farmers-card>