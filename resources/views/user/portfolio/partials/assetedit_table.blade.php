<div id="editAssetTable" style="display: none;">
    <h5 class="text-underline bold mt-2">Edit Asset</h5>
    <form action="{{route('portfolio.update.details', $asset->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-striped table-asset table-bordered wd-f">
            <tr style="background: #E6C069;">
                <th style="width: 25%;">Asset Type </th>
                <th>{{$asset->portfolio_type}}</th>
            </tr>
            <tr>
                <td>Name</td>
                <td> <input type="text" value="{{$asset->name}}" name="asset_name" id="asset_name"  class="form-control b-rad-10 bg-light wd-7 sm-wdf"></td>
            </tr>
            <tr>
                <td>Address / Location</td>
                <td> <input type="text" value="{{$asset->location}}" name="location" id="location" placeholder="Location"  class="form-control b-rad-10 bg-light wd-7 sm-wdf"></td>
            </tr>
            <tr>
                <td>Asset Type</td>
                <td>
                    <!-- <input type="text" value="{{$asset->portfolio_type}}" name="location" id="location" placeholder="Location"  class="form-control b-rad-10 bg-light wd-7 sm-wdf"> -->
                    <select name="portfolio_type" required id="" class="form-control b-rad-10 bg-light wd-7 sm-wdf">
                        <option value="">Asset Type  </option>
                        @foreach ($asset_types as $current)
                            @if($current->name == $asset->portfolio_type)
                                <option value="{{ $current->id }}" selected>{{ $current->name }}</option>
                            @else
                                <option value="{{ $current->id }}">{{ $current->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Currency Conversion mode:</td>
                <td>
                    <div class="form-check d-inline">
                        <label class="form-check-label ml-3" for="automatic">
                            Automated <input class="form-check-input ml-2" type="radio"  name="automated_rate" id="automatic" value="1" {{($asset->automated) ? 'checked': '' }}>
                        </label>
                        <label class="form-check-label ml-5" for="manual">
                            Manual <input class="form-check-input ml-2" type="radio"  name="automated_rate" id="manual" value="0" {{($asset->automated) ? '': 'checked' }}>
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Value</td>
                <td>
                    <div class="price-wrap d-flex ">
                        <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                        <input type="number" step="any" min="0" value="{{$asset->asset_value}}" name="asset_value" id="asset_value"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                    </div>
                </td>
            </tr>
            <!-- <tr>
                <td>Monthly Income</td>
                <td>
                    <div class="price-wrap d-flex">
                        <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                        <input type="number" step="any" min="0" value="{{$asset->monthly_roi}}" name="income" id="income"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                    </div>
                </td>
            </tr> -->
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" required="required" placeholder="Answer (e.g. property address or a fancy name of your choice)" id="" cols="30" rows="3" class="noresize form-control b-rad-10 bg-light">{{$asset->description}}</textarea>
                </td>
            </tr>
            <tr>
                <td>Upload New Documents</td>
                <td>
                    <div class="row">
                        @if (!$documents[7])
                            <div class="col-6 pr-1">
                                <input type="text" name="asset_document_name" placeholder="Document Name" id="" class="form-control b-rad-10 bg-light">
                            </div>
                            <div class="col-6 pr-1">
                                <input type="file" name="asset_document" id="" class="form-control b-rad-10 bg-light">
                            </div>
                        @endif
                    </div>
                </td>
            </tr>
        </table>
        <div class="mt-2 mb-4 sm-center">
            <button type="button"  class="btn btn-table mt-2 mr-3 sm-mr-2 px-2 sm-btn-block" onclick="backDetail()">Back</button>
            <button type="submit"  class="btn btn-table mt-2 mr-3 sm-mr-2 px-2 sm-btn-block">Update Asset Details</button>
        </div>
    </form>
</div>
