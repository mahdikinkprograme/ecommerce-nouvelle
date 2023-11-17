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
                      $36,738
                    </td>
                    <td>
                        <select>
                            <option>{{$data['is_item'] == 'no' ? 'no' : 'yes'}}</option>
                            <option>{{$data['is_item'] == 'no' ? 'yes' : 'no'}}</option>
                        </select>
                    </td>
                    <td>
                    <button class='bx bx-trash-alt cart__amount-trash' onclick ="confirm('delete item')"> <a wire:click="deletproduct('{{$data['id']}}')">x</a></button>
                    <button class="button featured__button" ><a href="{{ url('edit-product/'.$data['id']) }}">edit</a></button>
                </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>