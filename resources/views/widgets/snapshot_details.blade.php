<div class="modal fade" id="snapshotDetailModal" tabindex="-1" role="dialog" aria-labelledby="addWheelActModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c">
            <div class="modal-body">
                <div class="">
                    <h5 class=" bold text-underline text-center">
                        YOUR FINANCIAL INDEPENDENCE STATUS NOTE
                    </h5>
                </div>
                <table  class="table table-border gap-table">
                    <tr>
                        <td class="text-left td_para">
                            <span  style="margin-right: 10px;"> <img src="https://www.mygaphub.com/app/assets/icon/pdf_current.png" alt="" height="25">
                                Current</span>
                        </td>
                        <td>
                            @if ((int)$snap['currenttime'] > 10 && (int)$snap['currenttime'] < 360)
                                <p class="text-left">
                                    <span class="" >Your current rainy day savings can only last you {{( $snap['currenttime']) }} days. Are you comfortable with this?</span>
                                </p>
                            @elseif ((int)$snap['currenttime'] <= 10 )
                                <p class="text-left">
                                    <span class="" >Your current rainy day savings is at {{( $snap['currenttime']) }} days. This is a critical situation. You do not have any savings currently as a fall back plan incase you lose your job or income today. You should seriously consider speaking with one of our financial advisors.</span>
                                </p>
                            @elseif((int)$snap['currenttime'] == 360)
                                <p class="text-left">
                                    <span class="" >Your current rainy day savings can last you up to {{( $snap['currenttime']) }} days. Congratulations you have a whole year worth of living expenses saved up. Ensure you maintain this level as a minimum</span>
                                </p>
                            @else
                                <p class="text-left">
                                    <span class="" >Your current rainy day savings can last you up to {{( $snap['currenttime']) }} days. Wow! This is beyond the typical 360-day target.
                                        Congratulations you have more than a whole yer worth of living expenses saved up. Ensure you maintain this level as a minimum.
                                    </span>
                                </p>
                            @endif
                        </td>
                        <td>
                            @if ((int)$snap['currentper'] > 10 && (int)$snap['currentper'] < 100)
                                <p class="text-left">
                                    <span class="" >You are currently meeting {{ ($snap['currentper'])}}% of your monthly expenses from your portfolio income. What happens if you lose your main source of income?</span>
                                </p>
                            @elseif ((int)$snap['currentper'] <= 10)
                                <p class="text-left">
                                    <span class="" >You are currently meeting {{ ($snap['currentper'])}}% of your monthly expenses. You do not have any portfolio income. You should seriously consider speaking with one of our financial advisors.</span>
                                </p>
                            @else
                                <p class="text-left">
                                    <span class="" >You are currently meeting {{ ($snap['currentper'])}}% of your monthly expenses from your portfolio income. Well done! You are financially independent. Always remember to increase your means before increasing the cost of your lifestyle.</span>
                                </p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left td_para">
                            <span  style="margin-right: 10px;">  <img src="https://www.mygaphub.com/app/assets/icon/pdf_target.png" alt="" height="20">
                                Target</span>
                        </td>
                        <td class="text-left td_para">
                            <span>With a 360-day target, you are secure for one whole year.</span>
                        </td>
                        <td class="text-left td_para">
                            <span>With a target of 100% of your cost of living coming from your Asset Portfolio, you become Financially Independent.</span>
                        </td>
                    </tr>
                </table>
                <br>

                <table class="table table-bordered gap-table" >
                    <tr >
                        <td class="small_td">
                                <span class="color-zone mt-2" style="margin-bottom:1px;background: red"></span>
                                Red Zone <br> (0-25%)
                        </td>
                        <td class="text-left td_para">
                            This is an undesirable state. It means if you were to lose your job, you have savings to cover you only for a period between 0-90 days. It also means you have an asset portfolio income that is 25% or less of your cost of living.
                        </td>
                    </tr>
                    <tr>
                        <td class="small_td">
                            <span class="color-zone mt-2" style="margin-bottom:1px; background: #ffc200"></span>
                            Amber Zone (25% - 50%)
                        </td>
                        <td class="text-left td_para">
                            This is a progressive state. It means if you were to lose your job, you have savings to cover you for a period between 91-180 days. It also means you have an asset portfolio income that is between 26 - 50% of your cost of living.
                        </td>
                    </tr>
                    <tr>
                        <td class="small_td">
                            <span class="color-zone mt-2" style="margin-bottom:1px; background: #00ff00"></span>
                            Green Zone (51% - 75%)
                        </td>
                        <td class="text-left td_para">
                            This is a comfortable state. It means if you were to lose your job, you have savings to cover you for a period between 181-270 days. It also means you have an asset portfolio income that is between 51 - 75% of your cost of living.
                        </td>
                    </tr>
                    <tr>
                        <td class="small_td">
                            <span class="color-zone mt-2" style="margin-bottom:1px; margin-top:2px; background: #65B8E8"></span>
                            Blue Zone  (76% - 100+%)
                        </td>
                        <td class="text-left td_para">
                            <span> This is a desirable state. It means if you were to lose your job, you have savings to cover you for a period between 271-360 days and possibly beyond. It also means you have an asset portfolio income that is between 76 - 100%+ of your cost of living.</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
