

<div class="form-group row" id="inc_conversion_lane" style="display: none">
    <div class="col-md-7 col-sm-12">
        Use this automated conversion rate: <sup class="text-danger">*</sup> <br>
        <span id="rate_lane" > 1 {{explode(" ", $equity_info['gap_currencies']['user_currency'])[1]}} = <span id="sel_rate"></span> <span id="sel_currency1"></span></span>  
    </div>
    <div class="form-check d-inline">
        <label class="form-check-label ml-3" for="automatic">
            Yes <input class="form-check-input ml-2" type="radio" name="inc_automated_rate" id="automatic" value="1" checked>
        </label>
        <label class="form-check-label ml-5" for="manual">
            No <input class="form-check-input ml-2" type="radio" name="inc_automated_rate" id="manual" value="0">
        </label> 
    </div> 
</div>
<div class="form-group row" id="inc_update_exchange" style="display: none;">
    <div class="col-md-7 col-sm-12">
        <label>Enter rate below: 1 {{explode(" ", $equity_info['gap_currencies']['user_currency'])[1]}} = <span id="inc_sel_currency"></span> </label>
    </div>
    <div class="col-md-5 col-sm-12">
        <div class="form-inline">
            <input type="hidden" form="incomeRateForm" value="" id="abhjabgukahjbukahjbuahjbauzjhbzopouq" name="currency">
            <input type="number" form="incomeRateForm" name="rate" id="yuabvghbbnbhnghbvhmbvghbiquwiuwowiqw" step="any" min="0" style="width:120px;" required class="form-control b-rad-10">
            <button type="button" form="incomeRateForm" id="incomeRateBtn" class="btn btn-sm btn ml-2 px-1 fa fa-save"></button>
        </div>
    </div> 
</div> 
<script> 
    var user_currency =   <?php echo json_encode($equity_info['gap_currencies']['user_currency']) ?>;
    var manual_currencies =   <?php echo ($equity_info['gap_currencies']['manual_currencies']->currencies) ?>;
    var system_currencies =   <?php echo ($equity_info['gap_currencies']['system_currencies']->currencies) ?>;
  
    // console.log(user_currency);
    $(function(){
        $('input[name="inc_automated_rate"]').change(function () {
            var index = $(this).index();
            var value = $(this).val();
            if(value == 0){
                $('#rate_lane').hide();
                $('#inc_update_exchange').fadeIn();
            }else{
                $('#inc_update_exchange').hide();
                $('#rate_lane').fadeIn();
            }  
        });
        // select[name="currency"] 
        $('#income_currency').change(function () {
            var inc_sel_currency = $(this).val(); 
            var cu = inc_sel_currency.split(" ")[1];
            var cs = $('input[name="inc_automated_rate"]:checked').val();
            
            var inc_automated_rate =  $('input[name="inc_automated_rate"]');
            if(inc_sel_currency){ 
                inc_automated_rate[0].disabled = false; 
                inc_automated_rate[1].disabled = false;
                if(cs == 1 && user_currency != inc_sel_currency){
                    $('#inc_conversion_lane').fadeIn();
                }else{ 
                    // $('#inc_conversion_lane').hide();
                } 
                $('#abhjabgukahjbukahjbuahjbauzjhbzopouq').val(cu)
                $('#yuabvghbbnbhnghbvhmbvghbiquwiuwowiqw').val(manual_currencies[cu]);
                $('#sel_rate').text(system_currencies[cu].toFixed(4));
                $('#inc_sel_currency').text(cu); $('#inc_sel_currency1').text(cu);
            }else{
                inc_automated_rate[0].disabled = true;
                inc_automated_rate[1].disabled = true;
                $('#rate_lane').hide();
            }
        });
        $('#incomeRateBtn').on('click', function (e){
            e.preventDefault();
            var inc_sel_currency = $(this).val(); 
            var cu = inc_sel_currency.split(" ")[1];
            var form = document.getElementById('incomeRateForm');
            var inc_automated_rate =  $('input[name="inc_automated_rate"]');
            var fd = new FormData(form);
            // console.log(fd,form)
            $.ajax({
                type: 'POST',
                url: "<?php echo route('update.exchange') ?>",
                data: fd,
                processData: false,
                    contentType: false, 
                    success: function(data, status){
                        if(status == "success"){
                            $('#inc_update_exchange').hide();
                            manual_currencies[cu] =  $('#yuabvghbbnbhnghbvhmbvghbiquwiuwowiqw').val();
                            // inc_automated_rate[0].disabled = true;
                            // inc_automated_rate[1].disabled = true;
                        }
                    },
                    error: function(data, status){
                        console.log("Error", status, data);
                        $('#error').text(data.responseJSON.errors[0])
                    } 
            })
        });
    });
</script>