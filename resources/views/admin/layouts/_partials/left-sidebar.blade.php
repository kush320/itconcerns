<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
        
        </div>
        <ul class="side-menu metismenu">

            <li class="heading">Menu</li>
            <li>
                <a href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-wrench "></i>
                <span class="nav-label">Site Setting</span></a>
            </li>
         

         <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">User Management</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('role.index')}}">
                            <span class="fa fa-plus"></span>
                            Roles
                        </a>
                    </li>
                    <li>
                        <a href="{{route('permission.index')}}">
                            <span class="fa fa-plus"></span>
                           Permission
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.index')}}">
                            <span class="fa fa-plus"></span>
                           Users
                        </a>
                    </li>

                </ul>
            </li>



            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sliders"></i>
                    <span class="nav-label">Slider</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('slider.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Slider
                        </a>
                    </li>
                    <li>
                        <a href="{{route('slider.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Slider
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-clipboard"></i>
                    <span class="nav-label">Projects</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('projects.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Project
                        </a>
                    </li>
                    <li>
                        <a href="{{route('projects.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Projects
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-download"></i>
                    <span class="nav-label">Downloads</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('download.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Download
                        </a>
                    </li>
                    <li>
                        <a href="{{route('download.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Downloads
                        </a>
                    </li>

                    <li>
                        <a href="{{route('category.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Category
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Categories
                        </a>
                    </li>

                </ul>
            </li> 
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon  fa fa-handshake-o"></i>
                    <span class="nav-label">Customers Number</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('customers.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Customer
                        </a>
                    </li>
                    <li>
                        <a href="{{route('customers.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Customers
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-file"></i>
                    <span class="nav-label">Pages</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('pages.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Pages
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pages.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Pages
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-cogs"></i>
                    <span class="nav-label">Services</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('service.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Service
                        </a>
                    </li>
                    <li>
                        <a href="{{route('service.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Services
                        </a>
                    </li>

                </ul>
            </li>
          
           <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-archive"></i>
                    <span class="nav-label">Products</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('product.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Product
                        </a>
                    </li>
                    <li>
                        <a href="{{route('product.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Products
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-windows"></i>
                    <span class="nav-label">Microsoft Solution</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('microsoft-solution.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Solution
                        </a>
                    </li>
                    <li>
                        <a href="{{route('microsoft-solution.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Solutions
                        </a>
                    </li>
                    <li>
                        <a href="{{route('microsoft-solution-enquiries')}}">
                            <span class="fa fa-envelope"></span>
                            Enquiries
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fab fa-google"></i>
                    <span class="nav-label">Google Cloud</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('google-cloud-solution.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Solution
                        </a>
                    </li>
                    <li>
                        <a href="{{route('google-cloud-solution.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Solutions
                        </a>
                    </li>
                    <li>
                        <a href="{{route('google-cloud-solution-enquiries')}}">
                            <span class="fa fa-envelope"></span>
                            Enquiries
                        </a>
                    </li>

                </ul>
            </li> 
          <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-user-secret"></i>
                    <span class="nav-label">Partners</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('partner.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Partner
                        </a>
                    </li>
                    <li>
                        <a href="{{route('partner.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Partners
                        </a>
                    </li>

                </ul>
            </li> 
           <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-tripadvisor"></i>
                    <span class="nav-label">Trainer</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('trainer.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Trainer
                        </a>
                    </li>
                    <li>
                        <a href="{{route('trainer.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Trainers
                        </a>
                    </li>

                </ul>
            </li> 
                <li>
                <a href="javascript:;">
                
                    <i class="sidebar-item-icon fa fa-paperclip"></i>
                    <span class="nav-label">Trainings</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('training.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Training
                        </a>
                    </li>
                    <li>
                        <a href="{{route('training.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Trainings
                        </a>
                    </li>

                </ul>
            </li> 
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-user-circle"></i>
                    <span class="nav-label">Client</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('client.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Client
                        </a>
                    </li>
                    <li>
                        <a href="{{route('client.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Client
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-question-circle"></i>
                    <span class="nav-label">User Inquiry</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('enquiryList')}}">
                            <span class="fa fa-circle-o"></span>
                            Inquiry
                        </a>
                    </li>
                    <li>
                        <a href="{{route('quoteList')}}">
                            <span class="fa fa-circle-o"></span>
                            Request Quote
                        </a>
                    </li>
                       <li>
                        <a href="{{route('detailList')}}">
                            <span class="fa fa-circle-o"></span>
                            Career Inquiry
                        </a>
                    </li>
                  
                     <li>
                        <a href="{{route('trainingDetail')}}">
                            <span class="fa fa-circle-o"></span>
                            Training Inquiry
                        </a>
                    </li>

                </ul>
            </li>  
           
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-user-plus"></i>
                    <span class="nav-label">Teams</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('teams.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Team
                        </a>
                    </li>
                    <li>
                        <a href="{{route('teams.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Teams
                        </a>
                    </li>

                </ul>
            </li>  
             <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-graduation-cap"></i>
                    <span class="nav-label">Leaders</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('leaders.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Leader
                        </a>
                    </li>
                    <li>
                        <a href="{{route('leaders.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Leaders
                        </a>
                    </li>

                </ul>
            </li>  
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-quote-left"></i>
                    <span class="nav-label">Testimonial</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('testimonial.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Testimonial
                        </a>
                    </li>
                    <li>
                        <a href="{{route('testimonial.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Testimonial
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-check-square"></i>
                    <span class="nav-label">Resources</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('resource.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Resource
                        </a>
                    </li>
                    <li>
                        <a href="{{route('resource.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Resources
                        </a>
                    </li>

                </ul>
            </li>
                <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-graduation-cap"></i>
                    <span class="nav-label">Careers</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('career.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Career
                        </a>
                    </li>
                    <li>
                        <a href="{{route('career.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Careers
                        </a>
                    </li>

                </ul>
            </li>
            
        </ul>
    </div>
</nav>
