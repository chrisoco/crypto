<div class="form-floating mt-3">
  <select class="form-select @if($errors->any()) @error('sel_ex_id') is-invalid @else is-valid @enderror @endif" name="sel_ex_id" id="floatingSelect" aria-label="Floating label select example">
    <option selected value="0">Select ...</option>
    @foreach(App\Models\Exchange::all() as $item)
      <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
  </select>
  <label for="floatingSelect">Select Exchange:</label>
  @error('sel_ex_id')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>