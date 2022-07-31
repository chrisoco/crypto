<div class="form-floating mt-3">
  <select class="form-select" name="sel_ex" id="floatingSelect" aria-label="Floating label select example">
    <option selected>Select ...</option>
    @foreach(App\Models\Exchange::all() as $item)
      <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
  </select>
  <label for="floatingSelect">Select Exchange:</label>
</div>