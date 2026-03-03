<!-- Listing Tools -->
@php
 if(isset($plant))   $asset = $plant;
@endphp 
<!-- <div id="tools" style="display: none;" >
    <ul class="social marB0">
        <?php 
            // Program to display URL of current page. 
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
                $link = "https"; 
            else
                $link = "http"; 
            
                // Here append the common URL characters. 
                $link .= "://"; 
                
                // Append the host(domain name, ip) to the URL. 
                $link .= $_SERVER['HTTP_HOST']; 
                
                // Append the requested resource location to the URL 
                $link .= $_SERVER['REQUEST_URI']; 
                $current_URL = $link;
        ?>
        <li class="twitter"><a href="javascript:void(0);" onclick="popup('http://twitter.com/home/?status={{isset($asset->name)}} — {{ isset($asset->location->country) }}, {{ isset($asset->location->city) }}, {{ isset($asset->location->street) }} — <?php echo $current_URL; ?>', 'twitter',500,260);"><i class="fa fa-twitter"></i></a></li>

        <li class="facebook"><a href="javascript:void(0);" onclick="popup('http://www.facebook.com/sharer.php?u=<?php echo $current_URL; ?>&t={{isset($asset->name)}} — {{ isset($asset->location->country) }}, {{ isset($asset->location->city) }}, {{ isset($asset->location->street) }}', 'facebook',658,225);"><i class="fa fa-facebook"></i></a></li>

        <li class="linkedin"><a href="javascript:void(0);" onclick="popup('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_URL; ?>&title={{isset($asset->name)}} — {{ isset($asset->location->country) }}, {{ isset($asset->location->city) }}, {{ isset($asset->location->street) }}&summary=&source={{ config('app.name', 'Gap Property Hub') }}', 'linkedin',560,400);"><i class="fa fa-linkedin"></i></a></li>

    </ul>

    
    
</div> -->

<link href="https://cdn.jsdelivr.net/npm/shareon/dist/shareon.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/shareon/dist/shareon.min.js"></script>

<div class="modal {{($isSingleReap) ? '' : 'fade'}}" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">  
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            <div class="modal-body" style="min-height: 150px;">
                <div class="mt-3 mb-4">
                    <div class="d-block form-group  mx-2">
                        <p id="confirm_copy" class="alert alert-info text-left" style="display: none;">Link Copied</p>
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" id="share_link" value="" readonly="">
                            <span class="input-group-addon btn btn-pry" onclick="copyLink()">Copy</span>
                        </div>
                    </div>
                    <div class="shareon" data-url="">
                        <a class="whatsapp" data-title="">WhatsApp</a> 
                        <a class="mail" data-title="">Email</a>
                        <a class="facebook" data-title="">Facebook</a>
                        <a class="linkedin" data-url="">Linkedin</a> <br>
                        <a class="pinterest" data-media="">Pinterest</a> 
                        <button class="telegram" data-text="">Telegram</button>
                        <button class="twitter" data-via="">Twitter</button>
                        <!-- <a class="mastodon" data-text="{{$link}}" data-via="@admin@prismcheck.com"></a> -->
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div> 