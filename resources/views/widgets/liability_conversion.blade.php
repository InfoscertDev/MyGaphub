<div class="form-group row" id="lia_conversion_lane" style="display: none">
    <div class="col-md-7 col-sm-12">
        Use this automated conversion rate? <sup class="text-danger">*</sup> <br>
        <span id="lia_rate_lane" > 1 {{explode(" ", $equity_info['gap_currencies']['user_currency'])[1]}} = <span id="lia_sel_rate"></span> <span id="lia_sel_currency1"></span></span>  
    </div>
    <div class="form-check d-inline">
        <label class="form-check-label ml-3" for="automatic">
            Yes <input class="form-check-input ml-2" type="radio" disabled name="lia_automated_rate" id="automatic" value="1" checked>
        </label>
        <label class="form-check-label ml-5" for="manual">
            No <input class="form-check-input ml-2" type="radio" disabled name="lia_automated_rate" id="manual" value="0">
        </label> 
    </div>  
</div>
<div class="form-group row" id="lia_update_exchange" style="display: none;">
    <div class="col-md-7 col-sm-12">
        <label>Enter rate below: 1 {{explode(" ", $equity_info['gap_currencies']['user_currency'])[1]}} = <span id="lsel_currency"></span> </label>
    </div>
    <div class="col-md-5 col-sm-12">
        <div class="form-inline">
            <input type="hidden" form="liabilityRatedForm" value="" id="abhjabgukahjbukahjbuahjbauzjhbzt" name="currency">
            <input type="number" form="liabilityRatedForm" name="rate" id="yuabvghbbnbhnghbvhmbvghbi" step="any" min="0" style="width:120px;" required class="form-control b-rad-10">
            <button type="button" form="liabilityRatedForm" id="liabilityRaterBtn" class="btn btn-sm btn ml-2 px-1 fa fa-save"></button>
        </div>
    </div>
</div>
<script>
    var user_currency =   <?php echo json_encode($equity_info['gap_currencies']['user_currency']) ?>;
    var manual_currencies =   <?php echo ($equity_info['gap_currencies']['manual_currencies']->currencies) ?>;
    var system_currencies =   <?php echo ($equity_info['gap_currencies']['system_currencies']->currencies) ?>;
  
    // console.log(user_currency);
    $(function(){
        $('input[name="lia_automated_rate"]').change(function () {
            var index = $(this).index();
            var value = $(this).val();
            if(value == 0){
                $('#lia_rate_lane').hide();
                $('#lia_update_exchange').fadeIn();
            }else{
                $('#lia_update_exchange').hide();
                $('#lia_rate_lane').fadeIn();
            }  
        });
    
        $('select[name="currency"]').change(function () {
            var lsel_currency = $(this).val(); 
            var cu = lsel_currency.split(" ")[1];
            // console.log(lsel_currency);
            
            var cs = $('input[name="lia_automated_rate"]:checked').val();
             
            var lia_automated_rate =  $('input[name="lia_automated_rate"]');
            if(lsel_currency ){
                lia_automated_rate[0].disabled = false;
                lia_automated_rate[1].disabled = false; 
                if(cs == 1 && user_currency != lsel_currency.split(" ")[0]){
                    $('#lia_conversion_lane').fadeIn();
                }else{
                    // $('#lia_conversion_lane').hide();
                }
                $('#abhjabgukahjbukahjbuahjbauzjhbzt').val(cu)
                $('#yuabvghbbnbhnghbvhmbvghbi').val(manual_currencies[cu]);
                $('#lia_sel_rate').text(system_currencies[cu].toFixed(4));
                $('#lsel_currency').text(cu); $('#lia_sel_currency1').text(cu);
            }else{
                lia_automated_rate[0].disabled = true;
                lia_automated_rate[1].disabled = true;
                $('#lia_rate_lane').hide();
                $('#lia_conversion_lane').hide();
            }
        });
        $('#liabilityRaterBtn').on('click', function (e){
            e.preventDefault();
            var lsel_currency = $(this).val(); 
            var cu = lsel_currency.split(" ")[1];
            var form = document.getElementById('liabilityRatedForm');
            var lia_automated_rate =  $('input[name="lia_automated_rate"]');
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
                            $('#lia_update_exchange').hide();
                            manual_currencies[cu] =  $('#yuabvghbbnbhnghbvhmbvghbi').val();
                            // lia_automated_rate[0].disabled = true;
                            // lia_automated_rate[1].disabled = true;
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