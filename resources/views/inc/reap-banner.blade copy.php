

<div class=" {{ ($sasset)  ? '' : 'mx-5' }}"  >
    <span class="mr-3 pb-2" id="goback">
        <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i>  Back</a>
    </span>
    <div class="b-rad-20 mt-1 cal-head hd-reap" id="authhead">
        <div class="b-rad-20 overlay2">
            <div class="disclaim text-center">
                <h2 class="list-explore">Real Estate Asset Program (REAP)</h2>
                <div class="disclaim text-center">
                    <form action="{{ route('user.search-reap',[$set]) }}" method="POST">
                        @csrf
                        <input type="text" id="cr_keyword" class="text-opportunity" name="cr_keyword" placeholder="Search">
                        {{-- <span id="search"><i class="fa fa-search" ></i> Search</span> --}}
                        <button class="btn bg-none  reap_sub" type="submit"><i class="fa fa-search" ></i> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
