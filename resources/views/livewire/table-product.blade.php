<?php
use App\Models\multiimg;
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    price
                  </th>
                  <th>
                  description
                  </th>
                  <th>
                    image
                  </th>
                  <th>
                    multiimage
                  </th>
                  <th>
                    is-item
                  </th>
                  <th>
                    delete
                  </th>
                </thead>
                <tbody>
                    @foreach($datavalue as  $data) 
                    <?php
                         $multiimg = multiimg::where('multiid',$data['prod_uniqid'])->get();
                     ?>
                  <tr>
                  <td>
                        {{$data['id']}}
                    </td>
                    <td>
                      {{$data['name']}}
                    </td>
                    <td>
                      {{$data['price']}}$
                    </td>
                    <td>
                      {!!$data['description']!!}
                    </td>
                    
                    <td>
                    <img src="{{asset('app/files/files')}}/{{$data['image']}}" style="width: 30px;" alt="" class="cart__img">
                    </td>
                    <td> 
                    @foreach($multiimg as  $datas) 
                    <button class='bx bx-trash-alt cart__amount-trash' onclick ="confirm('delete item')"> <a wire:click="deletmultiimg('{{$datas['id']}}')">x</a></button>
                    <img src="{{asset('app/files/photos')}}/{{$datas['multiimg']}}" style="width: 30px;" alt="" class="cart__img">
                    @endforeach
                    </td>
                    <td>
                        <select>
                        <option value="{{$data['is_item']}}">{{$data['is_item'] == 'no' ? 'no' : 'yes'}}</option>
                        <option value="{{$data['is_item']}}">{{$data['is_item'] == 'no' ? 'yes' : 'no'}}</option>
                        </select>
                    </td>
                    <td>
                    <button class='bx bx-trash-alt cart__amount-trash' onclick ="confirm('delete item')"> <a wire:click="deletproduct('{{$data['id']}}')">x</a></button>
                    <button class="button featured__button" ><a href="{{ url('edit-product/'.$data['id']) }}">edit</a></button>
                </td>
                  </tr>
                  @endforeach


                  @foreach($is_item as  $is_item)
                  <tr>
                  <td>
                        {{$is_item['id']}}
                    </td>
                    <td>
                      {{$is_item['name']}}
                    </td>
                    <td>
                      {{$is_item['price']}}$
                    </td>
                    <td>
                      {!!$is_item['description']!!}
                    </td>
                    <td>
                    <img src="{{asset('app/files/files')}}/{{$is_item['image']}}" style="width: 30px;" alt="" class="cart__img">
                    </td>
                    <td>

                    </td>
                    <td>
                        <select>
                        <option value="{{$is_item['is_item']}}">{{$is_item['is_item'] == 'no' ? 'no' : 'yes'}}</option>
                        <option value="{{$is_item['is_item']}}">{{$is_item['is_item'] == 'no' ? 'yes' : 'no'}}</option>
                        </select>
                    </td>
                    <td>
                    <button class='bx bx-trash-alt cart__amount-trash' onclick ="confirm('delete item')"> <a wire:click="deletproduct('{{$is_item['id']}}')">x</a></button>
                    <button class="button featured__button" ><a href="{{ url('edit-product/'.$is_item['id']) }}">edit</a></button>
                </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>