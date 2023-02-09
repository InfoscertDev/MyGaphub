
<div class="modal fade" id="editProtectMeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> <span id="provider_policy"></span>  - <span id="protection_category"></span>: Protection 
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                     
                </div>
                <p class="wd-7 mx-auto text-center">(view and edit your details)</p> 
                <form id="" action="{{ route('360.update.protection', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">
                   
                    <div class="my-2">
                        @if(!$archive) 
                            <div class="d-block" style="height: 34px;">
                                <span class="pull-right">
                                    <button type="button" class="btn btn-pry fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                                </span>
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Type of Insurance:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                @php 
                                    $freqs =  ['Monthly', 'Annually'];
                                    $types = ['Direct Debit', 'Debit/Credit Card','Standing Order'];
                                    $protections = ['Whole of Life', 'Term Assurance','Endowment Policy', 'Anuuity Plan', 
                                                    'Comprehensive Cover', 'Gadget/Device Protection', 'Third Party Cover', 'Others'];
                                    $documented = ("<script>(documented)</script>" );
                                    $pay_frequently = ("<script>(pay_frequently)</script>" );
                                    $pay_typed = ("<script>(pay_typed)</script>" ); 
                                    $protection = ("<script>(protection_type)</script>" );

                                    // echo $documented.$faq.$pay_typed.$protection;
                                @endphp
                                {{-- <input type="text" disabled id="protection_type" name="protection_type" required disabled class="form-control b-rad-10"> --}}
                                <select name="protection_type" required disabled id="protection_type"   class="form-control" id="">
                                    <option >-- Select --</option>
                                    @foreach ($protections as $freq)
                                        @if($freq == $protection)
                                            <option value="{{$freq}}" selected>{{$freq}}</option>
                                        @else
                                            <option value="{{ $freq }}">{{ $freq }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Details of Cover:   
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" disabled id="details" name="details" required disabled class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Provider’s Contact: 
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text"  disabled id="provider_contact" name="provider_contact" required disabled class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                            Sum Assured
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number" disabled id="sum_assured" name="sum_assured" required disabled class="form-control b-rad-10">
                            </div>
                        </div> 
                       
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12"> 
                                Policy Premium & Payment Frequency:     
                            </div>
                            <div class="col-md-7 col-sm-12 row">
                                <div class="col-6">
                                    <input type="number" disabled id="premium_pay" name="premium_pay" required disabled class="form-control b-rad-10">
                                </div>
                                <div class="col-6">
                                    <select name="pay_frequently" required disabled id="pay_frequently"  class="form-control">
                                        <option >-- Select --</option>
                                        @foreach ($freqs as $freq)
                                            @if($freq == $pay_frequently)
                                                <option value="{{$freq}}" selected>{{$freq}}</option>
                                            @else
                                                <option value="{{ $freq }}">{{ $freq }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Cover Start/End Dates: 
                            </div>
                            <div class="col-md-7 col-sm-12 row">
                                <div class="col-6"> 
                                    <input type="date" name="cover_start" required disabled id="cover_start" class="form-control b-rad-10">
                                </div>
                                <div class="col-6"> <input type="date" name="cover_end" required disabled id="cover_end" class="form-control b-rad-10"></div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Payment Type:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <select name="pay_typed" required disabled id="pay_typed"   class="form-control" id="">
                                    <option >-- Select --</option>
                                    @foreach ($types as $freq)
                                        @if($freq == $pay_typed)
                                            <option value="{{$freq}}" selected>{{$freq}}</option>
                                        @else
                                            <option value="{{ $freq }}">{{ $freq }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                            Document Vault:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <a href="" target="_blank" id="view_document" class="text-dark"> <span class="text-center text-underline">View Document</span></a>
                            </div>
                        </div> 
                        <div class="form-group row"> 
                            <div class="col-md-6 col-sm-12">
                                {{-- <small class="text-center">Fields are mandatory</small> --}}
                            </div>
                            <div class="text-center col-md-6 col-sm-12">
                                <button type="submit" id="update_account" style="display: none" class="btn btn-sm btn-pry px-4">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <div class="text-center">
                    <div id="archiveAccount" class="mb-2">
                        @if($archive)  
                            <button type="button" id="addAccount" class="btn btn-gray px-3 mr-3"> Restore Account</button>
                        @else
                            <button type="button" id="removeAccount" class="btn btn-gray px-3 mr-3"> Remove Account</button>
                        @endif
                    </div>
                </div> 

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmRemoveAccount" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Remove Account</h5>
            <button type="button" class="close" onclick="$('#confirmRemoveAccount').modal('hide');"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to remove this account?</h5>
                <h6 class="text-center">(You will be able to view the account under the Archive section)</h6>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right"> 
                    <button type="button" onclick="$('#confirmRemoveAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmAddAccount" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Add Account</h5>
            <button type="button" class="close" onclick="$('#confirmAddAccount').modal('hide');"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to add this account?</h5>
                <h6 class="text-center">(You will be able to view the account in Protection)</h6>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAccountAdd"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right">  
                    <button type="button" onclick="$('#confirmAddAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="succeesfullyArchived" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header br-non">
                <button type="button" class="close btn btn-sm   text-right" onclick="$('#succeesfullyArchived').modal('hide'); window.location.reload();"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="justArchive" style="display: none;">
                    <h5 class="text-center">The account has been removed</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.protection', ['archive' => 'all']) }}">View in Archive</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.protection') }}">View in Protection</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div> 