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
                    discount
                  </th>
                  <th>
                  description
                  </th>
                  <th>
                    image
                  </th>
                  <th>
                    delete
                  </th>
                </thead>
                <tbody>
                    @foreach($datacategory as  $data) 
                  <tr>
                  <td>
                        {{$data['id']}}
                    </td>
                    <td>
                      {{$data['category_name']}}
                    </td>
                    <td>
                      {{$data['category_discount']}}.00
                    </td>
                    <td>
                      {!!$data['description']!!}
                    </td> 
                    <td>
                    <img src="{{asset('app/files/files')}}/{{$data['category_image']}}" style="width: 30px;" alt="" class="cart__img">
                    </td> 
                    <td>
                    <button class='bx bx-trash-alt cart__amount-trash' onclick ="confirm('delete item')"> <a wire:click="deletcategory('{{$data['id']}}')">x</a></button>
                    <button class="button featured__button" ><a href="{{ url('category-edit/'.$data['id']) }}">edit</a></button>
                </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>