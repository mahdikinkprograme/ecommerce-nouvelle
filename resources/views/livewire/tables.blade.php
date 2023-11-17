
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>
      </div>
      <form   wire:submit.prevent="formss"   enctype="multipart/form-data"> 
         @csrf
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  length index
                </th>
                <th>
                  width index
                </th>
                <th>
                  length sike
                </th>
                <th class="text-center">
                  length darfe
                </th>
                <th>
                  width sike
                </th>
                <th>
                  width darfe
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="number" style="width:50px" wire:model="lengthsike">
                </td>
                <td>
                <input type="number" style="width:50px" wire:model = 'lengthdarfe' >
                </td>
                <td>
                <input type="number" style="width:50px" wire:model = 'valuesike' >
                </td>
                <td class="text-center">
                <input type="number" style="width:50px" wire:model = 'valuedarfe' >
                </td>
                <td>
                <input type="number" style="width:50px" wire:model = 'widthsike' >
                </td>
                <td>
                <input type="number" style="width:50px" wire:model = 'widthdarfe' >
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
      <input type="submit"  class="btn btn-success"></br>
    </form>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card  card-plain">
      <div class="card-header">
        <h4 class="card-title"> Table on Plain Background</h4>
        <p class="category"> Here is a subtitle for this table</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Country
                </th>
                <th>
                  City
                </th>
                <th class="text-center">
                  Salary
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Dakota Rice
                </td>
                <td>
                  Niger
                </td>
                <td>
                  Oud-Turnhout
                </td>
                <td class="text-center">
                  $36,738
                </td>
              </tr>
              <tr>
                <td>
                  Minerva Hooper
                </td>
                <td>
                  Curaçao
                </td>
                <td>
                  Sinaai-Waas
                </td>
                <td class="text-center">
                  $23,789
                </td>
              </tr>
              <tr>
                <td>
                  Sage Rodriguez
                </td>
                <td>
                  Netherlands
                </td>
                <td>
                  Baileux
                </td>
                <td class="text-center">
                  $56,142
                </td>
              </tr>
              <tr>
                <td>
                  Philip Chaney
                </td>
                <td>
                  Korea, South
                </td>
                <td>
                  Overland Park
                </td>
                <td class="text-center">
                  $38,735
                </td>
              </tr>
              <tr>
                <td>
                  Doris Greene
                </td>
                <td>
                  Malawi
                </td>
                <td>
                  Feldkirchen in Kärnten
                </td>
                <td class="text-center">
                  $63,542
                </td>
              </tr>
              <tr>
                <td>
                  Mason Porter
                </td>
                <td>
                  Chile
                </td>
                <td>
                  Gloucester
                </td>
                <td class="text-center">
                  $78,615
                </td>
              </tr>
              <tr>
                <td>
                  Jon Porter
                </td>
                <td>
                  Portugal
                </td>
                <td>
                  Gloucester
                </td>
                <td class="text-center">
                  $98,615
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
