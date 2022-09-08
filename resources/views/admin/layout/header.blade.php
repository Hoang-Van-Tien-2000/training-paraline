<!-- PAGE CONTAINER-->
   <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
         <div class="section__content section__content--p30">
            <div class="container-fluid">
               <div class="header-wrap">
               <a href=""> Trang Chủ </a>
                  <div class="header-button">
                     <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">  
                           <div class="content">
                              <a class="js-acc-btn" href="#">Team Management  </a>
                           </div>
                           <div class="account-dropdown js-dropdown">
                              <div class="account-dropdown__body">
                              </div>
                              <div class="account-dropdown__footer">
                                 <a href="{{route('admin.team.search')}}">Search </a>
                                 <a href="{{route('admin.team.add')}}">Create</a>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="header-button">
                     <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">  
                           <div class="content">
                              <a class="js-acc-btn" href="#"> Employee Management    </a>
                           </div>
                           <div class="account-dropdown js-dropdown">
                              <div class="account-dropdown__body">
                              </div>
                              <div class="account-dropdown__footer">
                                 <a href=" {{ route('admin.employee.search')}} ">Search </a>
                                 <a href=" {{route('admin.employee.add')}} ">Create</a>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="header-button">
                     <div class="account-wrap">
                        <div class="clearfix">  
                           <div class="content">
                              <a  href="{{route('admin.logout')}}">Logout</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- HEADER DESKTOP-->
@include('admin.layout.sidebar') 