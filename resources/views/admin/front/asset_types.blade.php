@extends('layouts.admin')


@section('content')
  <div class="wd-f my-5">
      <div class="card">
          <div class="card-header d-flex">
              <h4 class="col-9">Asset Types</h4>
              <div class="col-3">
                  <button class="btn btn-pry px-2 pull-right" data-toggle="modal" data-target="#assetTypeModal">New</button>
              </div>
          </div>
          <div class="card-body">
            @if (count($asset_types))
              <table class="table table-striped">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th scope="col">Asset Class</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Created</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($asset_types  as $asset)
                    <tr>
                      <td> {{$asset->id}}</td>
                      <td>
                        <span class="text-capitalize">{{$asset->acqusition}}</span>
                      </td>
                      <td>
                        {{$asset->name}}
                      </td>
                      <td>
                        {{$asset->description}}
                      </td>
                      <td>
                        @if($asset->status)
                          <span class="text-success">Active</span>
                        @else
                           <span class="text-danger">InActive</span>
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-sm bg-none px-2" onclick='editAsset("{{$asset->id}}")' >
                          <i class="fa fa-edit"></i>
                        </button>
                      </td>
                      <td>
                        {{ date( 'Y-m-d', strtotime($asset->created_at)) }}
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
              <div class="row mt-2">
                <div class="mx-auto text-center">
                  {{ $asset_types->onEachSide(1)->links() }}
                </div>
              </div>
            @else
                <div class="jumbotron text-center">
                  <h5 class="mt-4"> No Asset Type</h5>
                </div>
            @endif
          </div>
      </div>
  </div>

  <script>
    function editAsset(id){
      var href = window.location.href+'/'+id;
      $.ajax({
        type: 'GET',
        url: href,
        success: function(data, status){
          var asset = data.asset_type;
          // console.log(asset.description);
          if(asset){
            $('#editTypeModal').modal('show');
            $('#acqusition').val(asset.acqusition);
            $('#asset_name').val(asset.name);
            $('#description').val(asset.description);
            $('#status').prop('checked', asset.status);
            $('#update_asset').attr('action',  href);
          }
        }
      });

    }
  </script>

  <div class="modal fade" id="assetTypeModal" tabindex="-1" role="dialog" aria-labelledby="assetTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialoged-center" role="document">
        <div class="modal-content wd-c sm-wd-c">
            <div class="modal-header">
              <h5 class="modal-title" id="assetTypeModalLabel">Create New Asset Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('store.asset_type') }}" class="my-3" method="POST">
                @csrf
                <div class="form-group">
                    <label for="" class="bold">Asset Class</label>
                    <select name="asset_class" id="" required class="form-control">
                        <option value="business">Business Asset</option>
                        <option value="risk">Risk Asset</option>
                        <option value="appreciating">Appreciating Asset</option>
                        <option value="intellectual">Intellectual Asset</option>
                        <option value="depreciating">Depreciating Asset</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="bold">Asset Type Name</label>
                    <input type="text" class="form-control" name="asset_name" required min="3" value="">
                </div>
                <div class="form-group">
                    <label for="" class="bold">Asset Type Description</label>
                    <textarea class="form-control" name="description" id="" rows="4"> </textarea>
                </div>

                <div class="form-group ">
                    <div class="float-right my-3">
                        <button type="submit" class="btn btn-pry px-3" >Save</button>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>


  <div class="modal fade" id="editTypeModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialoged-center" role="document">
        <div class="modal-content wd-c sm-wd-c">
            <div class="modal-header">
              <h5 class="modal-title" id="editTypeModalLabel">Update Asset Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- action="{{ route('update.asset_type', 0) }}" -->
              <form id="update_asset" class="my-3" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Asset Class</label>
                    <select name="acqusition" id="acqusition" required class="form-control">
                        <option value="business">Business Asset</option>
                        <option value="risk">Risk Asset</option>
                        <option value="appreciating">Appreciating Asset</option>
                        <option value="intellectual">Intellectual Asset</option>
                        <option value="depreciating">Depreciating Asset</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="bold">Asset Type Name</label>
                    <input type="text" id="asset_name" class="form-control" name="asset_name" required min="3" value="">
                </div>
                <div class="form-group">
                    <label for="" class="bold">Asset Type Description</label>
                    <textarea class="form-control" id="description" name="description" id="" rows="4"> </textarea>
                </div>
                <div>
                   <label for="" class="bold">Asset Status</label>
                   <div class=" switch text-left">
                      <input class="" id="status" name="status" type="checkbox" />
                      <label data-off="OFF" data-on="ON" for="status" ></label>
                  </div>
                </div>

                <div class="form-group ">
                    <div class="float-right my-3">
                        <button type="submit" class="btn btn-pry px-3">Update</button>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>

@endsection
