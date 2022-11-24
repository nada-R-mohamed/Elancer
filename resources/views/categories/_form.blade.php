<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name',$category->name) }}" id="name" class="form-control">
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" id="description" class="form-control">{{ old('description',$category->description     ) }}</textarea>
    @error('description')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="parent_id">Parent:</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="">No Parent</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" @if ($parent->id == old('parent_id',$category->parent_id)) selected @endif>{{ $parent->name }}</option>
        @endforeach

    </select>
    @error('parent_id')
        <p class="text-danger">{{ $message }}</p>
    @enderror


</div>

<div class="form-group">
    <label for="art_file">Art File:</label>
    <input type="file" name="art_file" id="art_file" class="form-control">
    @error('art_file')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-primary">Save</button>
</div>
