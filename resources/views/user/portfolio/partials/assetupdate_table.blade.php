<div id="updateAssetTable" style="display: none;">
    <h5 class="text-underline bold mt-2"> Update Records </h5>
    <form action="{{route('portfolio.update.records', $asset->id)}}" method="POST" >
        @csrf
        <input type="hidden" name="jaznjsxnjszbnjcknjkxnjkxncskniujkns" id="jahbnkmnbjlikvhjcvhjfcghv">
        <div id="update_record_table">
            <table class="table table-striped table-asset table-bordered wd-f" >
                <tr style="background: #E6C069;">
                    <th style="width: 25%;">Update Period </th>
                    <th class="text-center bold"><span id="updatePeriod"> {{  date('F') }} {{  date('Y') }} </span>
                        <span class="pull-right">
                            <input type="month" class="form-control" max="<?php echo date("Y-m"); ?>" name="record_period" id="record_period" style="display: none; height:28px;">
                            <button type="button" class="bg-none br-none fa fa-chevron-down" id="toggle_record" onclick="toggleRecord()"></button>
                            <button type="button" class="bg-none br-none fa fa-search" id="confirm_record" style="display: none;"></button>
                        </span>
                    </th>
                </tr>
                <tr>
                    <td>Asset</td>
                    <td>
                        <div class="price-wrap d-flex">
                            <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                            <input type="number" required  step="0.01"  onfocus="focalPoint(this)"  min="0" max="10000000000" value="{{$asset->asset_value}}" name="amount" id="amount"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Revenue</td>
                    <td>
                        <div class="price-wrap d-flex">
                            <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                            <input type="number" required  step="0.01"  onfocus="focalPoint(this)"  min="0" max="10000000000" value="" name="revenue" id="revenue"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="2" class="bold text-center">Expenditure</th>
                </tr>
                <tr>
                    <td>Management Fees</td>
                    <td>
                        <div class="price-wrap d-flex">
                            <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                            <input type="number" required  step="0.01"  onfocus="focalPoint(this)"  min="0" max="10000000000" value="" name="management" id="management"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Taxes</td>
                    <td>
                        <div class="price-wrap d-flex">
                            <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                            <input type="number" required  step="0.01"  onfocus="focalPoint(this)"  min="0" max="10000000000" value="" name="taxes" id="taxes"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Maintenance Cost</td>
                    <td>
                        <div class="price-wrap d-flex">
                            <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                            <input type="number" required  step="0.01"  onfocus="focalPoint(this)"  min="0" max="10000000000" value="" name="maintenance" id="maintenance"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Other Cost</td>
                    <td>
                        <div class="price-wrap d-flex">
                            <label for="" class="price-currency mt-2">{{ $asset_currency }}</label>
                            <input type="number" required  step="0.01"  onfocus="focalPoint(this)"  min="0" max="10000000000" value="" name="others" id="others"  class="input-money bs-none bg-light wd-7 sm-wdf form-control b-rad-10 mx-0">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Maintenance Details </td>
                    <td>
                        <textarea name="maintenance_details" id="maintenance_details" placeholder="Answer " id="" cols="30" rows="3" class="noresize form-control b-rad-10 bg-light"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Other Notes </td>
                    <td>
                        <textarea name="note" id="note"  placeholder="Answer " id="" cols="30" rows="3" class="noresize form-control b-rad-10 bg-light"></textarea>
                    </td>
                </tr>
            </table>
            <div class="mt-2 mb-4 sm-center">
                <button type="button"  class="btn btn-table mt-2 mr-3 sm-mr-2 px-2 sm-btn-block" onclick="backDetail()">Back</button>
                <button type="button" id="review_now" class="btn btn-table mt-2 mr-3 sm-mr-2 px-2 sm-btn-block">Review</button>
            </div>
        </div>

        <div id="review_record_table" style="display: none;">
            <table class="table table-striped table-asset table-bordered wd-f">
                <tr style="background: #E6C069;">
                    <th class="text-center" colspan="2">UPDATE SUMMARY
                    </th>
                </tr>
                <tr >
                    <th style="width: 30%" class="bold">
                        Update Period
                    </th>
                    <th class="bold">  <span id="updatePeriodReview"></span></th>
                </tr>
                <tr>
                    <td>Asset Value this period</td>
                    <td>{{ $asset_currency }}<span id="asset_value_review"></span></td>
                </tr>
                <tr>
                    <td>Revenue this period</td>
                    <td>{{ $asset_currency }}<span id="asset_revenue_review"></span></td>
                </tr>
                <tr>
                    <td>Expenditure this period</td>
                    <td>{{ $asset_currency }}<span id="asset_expenditure_review"></span></td>
                </tr>
                <tr >
                    <th class="bold"> Net Income </th>
                    <th class="bold">  {{ $asset_currency }}<span id="asset_income_review"></span></th>
                </tr>

                <tr>
                    <td>Maintenance Details </td>
                    <td>  <span id="asset_maintenance_review"></span>  </td>
                </tr>
                <tr>
                    <td>Other Notes </td>
                    <td>  <span id="asset_note_review"></span> </td>
                </tr>
            </table>
            <div class="mt-2 mb-4 sm-center">
                <button type="button"  class="btn btn-table mt-2 mr-3 sm-mr-2 px-2 sm-btn-block" id="back_update">Back</button>
                <button type="submit"  class="btn btn-table mt-2 mr-3 sm-mr-2 px-2 sm-btn-block">Submit Update</button>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="confirmUpdateRecordAddition" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New Update Record</h5>
            <button type="button" class="close" onclick="$('#confirmUpdateRecordAddition').modal('hide')"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center"> The Period <span class="bold" id="period_dialog"></span> records does not exist. </h5>
                <h5 class="text-center">Are you sure you want to add this period?</h5>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAddPeriod"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right">
                    <button type="button" onclick="$('#confirmUpdateRecordAddition').modal('hide')" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#review_now').click(function(){
            if($('#management').val() && $('#taxes').val() && $('#others').val() &&  $('#amount').val()
                   && $('#maintenance').val() && $('#revenue').val()){
                var expenditure = parseInt(parseInt($('#management').val()) + parseInt($('#taxes').val()) +
                                    parseInt($('#others').val()) + parseInt($('#maintenance').val()) );

                $('#update_record_table').hide();
                $('#review_record_table').fadeIn();
                $('#updatePeriodReview').text($('#updatePeriod').text()) ;
                $('#asset_value_review').text($('#amount').val()) ;
                $('#asset_revenue_review').text($('#revenue').val()) ;

                $('#asset_expenditure_review').text(expenditure) ;
                $('#asset_income_review').text(+$('#revenue').val() - +expenditure ) ;

                $('#asset_maintenance_review').text($('#maintenance_details').val()) ;
                $('#asset_note_review').text($('#note').val()) ;
            }else{
                $(document).ready(function(){
                    swal("", "All fields are mandatory. Enter zero if no information is available", "error");
                });

            }

        });

        $('#back_update').click(function(){
            $('#update_record_table').fadeIn();
            $('#review_record_table').hide();
        });

        $('#record_period').change(function(){
            var period = $('#record_period').val();
            if(period){
                let period_format = new Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(period))
                                        +' ' + new Intl.DateTimeFormat('en', { year: 'numeric' }).format(new Date(period));
                // console.log(period);
                $('#period_dialog').text(period_format);

                var header = "ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn";
                var current = "addperiod_ajhbxsjnbjsxbnoaklmsikn";
                $.ajax({
                    method: 'GET',
                    url: "<?php echo Request::url() ?>"+`?header=${header}&access=${current}&period=${period}`,
                    success: function (data, status) {
                        if(status == "success" && data.asset_records){
                            loadRecordInfo(data);
                        }else{
                            $('#confirmUpdateRecordAddition').modal('show');
                        }
                    }
                });
            }
        });

        $('#confirmAddPeriod').click(function(){

            var period = $('#record_period').val();
            var header = "ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn";
            var current = "addnewperiodadd_ajhbxsjbhnsjhbjbnsxjk";
            $.ajax({
                method: 'GET',
                url: "<?php echo Request::url() ?>"+`?header=${header}&access=${current}&period=${period}`,
                success: function (data, status) {
                    if(status == "success" && data.asset_records){
                        // console.log('Load Record');
                       loadRecordInfo(data);
                    }
                }
            });
        });
    });
    function loadRecordInfo(data){
        var period = $('#record_period').val();
        let period_format = new Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(period))
                                        +' ' + new Intl.DateTimeFormat('en', { year: 'numeric' }).format(new Date(period));
        $('#updatePeriod').text(period_format);
        // console.log(period_format);
        // $('#updatePeriod').text(period);
        $('#jahbnkmnbjlikvhjcvhjfcghv').val(period);
        this.asset_records = data.asset_records;
        $('#amount').val(this.asset_records?.amount);
        $('#revenue').val(this.asset_records?.revenue);
        $('#management').val(this.asset_records?.management);
        $('#taxes').val(this.asset_records?.taxes);
        $('#others').val(this.asset_records?.others);
        $('#maintenance').val(this.asset_records?.maintenance);
        $('#maintenance_details').val(this.asset_records?.maintenance_details);
        $('#note').val(this.asset_records?.note);
        $('#confirmUpdateRecordAddition').modal('hide');
    }
    let edit;
    function toggleRecord(){
        $('#record_period').fadeIn();
        $('#toggle_record').hide();
        // $('#confirm_record').fadeIn();
        // return document.getElementById('record_period').click();
    }
</script>



<!-- <link href="http://jondmiles.com/bootstrap-datepaginator/css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css">
<link href="http://jondmiles.com/bootstrap-datepaginator/css/bootstrap-datepicker.css" rel="stylesheet" media="screen" type="text/css">
<link href="http://jondmiles.com/bootstrap-datepaginator/css/bootstrap-datepaginator.min.css" rel="stylesheet" media="screen" type="text/css">

<script type="text/javascript" src="http://jondmiles.com/bootstrap-datepaginator/js/moment.min.js"></script>
<script type="text/javascript" src="http://jondmiles.com/bootstrap-datepaginator/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="http://jondmiles.com/bootstrap-datepaginator/js/bootstrap-datepaginator.min.js"></script> -->
