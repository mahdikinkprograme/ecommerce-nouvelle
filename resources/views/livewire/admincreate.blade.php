
<div>
<div class="card container" id="cardmax" style="width:500px">
  <div class="card-header">craete product</div>
  <div class="card-body">
  @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif 
      <form   wire:submit.prevent="forms"   enctype="multipart/form-data"> 
         @csrf
         <div class="form-group">
             <label>Name</label></br>
             @error('name') <span class="error" style="color:red">{{ $message }}</span> @enderror
             <input type="text" wire:model="name" class="form-control"></br>
        </div>
        <div class="form-group">
             <label>price</label></br>
             @error('price') <span class="error" style="color:red">{{ $message }}</span> @enderror
             <input type="text" wire:model="price" class="form-control"></br>
        </div>
        <div wire:ignore class="form-group">
            <label>description</label></br>
            @error('description') <span class="error" style="color:red">{{ $message }}</span> @enderror
            <textarea wire:model="description"  class="min-h-fit h-48 " name="description" id="description"></textarea>
        </div>
        <div class="form-group">
           <input type="date" wire:model="date" class="form-control"></br>
           @error('date') <span class="error" style="color:red">{{ $message }}</span> @enderror
        </div>   
        <div class="form-group">
           <label class="form-label" for="inputImage">Image:</label>
           @error('image') <span class="error" style="color:red">{{ $message }}</span> @enderror 
           <input type="file"   wire:model="image" name="image">
           @if($image)
           <img src="{{$image->temporaryUrl()}}" style="width: 30px;">
           @endif
        </div>

        <div class="form-group">
        <label class="form-label">Image Upload</label>
        <input type="file" class="form-control"  name = "multiimg" wire:model="multiimg" multiple>
        </div>
       
        <div class="form-group">
           <label for="is_item">item</label> 
           <input type="checkbox" wire:model = "is_item" value="yes">
        </div>
        <input type="submit"  class="btn btn-success"></br>
    </form>
  </div>

  
</div>
</div>



