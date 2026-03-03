<div id="viewNoteBoard" style="display: none;">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" integrity="sha384-DmABxgPhJN5jlTwituIyzIUk6oqyzf3+XuP7q3VfcWA2unxgim7OSSZKKf0KSsnh" crossorigin="anonymous">
    <link href="{{ asset('assets/css/datepaginator.css') }}" rel="stylesheet" media="screen" type="text/css">

    <div class="py-5">
        <div class="gap-note  bg-note elevation-3 sm-wdf"> 
            <div class="note">
                <h4 class="text-underline bold text-center" id="note_period"></h4> 
                <p class="pb-3" id="note_detail"></p>
                
                <div id="save_editnote" class="mb-3" style="display: none;">
                    <form action="{{ route('portfolio.update.note', $asset->id) }}" method="POST"> 
                        @csrf  
                        <input type="hidden" name="jaznjsxnjszbnjcknjkxnjkxncskniujkns" id="jahbnkmnbjlikvhjcvhsdsszhjbswsd">
                        <textarea name="note" id="note_answer" placeholder="Note:" id="" cols="30" rows="3" class="noresize form-control b-rad-10 bg-light"></textarea>   
                        <div class="text-center d-flex">
                            <button type="submit"  class="my-2 btn btn-pry mx-auto btn-sm">Save</button>
                        </div>
                    </form> 
                </div> 
                <div class="text-center text-underline hand" id="editnote">Edit Note</div>
            </div>
        </div>  
        <div class="row mx-auto ">
            <div id="paginator" class="col-sm-12"></div>
        </div>
    </div>
   

    <script> 
        $(function() {
            var edit = false;
            $('#editnote').on('click', ()=> {
                if(this.edit){
                    $('#note_detail').fadeIn();
                    $('#save_editnote').hide();
                }else{
                    $('#note_detail').hide();
                    $('#save_editnote').fadeIn();
                } 
                this.edit = !this.edit;
            });

            fetchNoteDetail(Date.now());
            
            setTimeout(()=> { 
                var options = { 
                    // selectedDate: '2021-07-01', 
                    // selectedDate: new Date().getUTCFullYear() +'-' +new Date().getUTCMonth()+ 1+, 
                    onSelectedDateChanged: function(event, date) {
                        // Your logic goes here
                        var selected = date._i;
                        var year = new Date(selected).getUTCFullYear(),
                            month = new Date(selected).getUTCMonth() + 1; 
                        var period = `${year}-${month}`;
                        $('#jahbnkmnbjlikvhjcvhsdsszhjbswsd').val(period);
                        
                        var header = "ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn";
                        var current = "addperiod_ajhbxsjnbjsxbnoaklmsikn";
                        
                        $.ajax({ 
                            method: 'GET',
                            url: "<?php echo Request::url() ?>"+`?header=${header}&access=${current}&period=${period}`,
                            success: function (data, status) {
                                if(status == "success" && data.asset_records){ 
                                    // console.log('Load Record', data.asset_records);
                                    let period_format = new Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(period))
                                        +' ' + new Intl.DateTimeFormat('en', { year: 'numeric' }).format(new Date(period));
                                    $('#note_period').text(period_format);
                                    $('#note_detail').text(data.asset_records.note);
                                    $('#note_answer').text(data.asset_records.note); 
                                } else{
                                    let period_format = new Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(period))
                                        +' ' + new Intl.DateTimeFormat('en', { year: 'numeric' }).format(new Date(period));
                                    $('#note_period').text(period_format);
                                    $('#note_detail').text('No note for this month');
                                    $('#note_answer').text(''); 
                                }
                            } 
                        });
                    }
                }
                $('#paginator').datepaginator(options);
            

            }, 4 * 1000)
            function fetchNoteDetail(selected){
                    var year = new Date(selected).getUTCFullYear(),
                        month = new Date(selected).getUTCMonth()+ 1; 
                    var period = `${year}-${month}`;
                    $('#jahbnkmnbjlikvhjcvhsdsszhjbswsd').val(period);
                    var header = "ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn";
                    var current = "addperiod_ajhbxsjnbjsxbnoaklmsikn";
                    
                    $.ajax({ 
                        method: 'GET',
                        url: "<?php echo Request::url() ?>"+`?header=${header}&access=${current}&period=${period}`,
                        success: function (data, status) {
                            if(status == "success" && data.asset_records){ 
                               
                                // console.log('Load Record', data.asset_records.note);
                                let period_format = new Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(period))
                                    +' ' + new Intl.DateTimeFormat('en', { year: 'numeric' }).format(new Date(period));
                                $('#note_period').text(period_format);
                                $('#note_detail').text(data.asset_records.note);
                                $('#note_answer').text(data.asset_records.note); 
                            } else{
                                let period_format = new Intl.DateTimeFormat('en', { month: 'long' }).format(new Date(period))
                                        +' ' + new Intl.DateTimeFormat('en', { year: 'numeric' }).format(new Date(period));
                                    $('#note_period').text(period_format);
                                    $('#note_detail').text('No note for this month');
                                    $('#note_answer').text(''); 
                            }
                        } 
                    });
                }
        })
    </script>
</div>
