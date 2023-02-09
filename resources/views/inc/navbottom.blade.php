<div class="menu bg-gray list pb-2" style="background: rgba(73, 73, 73, .9);">
    <ul class="row mx-0 mt-2 p-0"> 
         <li class="col  mob-list-item">    
             <a href="{{ Route('home') }}" class="{{ Request::is('home') ? 'txt-white active' : '' }}"> 
                 <img src="{{  Request::is('home') ? asset('/assets/mob/snapshotFFF.png') : asset('/assets/mob/snapshot000.png') }}" class="ml-2 icon" style="min-height: 26px" alt=""><br>
                 <span class="small text-light" >Snapshot</span>
             </a> 
         </li>   
         
         <li class="col  mob-list-item">
             <a href="{{ Route('7g') }}" class="{{ str_contains(Request::url(),'home/7g')  ? 'txt-white active' : '' }}">
                 <img src="{{  str_contains(Request::url(),'home/7g')  ? asset('/assets/mob/analyticsFFF.png') : asset('/assets/mob/analytics000.png') }}" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">Analytics</span>
             </a>
         </li>
         
         <li class="col  mob-list-item">
             <a href="{{ Route('user.acquisition') }}" class="{{ str_contains(Request::url(),'acquisition') ? 'txt-white active' : '' }}"> 
                 <img src="{{  str_contains(Request::url(),'acquisition') ? asset('/assets/mob/acquisitionFFF.png') : asset('/assets/mob/acquisition000.png') }}" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">Acquisition</span>
             </a>
         </li>

         <li class="col  mob-list-item">
             <a href="{{ route('portfolio') }}" class="{{ str_contains(Request::url(),'home/portfolio') ? 'txt-white active' : '' }}">
                 <img src="{{  str_contains(Request::url(),'home/portfolio') ? asset('/assets/mob/portfolioFFF.png') : asset('/assets/mob/portfolio000.png') }}" class="ml-2 icon" alt=""><br>
                     <span  class="small text-light">Portfolio</span>
             </a>  
         </li>
         
         <li class="col  mob-list-item">
             <a href="{{ Route('tools') }}" class=" {{ Request::is('home/tools') ? 'txt-white active' : '' }}"> 
                 <img src="{{  Request::is('home/tools') ? asset('/assets/mob/moreFFF.png') : asset('/assets/mob/more000.png') }}" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">More</span>
             </a>  
         </li>
    </ul>
 </div>