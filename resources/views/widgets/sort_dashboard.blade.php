<div class="modal fade" id="sortDashboardModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h4 class="text-center ff-rob">Select the tiles you will like to display on your dashboard
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h4> 
                    <p class="text-center txt-primary">(You can only have a minimum and maximum of 3 tiles at a time)</p>
                </div> 
                <form action="{{ route('home.dashboard') }}" method="post">
                    @csrf
                    <div class="mt-4 mb-3">
                        <div class="accord-header sort-accord"> 
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Home Equity</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_equity" name="equity" {{ ($dashboard->equity) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_equity"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Net Worth</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_net" name="net_worth"  {{ ($dashboard->net_worth) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_net"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Average SEED</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_seed" name="average_seed"  {{ ($dashboard->average_seed) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_seed"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Grand </span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_grand"  name="grand"  {{ ($dashboard->grand) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_grand"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Freedom</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_freedom"  name="freedom"  {{ ($dashboard->freedom) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_freedom"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Education</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_education"  name="education"  {{ ($dashboard->education) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_education"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Debt</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_debt"  name="debt"  {{ ($dashboard->debt) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_debt"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Credit</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_credit"  name="credit"  {{ ($dashboard->credit) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_credit"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Beta</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_beta"  name="beta"  {{ ($dashboard->beta) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_beta"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accord-header sort-accord">
                            <div class="wd-f mb-0">
                                <span class="gap-card-title2 accord-title">Alpha</span>
                                <div class="btn-accord">
                                    <div class="switch pt-2">
                                        <input class="sort_check" onchange="validateMaxTiles()" onclick="$(this).val(this.checked ? 1 : 0)" id="switch_alpha"  name="alpha"  {{ ($dashboard->alpha) ? 'checked' : ''}} type="checkbox" />
                                        <label data-off="OFF" data-on="ON" for="switch_alpha"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto mt-4 mb-2 text-center">
                            <p class="text-center" id="sort_error"></p>
                            <button type="submit" id="submit_tiles" class="btn btn-sm btn-pry px-4">OK</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        var checks = document.querySelectorAll('.sort_check');
        checks.forEach(check => {
           $(check).val(check.checked ? 1 : 0);
        });
    });

    function validateMaxTiles(){
        var checks = document.querySelectorAll('.sort_check');
        var submit_tiles = document.getElementById('submit_tiles');
        var sort_error = document.getElementById('sort_error');
        var checked = [];
        checks.forEach(check => {
            if(check.checked) checked.push(check);
        });
        if(checked.length > 3){
            submit_tiles.disabled = true;
            sort_error.textContent = 'Only a maximum of 3 tiles could be chosen';
        }else if(checked.length < 3){
            submit_tiles.disabled = true;
            sort_error.textContent = 'You must choose 3 tiles';
        }else{
            submit_tiles.disabled = false;
            sort_error.textContent = '';
        }
    }

</script>