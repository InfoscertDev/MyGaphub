

<div class="form-group row" id="cu_conversion_lane" style="display: none">
    <div class="col-md-7 col-sm-12">
        Use this automated conversion rate?<sup class="text-danger">*</sup> <br>
        <span id="cu_rate_lane" > 1 {{explode(" ", $equity_info['gap_currencies']['user_currency'])[1]}} = <span id="cu_sel_rate"></span> <span id="cs_sel_currency1"></span></span>  
    </div>
    <div class="form-check d-inline">
        <label class="form-check-label ml-3" for="automatic">
            Yes <input class="form-check-input ml-2" type="radio" disabled name="automated_rate" id="automatic" value="1" checked>
        </label>
        <label class="form-check-label ml-5" for="manual">
            No <input class="form-check-input ml-2" type="radio" disabled name="automated_rate" id="manual" value="0">
        </label> 
    </div>  
</div> 
<div class="form-group row" id="update_exchange" style="display: none;">
    <div class="col-md-7 col-sm-12">
        <label>Enter rate below: 1 {{explode(" ", $equity_info['gap_currencies']['user_currency'])[1]}} = <span id="sel_currency"></span> </label>
    </div>
    <div class="col-md-5 col-sm-12">
        <div class="form-inline">
            <input type="hidden" form="cashRateForm" value="" id="abhjabgukahjbukahjbuahjbauzjhbz" name="currency">
            <input type="number" form="cashRateForm" name="rate" id="yuabvghbbnbhnghbvhmbvghb" step="any" min="0" style="width:120px;" required class="form-control b-rad-10">
            <button type="button" form="cashRateForm" id="cashRateBtn" class="btn btn-sm btn ml-2 px-1 fa fa-save"></button>
        </div>
    </div>
</div>
<script>
    var user_currency =   <?php echo json_encode($equity_info['gap_currencies']['user_currency']) ?>;
    var manual_currencies =   <?php echo ($equity_info['gap_currencies']['manual_currencies']->currencies) ?>;
    var system_currencies =   <?php echo ($equity_info['gap_currencies']['system_currencies']->currencies) ?>;
  
    // console.log(user_currency);
    $(function(){
        $('input[name="automated_rate"]').change(function () {
            var index = $(this).index();
            var value = $(this).val();
            if(value == 0){
                $('#cu_rate_lane').hide();
                $('#update_exchange').fadeIn();   
            }else{
                $('#update_exchange').hide();
                $('#cu_rate_lane').fadeIn();
            }  
        });
    
        $('select[name="currency"]').change(function () {
            var sel_currency = $(this).val(); 
            var cu = sel_currency.split(" ")[1];
            if(user_currency.length > 1){
               user_currency = user_currency.split(" ")[0];
            }
            var cs = $('input[name="automated_rate"]:checked').val();
             
            var automated_rate =  $('input[name="automated_rate"]');
            if(sel_currency){
                automated_rate[0].disabled = false;
                automated_rate[1].disabled = false;
                // console.log('Cash',cs == 1 , user_currency , sel_currency.split(" ")[0])
                if(cs == 1 && user_currency != sel_currency.split(" ")[0]){
                    $('#cu_conversion_lane').fadeIn();
                }else{
                    // $('#cu_conversion_lane').hide();
                }

                $('#abhjabgukahjbukahjbuahjbauzjhbz').val(cu)
                $('#yuabvghbbnbhnghbvhmbvghb').val(manual_currencies[cu]);
                $('#cu_sel_rate').text(system_currencies[cu].toFixed(4));
                $('#sel_currency').text(cu); $('#cs_sel_currency1').text(cu);
            }else{
                automated_rate[0].disabled = true;
                automated_rate[1].disabled = true;
                $('#cu_rate_lane').hide(); 
                $('#cu_conversion_lane').hide();
            }
        });
        $('#cashRateBtn').on('click', function (e){
            e.preventDefault();
            var sel_currency = $(this).val(); 
            var cu = sel_currency.split(" ")[1];
            var form = document.getElementById('cashRateForm');
            var automated_rate =  $('input[name="automated_rate"]');
            var fd = new FormData(form);
            // console.log(fd,form);
            $.ajax({
                type: 'POST',
                url: "<?php echo route('update.exchange') ?>",
                data: fd,
                processData: false,
                    contentType: false, 
                    success: function(data, status){
                        if(status == "success"){
                            $('#update_exchange').hide();
                            manual_currencies[cu] =  $('#yuabvghbbnbhnghbvhmbvghb').val();
                            // automated_rate[0].disabled = true;
                            // automated_rate[1].disabled = true;
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