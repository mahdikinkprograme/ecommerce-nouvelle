<div>
<div class="card container" id="cardmax" style="width:500px">
  <div class="card-header">craete category</div>
  <div class="card-body">
  @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif 
      <form   wire:submit.prevent="addcategory"   enctype="multipart/form-data"> 
         @csrf
         <div class="form-group">
             <label>Name</label></br>
             @error('category_name') <span class="error" style="color:red">{{ $message }}</span> @enderror
             <input type="text" wire:model="category_name" name="category_name" class="form-control"></br>
        </div>

         <div class="form-group">
             <label>category discount</label></br>
             @error('category_discount') <span class="error" style="color:red">{{ $message }}</span> @enderror
             <input type="text" wire:model="category_discount" class="form-control"></br>
        </div>
        
        <div wire:ignore class="form-group">
            <label>description</label></br>
            @error('description') <span class="error" style="color:red">{{ $message }}</span> @enderror
            <textarea wire:model="description"  class="min-h-fit h-48 " name="description" id="description"></textarea>
        </div>
        
        <div class="form-group">
           <label class="form-label" for="inputImage">Image:</label>
           @error('category_image') <span class="error" style="color:red">{{ $message }}</span> @enderror 
           <input type="file"   wire:model="category_image" name="category_image">
           @if($category_image)
           <img src="{{$category_image->temporaryUrl()}}" style="width: 30px;">
           @endif
        </div>

        <div class="form-group">
             <select wire-model ="parent_id">
                <option value="0"></option>
             </select>
        </div>
        <input type="submit"  class="btn btn-success"></br>
    </form>
  </div>
</div>
</div>
