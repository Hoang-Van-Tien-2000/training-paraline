@extends('admin.layout.main')
@section('main-content')
   <!-- MAIN CONTENT-->
   @include('admin.layout.header') 
   <div class="main-content">
      <div class="section__content section__content--p30">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="overview-wrap">
                     <h2 class="title-1">DashBoard</h2>
                    
                  </div>
               </div>
            </div>
            <div class="row m-t-25">
            </div>
            <div class="row">
              <div class="col-lg-12">
                  <div class="au-card chart-percent-card">
                    <div class="au-card-inner">
                        <h3 class="title-2 tm-b-5">Team - Create</h3>
                        <div class="row no-gutters">
                          <div class="col-xl-6">
                              <div class="chart-note-wrap">
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--blue"></span>
                                    <span>products</span>
                                 </div>
                                 <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--red"></span>
                                    <span>services</span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-6">
                              <div class="percent-chart">
                                 <canvas id="percent-chart"></canvas>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  @include('admin.layout.footer') 
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END MAIN CONTENT-->

   @endsection


