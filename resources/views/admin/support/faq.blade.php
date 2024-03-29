@extends('layouts.admin')


@section('content')
  <div class="wd-f my-5">

        <div class="col-12 my-4">
            <span class="mr-3 pb-2" id="goback">
                <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i>  Back</a>
            </span>

            <button class="btn btn-pry px-2 pull-right " data-toggle="modal" data-target="#faqSupportModal">New</button>
        </div>
        <br>
      <div class="card">
          <div class="card-header d-flex">
              <h4 class="col-8">Gaphub FAQ's</h4>

              <div class="col-4">
                <div class="input-group col-12">
                    <input id="searchInput" placeholder="Search..." value="{{ request('search') }}"  class="form-control py-2 border-right-0 border" type="search" >
                    <span class="input-group-append">
                        <a id="searchButton" href="{{ route('faqs.index') }}" onclick="searchFAQ()" class="btn btn-outline-secondary border-left-0 border" type="button">
                                <i class="fa fa-search"></i>
                        </a>
                    </span>
                </div>
            </div>
          </div>
          <div class="card-body">
            @if (count($faqs))
              <table class="table table-striped">
                <thead class="thead-light">
                  <tr>
                    <th><a class="card-link text-underline text-dark" href="{{ route('faqs.index', ['sortColumn' => 'id', 'sortDirection' => 'asc']) }}">
                        S/N
                    </a></th>
                    <th scope="col">
                         <a class="card-link text-underline text-dark" href="{{ route('faqs.index', ['sortColumn' => 'title', 'sortDirection' => 'asc']) }}">Title</a>
                    </th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Created</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($faqs  as $asset)
                    <tr>
                      <td> {{$asset->id}}</td>
                      <td>
                        {{$asset->title}}
                      </td>
                      <td>
                        {{ str_limit($asset->description, 50, '...')}}
                      </td>
                      <td>
                        @if($asset->status)
                          <span class="text-success">Active</span>
                        @else
                           <span class="text-danger">InActive</span>
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-sm bg-none px-2 mr-3" onclick='editFAQ("{{$asset->id}}")' >
                          <i class="fa fa-edit"></i>
                        </button>


                        <button class="btn btn-sm bg-none px-2" onclick='deleteFAQ("{{$asset->id}}")' >
                          <i class="fa fa-trash" style="font-size:16px" ></i>
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
                  {{ $faqs->onEachSide(1)->links() }}
                </div>
              </div>
            @else
                <div class="jumbotron text-center">
                  <h5 class="mt-4"> No FAQ</h5>
                </div>
            @endif
          </div>
      </div>
  </div>
  <!--  -->
    <div class="modal fade" id="confirmDeleteFAQ" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete </h5>
                    <button type="button" class="close" onclick="$('#confirmDeleteFAQ').modal('hide');"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Are you sure you want to delete this FAQ?</h5>
                </div>

                <form id="delete_faq" action="{{ route('seed.delete.record_spent', 3) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <div class="modal-footer justify-content-center">
                        <div class="text-left">
                            <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                        </div>
                        <div class="text-right">
                            <button type="button" onclick="$('#confirmDeleteFAQ').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  <script>
    function editFAQ(id){
        var href = window.location.pathname+'/'+id;
        $.ajax({
            type: 'GET',
            url: href,
            success: function(data, status){
            var asset = data.faq;
            // console.log(asset.description);
                if(asset){
                    $('#editTypeModal').modal('show');
                    $('#title').val(asset.title);
                    $('#description').val(asset.description);
                    $('#status').prop('checked', asset.status);
                    $('#update_faq').attr('action',  href);
                }
            }
        });
    }

    function deleteFAQ(id){
        $('#confirmDeleteFAQ').modal('show');
        var href = window.location.pathname+'/'+id;
        $('#delete_faq').attr('action',  href);
    }

    function searchFAQ(){
        const searchInput = document.getElementById('searchInput');
        const searchTerm = searchInput.value;
        const searchButton = document.getElementById('searchButton');

        // Update the link's href with the search term
        searchButton.href = "{{ route('faqs.index') }}?search=" + encodeURIComponent(searchTerm);
    }

  </script>

  <div class="modal fade" id="faqSupportModal" tabindex="-1" role="dialog" aria-labelledby="faqSupportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialoged-center" role="document">
        <div class="modal-content wd-c sm-wd-c">
            <div class="modal-header">
              <h5 class="modal-title" id="faqSupportModalLabel">Create New FAQ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" class="my-3" method="POST">
                @csrf
                <div class="form-group">
                    <label for="" class="bold">FAQ Title</label>
                    <input type="text" class="form-control" name="title" required min="3" value="">
                </div>
                <div class="form-group">
                    <label for="" class="bold">FAQ Description</label>
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
              <h5 class="modal-title" id="editTypeModalLabel">Update FAQ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- action="{{ route('update.asset_type', 0) }}" -->
              <form id="update_faq" class="my-3" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="" class="bold">FAQ Name</label>
                    <input type="text" id="title" class="form-control" name="title" required min="3" value="">
                </div>
                <div class="form-group">
                    <label for="" class="bold">FAQ Description</label>
                    <textarea class="form-control" id="description" name="description" id="" rows="4"> </textarea>
                </div>
                <div>
                   <label for="" class="bold"> Status</label>
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
