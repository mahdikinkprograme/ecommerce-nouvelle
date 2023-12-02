<?php
use App\Models\multiimg;
use App\Models\product;
?>
<div>
<div class="card container" id="cardmax" style="width:500px">
  <div class="card-header">edite product</div>
  <div class="card-body">
  @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif 
  @foreach(array($student) as $data)
      <form   wire:submit.prevent="updateproduct('{{$data['id']}}')"   enctype="multipart/form-data"> 
         @csrf
         <div class="form-group">
             <label>Name</label></br>
             @error('name') <span class="error" style="color:red">{{ $message }}</span> @enderror
             <input type="text" value="{{$data['name']}}" wire:model="name" class="form-control"></br>
        </div>
        <div class="form-group">
             <label>price</label></br>
             @error('price') <span class="error" style="color:red">{{ $message }}</span> @enderror
             <input type="text" value="{{$data['price']}}" wire:model="price" class="form-control"></br>
        </div>
        <div class="form-group">
            <label>description</label></br>
            @error('description') <span class="error" style="color:red">{{ $message }}</span> @enderror
            <input type="text" value="{{$data['description']}}" wire:model="description" id="description" class="form-control"></br>
        </div>
        <div class="form-group">
           <input type="date" wire:model="date" class="form-control"></br>
           @error('date') <span class="error" style="color:red">{{ $message }}</span> @enderror
        </div>   
        <div class="form-group">
           <label class="form-label" for="inputImage">Image:</label>
           @error('image') <span class="error" style="color:red">{{ $message }}</span> @enderror 
           <input type="file" value="{{$data['image']}}" wire:model="image" name="image">
           @if($image)
           <img src="{{$image->temporaryUrl()}}" style="width: 30px;">
           @else
           <img src="{{asset('app/files/files')}}/{{$data['image']}}" style="width: 30px;" alt="" class="cart__img">
           @endif
        </div>
        
        <div class="form-group">
           <label class="form-label" for="inputImage">multi Image:</label>
           <input type="file" wire:model="multiimg"   multiple>
        </div>
      
        <div class="form-group">
           <label for="is_item">item</label>
           <input type="checkbox" wire:model = "is_item"  value="{{$data['is_item']}}">
        </div>
        <input type="submit"  class="btn btn-success"></br>
    </form>
    @endforeach
  </div>
  
</div>
</div>


