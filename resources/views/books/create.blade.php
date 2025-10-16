<form method="post" action="{{ route('books.store') }}"> 
    @csrf 
    <h3 class="font-bold border-b-gray-300 
                             border-b pb-2 mb-3 mt-4"> 
        Add a new book</h3> 
    <label>Name</label> 
    <input type="text" name="title" id="title" 
                     class="border border-gray-200 p-1"> 
					 <div class="mb-5">
    <label for="book_category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
    <select name="book_category_id" id="book_category_id" class="w-full border p-2">
        <option value="">-- None --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('book_category_id', $book->book_category_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

    <input type="submit" name="send" value="Submit" 
                     class="bg-gray-200 p-1 cursor-pointer 
           border border-black"> 
</form>