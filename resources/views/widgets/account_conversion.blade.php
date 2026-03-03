<div id="conversion_lane" style="display: none;">
    <label class="label">Use this automated conversion rate? </label>
    <div class="form-check d-inline">
        <label class="form-check-label ml-3" for="automatic">
            Yes <input class="form-check-input ml-2" type="radio" disabled name="automated_rate" id="automatic" value="1" checked>
        </label>
        <label class="form-check-label ml-5" for="manual">
            No <input class="form-check-input ml-2" type="radio" disabled name="automated_rate" id="manual" value="0">
        </label> 
    </div>
</div>

<script>
    var user_currency =   <?php echo json_encode($gap_currencies['user_currency']) ?>;
    var manual_currencies =   <?php echo ($gap_currencies['manual_currencies']->currencies) ?>;
    var system_currencies =   <?php echo ($gap_currencies['system_currencies']->currencies) ?>;
  
    // console.log(user_currency);
    $(function(){
        $('input[name="automated_rate"]').change(function () {
            var index = $(this).index();
            var value = $(this).val();
            if(value == 0){
                $('#rate_lane').hide();
                $('#update_exchange').fadeIn();
            }else{
                $('#update_exchange').hide();
                $('#rate_lane').fadeIn();
            }  
        });
    
        $('select[name="currency"]').change(function () {
            var sel_currency = $(this).val(); 
            var cu = sel_currency.split(" ")[1];
            
            var cs = $('input[name="automated_rate"]:checked').val();
             
            var automated_rate =  $('input[name="automated_rate"]');
            if(sel_currency ){
                automated_rate[0].disabled = false;
                automated_rate[1].disabled = false; 
                // console.log(user_currency != sel_currency);
                if(cs == 1 && user_currency != sel_currency){
                    $('#rate_lane').fadeIn();
                    $('#conversion_lane').fadeIn();
                }else{
                    $('#rate_lane').hide(); 
                    $('#conversion_lane').hide();
                }
                $('#abhjabgukahjbukahjbuahjbauzjhbz').val(cu)
                $('#yuabvghbbnbhnghbvhmbvghb').val(manual_currencies[cu]);
                $('#sel_rate').text(system_currencies[cu].toFixed(4));
                $('#sel_currency').text(cu); $('#sel_currency1').text(cu);
            }else{ 
                automated_rate[0].disabled = true;
                automated_rate[1].disabled = true;
                $('#rate_lane').hide();
            }
        });
        $('#submitRateBtn').on('click', function (e){
            e.preventDefault();
            var form = document.getElementById('manualRateForm');
            var automated_rate =  $('input[name="automated_rate"]');
            var fd = new FormData(form);
            
            $.ajax({
                type: 'POST',
                url: "<?php echo route('update.exchange') ?>",
                data: fd,
                processData: false,
                    contentType: false, 
                    success: function(data, status){
                        if(status == "success"){
                            $('#update_exchange').hide();
                            automated_rate[0].disabled = true;
                            automated_rate[1].disabled = true;
                        }
                    },
                    error: function(data, status){
                        // console.log("Error", status, data);
                        $('#error').text(data.responseJSON.errors[0])
                    } 
            })
        });
    });
</script>