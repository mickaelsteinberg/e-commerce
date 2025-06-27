<div class="mb-3">
    <label for="name" class="form-label">Nom</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Prix (€)</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Catégorie</label>
    <select name="category_id" class="form-select">
        <option value="">-- Choisir une catégorie --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
</div>


<div class="mb-3">
    <label for="image" class="form-label">Image du produit</label>
    <input type="file" class="form-control" id="image" name="image">
    @if(isset($product) && $product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 150px;">
    @endif
</div>

<div class="mb-3">
    <label for="image" class="form-label">CV</label>
    <input type="file" name="cv" class="form-control">
</div>

