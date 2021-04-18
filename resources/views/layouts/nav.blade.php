  <div class="header-wrapper d-none d-sm-none d-md-none d-lg-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom">
                                <div class="append mr-auto my-0 my-md-0 mr-auto">
                                    <ul class="list-group list-group-horizontal-md mr-auto">

                                        <li class="mr-1 {{ (request()->is('home')) ? 'active' : '' }} {{ (request()->is('')) ? 'active' : '' }}"><a href="{{url('/home')}}" class="text-dark btn-ctm-space "><span
                                                    class="lnr lnr-home pr-0 pr-lg-2"></span><span
                                                    class="d-none d-lg-inline">Home</span></a></li>

                                        <li class="mr-1 {{ (request()->is('company_page')) ? 'active' : '' }}"><a href="{{url('/company_page')}}" class="text-dark btn-ctm-space "><span
                                                    class="fa fa-link pr-0 pr-lg-2"></span><span
                                                    class="d-none d-lg-inline">Company</span></a></li>

                                          <li class="mr-1 {{ (request()->is('viewsiteurl')) ? 'active' : '' }}"><a href="{{url('/viewsiteurl')}}" class="text-dark btn-ctm-space "><span
                                                    class="lnr lnr-home pr-0 pr-lg-2"></span><span
                                                    class="d-none d-lg-inline">Login Links</span></a></li>

                                        <li class="mr-1 {{ (request()->is('ess-department')) ? 'active' : '' }}  {{ (request()->is('ess-staff')) ? 'active' : '' }} {{ (request()->is('siteurl')) ? 'active' : '' }}" ><a href="{{url('ess-staff')}}" class="text-dark btn-ctm-space "><span
                                                    class="lnr lnr-cog pr-0 pr-lg-2"></span><span
                                                    class="d-none d-lg-inline">Settings</span></a></li>
                                        
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>