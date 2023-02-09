<?php 

namespace App\Helper;
use PhpOffice\PhpWord\TemplateProcessor;
use Exception;

class HelperClass {

    public static function popularCurrenciens(){
        return [
            "$ USD",  "€ EUR",  
            "£ GBP", "₦ NGN",
            "A$ AUD","¥ JPY", 
            "¢ GHS","CF CHF",
            "C$ CAD","元 CNY",
            "$ MXN", "₹ INR",
            "₽ RUB", "R$ BRL",
            "R ZAR", "د.إ AED",
            "﷼ SAR", "Rp IDR", 
        ]; 
    }

    public static function popularCurrenciensInfo(){
        return [ 
            ['currency' => "$ USD", 'flag'=>'united-states', 'country'=> 'US Dollar'],  
            ['currency' => "€ EUR", 'flag'=>'european-union', 'country'=> 'Euro'],   
            ['currency' => "£ GBP",  'flag'=>'united-kingdom', 'country'=> 'Pound Sterling'],  
            ['currency' =>"₦ NGN", 'flag'=>'nigeria', 'country'=> 'Nigerian Naira'],  
            ['currency' => "A$ AUD", 'flag'=>'australia', 'country'=> 'Australian  Dollar'],  
            ['currency' => "¥ JPY",  'flag'=>'japan', 'country'=> 'Japan Yen'],  
            ['currency' =>"¢ GHS", 'flag'=>'ghana', 'country'=> 'Ghana Cedis'],  
            ['currency' =>"CF CHF", 'flag'=>'swizerland', 'country'=> 'Swiss Franc'],  
            ['currency' =>"C$ CAD", 'flag'=>'canada', 'country'=> 'Canadian Dollar'],  
            ['currency' =>"元 CNY", 'flag'=>'china', 'country'=> 'Renminbi'],  
            ['currency' =>"$ MXN", 'flag'=>'mexico', 'country'=> 'Mexican Peso'],  
            ['currency' => "₹ INR", 'flag'=>'india', 'country'=> 'Indian Rupee'],  
            ['currency' =>"₽ RUB", 'flag'=>'russia', 'country'=> 'Russian ruble'],  
            ['currency' =>"R ZAR", 'flag'=>'south-africa', 'country'=> 'South African Rand'],  
            ['currency' =>"R$ BRL", 'flag'=>'brazil', 'country'=> 'Brazilian real'],  
            ['currency' => "د.إ AED", 'flag'=>'united-arab-emirates', 'country'=> 'UAE Dirham'],  
            ['currency' =>"﷼ SAR",  'flag'=>'saudi-arabia', 'country'=> 'Saudi Riyal'],  
            ['currency' =>"Rp IDR", 'flag'=>'indonesia', 'country'=> 'Indonesian rupiah'],  
        ];
    } 
    
    public static function popularCurrenciensHtmlCode(){
        return [
            "$ USD" => "&#36;",   "€ EUR" => "&#8364;", 
            "£ GBP" => "&#163;",
            "₦ NGN" => "&#8358;", 
            "A$ AUD" => "&#65;&#36;", "¥ JPY" => "&#165;", 
            "¢ GHS" => "&#71;&#72;&#162;", 
            "C$ CAD" => "&#67;&#36;", 
            "CF CHF" =>"&#67;&#72;&#102;", 
            "元 CNY" =>"&#165;", 
            "$ MXN" =>"&#77;&#101;&#120;&#36;", 
            "₹ INR" => "&#8377;", 
            "₽ RUB" => "&#8381;",  
            "R ZAR" =>  "&#82;&#36;", 
            "R$ BRL" => "&#82;.&#36;", 
            "د.إ AED" => "&#1583;.&#1573;", 
            "﷼ SAR"=> '&#65020;', 
            "Rp IDR" =>'&#82;&#112;'
        ];
    }
    public static function currencySymbol($current){
        foreach(HelperClass::popularCurrenciensHtmlCode() as $key => $currency){
            // var_dump( $key , $currency, $current); return;
            if($current == $key){
                return $currency;
            }
        }
    }
    public static function countries(){
        return array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam",
             "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    }

    public static function greating(){
        return [
            "01" =>	"Happy New Month! Enjoy every bit of it.",
            "02" => "Are you on track with your finances?",
            "03" => "Got a plan, start implementing!",
            "04" => "Supercharge your finances today.",
            "05" => "Its a beautiful day cos you made it here!",
            "06" => "Good or bad, some feedback will definitely help!",
            "07" => "What are you up to today?",
            "08" => "What will you achieve in the next 7 days?",
            "09" => "We are what we think the most.",
            "10" =>	"You just made a smart move by logging in.",
            "11" =>	"You will be loved when you serve, purpose to serve today!",
            "12" =>	"Do you know what the number 12 represents?",
            "13" =>	"Purpose is the driver of success.",
            "14" =>	"You're super focused.",
            "15" => "The 3rd 7-day cycle of the month begin - Watch out!",
            "16" =>	"Here to serve, please give me some feedback today.",
            "17" =>	"What's your greatest ambition? say it out loud! ",
            "18" =>	"What's that one word that describes you?",
            "19" =>	"",
            "20" =>	"Relax and conquer all challenges today.",
            "21" =>	"Smile and be happy :)",
            "22" =>	"Last 7-day cycle, start counting successes!",
            "23" =>	"How's your liabilties doing so far?",
            "24" =>	"Remember to give yourself some treat today.",
            "25" =>	"You are larger than life, create good memories today.",
            "26" =>	"Make the most of today!",
            "27" =>	"Can you make someone laugh today?",
            "28" =>	"Always a special day, today.",
            "29" =>	"Go the extra mile - you've got the strength.",
            "30" =>"Start planning your finances for next month's success.",
            "31" =>	"Financial independence is in view if you're yet to obtain it."
        ];
    }
    
    public static function daysPercentageColor(int $day){
        $color = ''; 
        if ($day <= 90) {
          $color = '#ff0000';
        }else if ($day > 90 && $day <= 180) {
            $color = '#ffc200';
        }else if ($day > 180 && $day <= 270) {
            $color = '#00ff00';
        }else if ($day > 270) {
            $color = '#65B8E8'; 
        }
        return $color;
    }

    public static function numPercentageColor(int $num){
         $color = ''; 
        if ($num <= 25) {   
          $color = '#ff0000';
        }else if ($num > 25 && $num <= 50) {
            $color = '#ffc200';
        }else if ($num > 50 && $num <= 75) {
            $color = '#00ff00';
        }else if ($num > 75) {
            $color = '#65B8E8';
        }
        return $color;
    }

    public static function convertToSnapshot($steps){
        $step1 = 0; $step2 = 0; $step3 = 0;  $step4 = 0;
        $step5 = 0; $step6 = 0; $step7 = 0;  
        if(strtolower($steps->step1) == "yes"){
            $step1 = 100;
        }else if(strtolower($steps->step1) == "no"){
            $step1 = 15;
        }

        if(strtolower($steps->step2) == "yes"){
            $step2 = 50;
        }else if(strtolower($steps->step2) == "no"){
            $step2 = 15;
        }else if(strtolower($steps->step2) == "already bought one"){
            $step2 = 100;
        }

        if(strtolower($steps->step3) == "yes"){
            $step3 = 100;
        }else if(strtolower($steps->step3) == "no"){
            $step3 = 25;
        } 

        if(strtolower($steps->step4) == "yes"){
            $step4 = 100;
        }else if(strtolower($steps->step4) == "no"){
            $step4 = 25;
        }else if(strtolower($steps->step4) == "actively paying it off"){
            $step4 = 50;
        }else if(strtolower($steps->step4) == "not applicable"){
            $step4 = 0;
        }

        if(strtolower($steps->step5) == "secured"){
            $step5 = 100;
        }else if(strtolower($steps->step5) == "saving"){
            $step5 = 25;
        }else if(strtolower($steps->step5) == "not saving"){
            $step5 = 15;
        }else if(strtolower($steps->step5) == "not applicable"){
            $step5 = 100;
        }

        if(strtolower($steps->step6) == "yes"){
            $step6 = 50;
        }else if(strtolower($steps->step6) == "no"){
            $step6 = 15;
        }

        if(strtolower($steps->step7) == "yes"){
            $step7 = 100;
        }else if(strtolower($steps->step7) == "no"){ 
            $step7 = 25;
        }

        return compact('step7', 'step6', 'step5', 'step4', 'step3','step2','step1');
        
        // return [
        //     "step1" => (int)$step1, "step2" => (int)$step2, "step3" => (int)$step3,
        //     "step4" => (int)$step4, "step5" => (int)$step5, "step6" => (int)$step6,
        //     "step7" => (int)$step7
        // ];
    } 

    public static function comments(){
        // Total 7G Analytics Credit Balance:
        // Your Total 7G Analytics Credit Balance:
 
        return $comments = [
            // AnAlytics
            array('1' =>'Your marker is red meaning you are not in a good zone yet. Try reviewing your monthly expenses, you might be able to save money that could be put towards increasing your rainy day fund. You might also consider creating a new income channels.',
                '26' =>"Your marker is amber! This means you are not in the worst state but you are not in a comfortable state either. The good news is that you have more than one month of your living expenses saved up. Try to increase your monthly savings amount starting from this month. Your status will look better in a few months from now.",
                '51' =>"Your marker is green! You have now crossed the 50% mark on your way to making provisions for the rainy day. Keep pushing, you will get there soon!",
                '76' =>"Your marker is blue! This is a very good band to be in and to maintain. Ensure that your status is at 100% and endeavour it stays there. Great job!!",
                "100" => "You have done it!!
                Hooray you made it here at last!!!
                Enjoy it :)" ),
            // Beta
            array('1' =>'Your marker is red. This is not necessarily a bad thing. You might have recently started savings up, remain consistent in order to hit your target. If you are red because you are behind on this commitment, use this tool to get back on track.',
                '26' =>"Your marker is amber! This means you have saved up more than 25% of what it would cost to buy your own home. Well-done! You must remain focused and keep checking if your target is still the same because the cost of houses do not remain static. Check here often to check how much progress you are making.",
                '51' =>"Your marker is green! It wouldn't be long now before you move into that house of your dream. Keep your eyes on the prize. Start looking at the things in your life that could be impacted by your move. Also, ensure you don't get distracted by anything else that might be calling on the saved up money. ",
                '76' =>"Your maker is blue! You are doubtless a go getter. Congratulations for getting into this band. Push all the way to 100% now, it much easier at this stage. That house is nearly yours.",
                "100" => "Your marker is blue! You made it!! Keep your head up and go and close that deal. Congratulations on owning your own home!!!" ),
            // Credit
            array('1' =>'Your marker is red meaning you are not in a good zone yet. Try reviewing your monthly expenses, you might be able to save money that could be put towards reducing your unsecured debt.',
                '26' =>"Your marker is amber, meaning you are gradually getting out of debt and you soon be on your way to creating wealth. Check out our Debt to Wealth calulator and let its result motivate you further in paying off these debts.",
                '51' =>"Your marker is green, meaning you have paid over half of what you set out to pay off. Beware of anything that might want to draw you back into owing more. You will soon be able to benefit from the Debt to Wealth simple system.",
                '76' =>"Your marker is blue. This means you are nearly debt free. You have done a great job. Now see it true, take yourself to that 100% status.",
                "100" => "Your marker is blue!
                You are debt-FREE!!
                Now focus on building your wealth." ),
            // Debt
            array('1' =>'Your marker is red. This could be because your mortgage is in early days. There are proven strategies you could use to eliminate your mortgage before the end of the original term. Check our learning centre for some hints.',
                '26' =>"Your marker is amber. You are without a doubt doing a good job. If you got here through an accelerated program, well done. However, if have managed to pay off over 25% of your mortgage simply because time passed, then you should consider an acceleration program. Take a look at mortgage elimination tips under Mortgage in 360⁰.",
                '51' =>"Your marker is green. That great debt burden is dissolving gradually. Make sure you celebrate crossing the 50% milestone if you haven't done so yet. Review your mortgage elimination strategy and make sure you are accelerating paying off this debt.",
                '76' =>"Your marker is blue. Mortgage will soon be in your past. You can get ready to apply your mortage payments to your Debt to Wealth program. If you haven't got one, start it today. Check Liabilities under 360⁰.",
                "100" => "Your marker is blue!
                AMAZING!!
                You are mortgage-FREE! Focus on building your wealth and remember extending helping hand to other by enlarging your benevolence." ),
            // Education
            array('1' =>'Your marker is red meaning you have only managed to save under 25% of what is required. If you have not done so, you can set up a monthly savings plan. If you have monthly savings plan already, will you be able to hit your target at this rate? If not, endeavour to increase your monthly savings amount.',
                '26' =>"Your marker is amber. You are making progress and that's good news. Ask yourself the question again? Will you be able to meet your target? If yes, great! If no, then how much do you need to be saving each month? Work towards that figure starting today.",
                '51' =>"Your marker is green. You have done well in saving this much towards your child(ren)'s education. Make sure your kids are educated on the subject of financial intelligence and money management. Also check if you are geeting the best savings interest on this money you have set aside.",
                '76' =>"Your marker is blue. You are indeed a good parent going out on your limb for your kids making sure they don't start life with a burden of debt on their back. Now, push it all the way to 100%.",
                "100" => "Your marker is blue!
                A rare parent you are. You have done really well indeed. Because of what you have done, your child(ren) will not have to carry the weight of debt when they come out of University or College.
                You are to be celebrated for leaving this legacy behind for your child(ren) to emulate." ),
            // Freedom
            array('1' =>'Your marker is red meaning you will struggle with funding your cost of living if you were to lose your income from your job or self employment. Contact us today to speak to a financial coach that could help you. ',
                '26' =>"Your marker is amber and this is a good thing. Make sure you have a strategy in place to your percentage to 100% in the shortest peiod of time. Take a look at your Acquisition provisions.",
                '51' =>"Your marker is green. Getting beyond the midpoint towards your financial independence is a mega big deal. So a big congratulations is well deserved. Make sure you keep on track and keep acquiring those income-generating assets. Check out our Acquisition provision.",
                '76' =>"Your marker is blue. You must be really enjoying this. You are now able to fund over three quarters of your cost of living from your portfolio income. This is remarkable! Now put all your efforts into pushing it to the 100% status.",
                "100" => "Your marker is blue!
                You are now officially FINANCIALLY INDEPENDENT!!
                This is amazing new. Please do all you can to remain independent. We are here to support this awesome status of yours." ),
            // Grand
            array('1' =>'Your marker is red meaning you are very low in your benevolence. The key to benevolence is to find a cause you can be passionate about. You will be amazed how easy it is to contribute and give to others outside of yourself when you find this cause. The joy of living is giving. Don’t miss out on this.',
                '26' =>"Your marker is amber.This means you care about giving to others, well done! Keep it up and you will certainly maintain true joy.",
                '51' =>"Your marker is green! This is an amazing place to be in and you are surely amongst a very few people on the planet today who give away more than half of what they spend on their upkeep away to others and causes they believe in. Carry on and keep the world a better place. ",
                '76' =>"Your marker is blue! This is simply awesome. You are indeed a rare gem. Look into spreading the effect of your benevolence. What you are giving away now can probably do a lot more if you review what is being done with all these money and look to spreading your reach.",
                "100" => "Your marker is blue! 
                People like you are the beacon of hope for the human race!!
                It is no doubt an honour to have you on GAPhub!
                You are celebrated immensely and our prayers are always with you." ),
        ];
    }
 

    public static function dashboardTiles(){
      
        return [
            'equity' => true,
            'net_worth' => true,
            'average_seed' => true,
            'grand' => false,
            'freedom' => false,
            'education' => false,
            'debt' => false,
            'credit' => false,
            'beta' => false,
            'alpha' => false,
        ];
    }

}