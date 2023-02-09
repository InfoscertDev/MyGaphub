<div class="">
    <div class="form-slate bt-0 elevate-3">
        <div class="form-reg">
            <h5 class="ml-2 mt-3 mb-2">Action Plan & Personal Strategy Note:</h5>
            <div class="plan-box  bg-white elevate-3">
                <div class="form-group">
                    @if ($todaynote['depreciating'])
                        <textarea placeholder="Please start typing here..." name="note" id="" cols="30" rows="5" class="form-control pl-2 bg-white">{{$todaynote['depreciating']->note}}</textarea>     
                   @else 
                        <textarea placeholder="Please start typing here..."  minlength="10" name="note" id="" cols="30" rows="5" class="form-control pl-2 bg-white"></textarea>
                    @endif
                </div>  
                <div class="text-right">  
                    <button class="btn bg-none btn-md pr-2" type="submit" {{($todaynote['depreciating']) ? 'disabled' : '' }}><i class="fa fa-st fa-save"></i></button>
                    <button class="btn bg-none btn-md pr-4" type="submit" {{($todaynote['depreciating']) ? '' : 'disabled' }}><i class="fa fa-st fa-edit"></i></button>
                </div>
            </div>
        </div>
    </div>
</div> 
{{-- @endsection --}}
