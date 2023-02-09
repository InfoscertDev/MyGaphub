<div class="modal fade" id="equityModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Account: Home Equity         
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                    <p class="wd-7 mx-auto text-center">(Complete the form below to add your home details)</p>
                </div>
                <form action="{{ route('360.store.equity') }}" onsubmit="return equityValidate()" method="post">
                    @csrf
                    <div class="my-2">
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Is there mortgage on this property: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="ismortgage" id="ismortgage" value="" required  class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row" id="avimortgage_lane">
                            <div class="col-md-6 col-sm-12">
                                What is the current mortgage balance: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="mortgage" id="mortgage" value="-1" required  class="form-control" >
                                    <option value="">-- Select --</option>
                                    @foreach ($equity_info['mortgages_available'] as $mortgage)
                                        <option value="{{ $mortgage->id }}">{{ $mortgage->creditor_name }} ({{$mortgage->account_currency}}{{ $mortgage->current_balance }})</option>
                                    @endforeach
                                  </select>
                                  <p><small>Mortgage balance not found from the list?  <a href="{{ route('360.mortgage') }}" class="txt-primary">Add mortgage account now</a></small></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Country Property is located <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="country" id="country" value="" required  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    @foreach ($equity_info['countries'] as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row" id="postal_lane" style="display: none">
                            <div class="col-md-6 col-sm-12">
                                Post Code / Zip Code:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="zip_code"  id="zip_code" maxlength="50" class="form-control b-rad-10">
                                <p class="small mt-1 text-center text-danger" style="display: none" id="zip_error"></p>
                                <p id="search_zip"><small  class="text-center txt-primary">Hit enter to search address</small> </p>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Home Location/Address: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12"> 
                                <textarea style="resize: none" placeholder="123 Downing Street" id="address" type="text" name="location" required cols="3" class="form-control b-rad-10"></textarea>
                               <select name="location" style="display: none" id="select_address" class="form-control b-rad-10"> </select>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12"> 
                                Current market value of your home:<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" required name="market_value" placeholder="" class="input-money bs-none wd-f form-control b-rad-10">
                                </div>
                                <p id="home_market" style="display: none;" class="small mt-2"> Use this link to confirm your property value: 
                                        <a href="#" id="home_market_link" target="_blank" class="txt-primary">Property Value Lookup</a>
                                </p>
                            </div> 
                        </div> 
                        <div class="form-group row mt-5 mb-3">
                            <div class="col-md-6 col-sm-12">
                                <small class="text-center"><sup class="text-danger">*</sup>Fields are mandatory</small>
                            </div>
                            <div class="text-center col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-sm btn-pry px-4">Submit</button>
                            </div>
                            <p style="hidden" style="display-none" id="dumper"></p>
                        </div>
                    </div> 
                </form>
            </div>
        </div> 
    </div>
</div>
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content b-rad-20 bg-portfolio"> 
            <div class="modal-body">
                <div class="d-block wd-f mt-3 my-3"> 
                    <h4 class="text-center ff-rob"> Select an address
                        <button type="button" class="btn btn-sm btn-close  text-right mb-2" onclick="$('#addressModal').modal('hide')" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                        <span class="primary-hr mt-1 mx-auto"></span>
                    </h4>
                </div>
                <ul class="list-group list-group-flush" id="address_group" style="height:500px; overflow-y: auto;">
                    
                </ul>
            </div>
        </div> 
    </div>
</div> 

<script>
    $(function() {
        $('#ismortgage').change(() => {
            var property = $('#ismortgage').val();
            if(property == '1' || property == 1){
                $('#avimortgage_lane').fadeIn();
                $('#avimortgage_lane').fadeIn();
                $('#mortgage').attr('required', 'required');
            }else{ 
                $('#avimortgage_lane').hide();
                $('#mortgage').removeAttr('required');
            }
        });
        $('#country').change(() => {
            var country = $('#country').val();
            if(country == 'United States' || country == 'United States Minor Outlying Islands' || country == 'Canada' || country == 'United Kingdom'){
                $('#postal_lane').fadeIn();  $('#zip_code').attr('required', 'required');
                $('#home_market').fadeIn(); 
                if(country ==  'United States') $('#home_market_link').attr('href', 'https://www.remax.com/home-value-estimates');
                if(country ==  'United States Minor Outlying Islands') $('#home_market_link').attr('href', 'https://www.remax.com/home-value-estimates');
                if(country ==  'Canada') $('#home_market_link').attr('href', 'https://wowa.ca/home-value-estimator');
                if(country ==  'United Kingdom') $('#home_market_link').attr('href', 'https://www.zoopla.co.uk/house-prices/');
            }else{
                $('#postal_lane').hide(); $('#zip_code').removeAttr('required');
                $('#home_market').hide(); 
            }
        });
        $('#zip_code').on('input', ()=> { 
            var zip_code = $('#zip_code').val();
            var val =   valZip();
            if(val){ 
                 $('#zip_error').hide();
                 $('#search_zip').fadeIn();
            }else{
                $('#zip_error').text('Input a correct Post Code/Zip Code');
                $('#zip_error').fadeIn(500);
                $('#search_zip').hide();
                $('#zip_code').attr('required', 'required');
            }
        });
        $('#zip_code').blur(()=> {
            var zip_code =  $('#zip_code').val();
            var country =  $('#country').val(); 
            var val =   valZip();
            if(val){ 
                $('#address_group').empty();
                findAddress(zip_code, country); 
            }
        }); 
        
        function valZip() {
            var zip_code = $('#zip_code').val();
            var country = $('#country').val();
            var GB = /GIR[ ]?0AA|((AB|AL|B|BA|BB|BD|BH|BL|BN|BR|BS|BT|CA|CB|CF|CH|CM|CO|CR|CT|CV|CW|DA|DD|DE|DG|DH|DL|DN|DT|DY|E|EC|EH|EN|EX|FK|FY|G|GL|GY|GU|HA|HD|HG|HP|HR|HS|HU|HX|IG|IM|IP|IV|JE|KA|KT|KW|KY|L|LA|LD|LE|LL|LN|LS|LU|M|ME|MK|ML|N|NE|NG|NN|NP|NR|NW|OL|OX|PA|PE|PH|PL|PO|PR|RG|RH|RM|S|SA|SE|SG|SK|SL|SM|SN|SO|SP|SR|SS|ST|SW|SY|TA|TD|TF|TN|TQ|TR|TS|TW|UB|W|WA|WC|WD|WF|WN|WR|WS|WV|YO|ZE)(\d[\dA-Z]?[ ]?\d[ABD-HJLN-UW-Z]{2}))|BFPO[ ]?\d{1,4}/g;
            // var GB = /GIR[ ]?0AA|((AB|AL|B|BA|BB|BD|BH|BL|BN|BR|BS|BT|CA|CB|CF|CH|CM|CO|CR|CT|CV|CW|DA|DD|DE|DG|DH|DL|DN|DT|DY|E|EC|EH|EN|EX|FK|FY|G|GL|GY|GU|HA|HD|HG|HP|HR|HS|HU|HX|IG|IM|IP|IV|JE|KA|KT|KW|KY|L|LA|LD|LE|LL|LN|LS|LU|M|ME|MK|ML|N|NE|NG|NN|NP|NR|NW|OL|OX|PA|PE|PH|PL|PO|PR|RG|RH|RM|S|SA|SE|SG|SK|SL|SM|SN|SO|SP|SR|SS|ST|SW|SY|TA|TD|TF|TN|TQ|TR|TS|TW|UB|W|WA|WC|WD|WF|WN|WR|WS|WV|YO|ZE)(\d[\dA-Z]?[ ]?\d[ABD-HJLN-UW-Z]{2}))|BFPO[ ]?\d{1,4}/g;
            var US = /\d{5}([ \-]\d{4})?/g;
            var CA = /[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ ]?\d[ABCEGHJ-NPRSTV-Z]\d/g;
            zip_code = zip_code.toUpperCase();

            if(country == 'United Kingdom'){
                return zip_code.match(GB) ? true : false;
            }else if(country == 'United States' || country == 'United States Minor Outlying Islands'){
                return zip_code.match(US) ? true : false;
            }else if(country == 'Canada'){
                return zip_code.match(CA) ? true : false;
            }else{
                return false;
            }
        }
 
        function findAddress(zip, country){
            var info = {
                "Key": "MK79-RU97-EW69-DP19", "Text": zip, "Country": country,
            }; 
            var demo = "https://api.addressy.com/Capture/Interactive/Find/v1.1/"
            var url = `https://api.addressy.com/Capture/Interactive/Find/v1.10/json2.ws?Key=HC66-HY31-MJ55-FG49&Text=${zip}&Countries=${country}`;
            $.ajax({
                type: 'GET',
                url: url,  
                processData: false,
                contentType: 'application/json',
                // 'Content-Type': 'application/json', 
                // data: info,  
                success: function(data, status){  
                    var loq_address = eval(data);
                    if(loq_address.length){ 
                        loq_address.forEach(element => {
                            if(element.Type == 'Address'){ 
                                if(country == 'Canada' || country == 'United Kingdom'){
                                    $('#address_group').append($(`<li class="list-group-item hand" onclick="retrieveAddress('${element.Id}')"> <span>${element.Text}</span> </li>`));
                                }
                            }else{
                                 $('#address_group').append($(`<li class="list-group-item hand" onclick="searchContainmentAddress('${element.Id}')"> 
                                        <span>${element.Text}</span> <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                                </li>`));
                            }
                        }); 
                        $('#addressModal').modal({backdrop: 'static'});
                    }else{    
                        // $('#address').fadeIn(500);
                        $('#address').attr('required', 'required');
                    }
                },
                error: function(data, status){
                    // console.log("Error",  data);
                }
            })
        } 
    });
    function searchContainmentAddress(id){
        var url = `https://api.addressy.com/Capture/Interactive/Find/v1.10/json2.ws?Key=HC66-HY31-MJ55-FG49&Container=${id}`;
        $.ajax({
            type: 'GET',
            url: url,  
            processData: false,
            contentType: 'application/json',
            success: function(data, status){  
                $('#address_group').empty();
                var loq_address = eval(data);
                if(loq_address.length){ 
                    loq_address.forEach(element => { 
                        // console.log(element)
                        if(element.Type == 'Address'){
                            $('#address_group').append($(`<li class="list-group-item hand" onclick="retrieveAddress('${element.Id}')"> <span>${element.Text}</span> </li>`));
                        }else{
                            $('#address_group').append($(`<li class="list-group-item hand" onclick="searchContainmentAddress('${element.Id}')"> 
                                    <span>${element.Text}</span> <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li>`));
                        }
                    });
                }
            }
        })
    }
    function retrieveAddress(id) {
        var url = `https://api.addressy.com/Capture/Interactive/Retrieve/v1.00/json2.ws?Key=HC66-HY31-MJ55-FG49&Id=${id}`;
        $.ajax({
            type: 'GET',
            url: url, 
            processData: false,
            contentType: 'application/json',
            success: function(data, status){  
                // console.log(data);
                var loq_address = eval(data);
                $('#address').val(loq_address[0].Label);
                $('#addressModal').modal('hide');
            },
        })
    }
    function valZip() { 
        var zip_code = $('#zip_code').val();
        var country = $('#country').val();
        var GB = /GIR[ ]?0AA|((AB|AL|B|BA|BB|BD|BH|BL|BN|BR|BS|BT|CA|CB|CF|CH|CM|CO|CR|CT|CV|CW|DA|DD|DE|DG|DH|DL|DN|DT|DY|E|EC|EH|EN|EX|FK|FY|G|GL|GY|GU|HA|HD|HG|HP|HR|HS|HU|HX|IG|IM|IP|IV|JE|KA|KT|KW|KY|L|LA|LD|LE|LL|LN|LS|LU|M|ME|MK|ML|N|NE|NG|NN|NP|NR|NW|OL|OX|PA|PE|PH|PL|PO|PR|RG|RH|RM|S|SA|SE|SG|SK|SL|SM|SN|SO|SP|SR|SS|ST|SW|SY|TA|TD|TF|TN|TQ|TR|TS|TW|UB|W|WA|WC|WD|WF|WN|WR|WS|WV|YO|ZE)(\d[\dA-Z]?[ ]?\d[ABD-HJLN-UW-Z]{2}))|BFPO[ ]?\d{1,4}/g;
        var US = /\d{5}([ \-]\d{4})?/g;
        var CA = /[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ ]?\d[ABCEGHJ-NPRSTV-Z]\d/g;
        zip_code = zip_code.toUpperCase();
        // console.log(zip_code);
        if(country == 'United Kingdom'){
            return zip_code.match(GB) ? true : false;
        }else if(country == 'United States' || country == 'United States Minor Outlying Islands'){
            return zip_code.match(US) ? true : false;
        }else if(country == 'Canada'){
            return zip_code.match(CA) ? true : false;
        }else{
            return false;
        }
    }
    function equityValidate() {
        var country = $('#country').val();
        if(country == 'United States' || country == 'United States Minor Outlying Islands' || 
                country == 'Canada' || country == 'United Kingdom'){
            var zip_code = $('#zip_code').val();
            var val =   valZip(); 
            if(!val) return false;
        }
        return true;
    }
</script>