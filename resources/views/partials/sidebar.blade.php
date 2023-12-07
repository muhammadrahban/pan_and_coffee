 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 {{-- <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                         aria-expanded="false"><span class="hide-menu"> --}}
                 {{-- <h4>{{ auth()->user()->full_name }}</h4> --}}
                 </span></a>

                 <ul aria-expanded="false" class="collapse">
{{--
                     <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                     <li><a href="{{ route('password.request') }}"><i class="ti-settings"></i> Reset Password</a>
                         </li> --}}


                     {{-- logout form --}}
                     {{-- <li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                             <a class="waves-effect waves-dark" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"
                                 aria-expanded="false">
                                 <i class="icon-logout"></i>
                                 <span class="hide-menu">Log Out</span>
                             </a>
                         </li> --}}
                 </ul>
                 </li>
                 {{-- <li class="nav-small-cap">--- PERSONAL</li> --}}
                 {{-- <li> <a class="waves-effect waves-dark" title="Activities" href="{{ Route('activity.list') }}"><i
                             class="fas fa-bell">

                             <div class="notify">
                                 <span class="heartbit"></span>
                             </div>

                         </i><span class="hide-menu">

                             <span id="data-container" class="badge rounded-pill bg-cyan ms-auto"></span>

                             Activities
                         </span>
                     </a> --}}
                 <li> <a class="waves-effect waves-dark" title="Dashboard" href="{{ url('/') }}"><i
                             class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                 <li> <a class="waves-effect waves-dark" title="Caregivers Management" href="{{ Route('user.list') }}"><i
                             class="fas fa-users"></i></i><span class="hide-menu">Users Management</span></a>
                             <li> <a class="waves-effect waves-dark" title="product Management" href="{{Route('product.index')}}"><i
                                class="fas fa-hand-holding-heart" aria-hidden="true"></i></i><span
                                         class="hide-menu">Product Management</span></a>
                             <li> <a class="waves-effect waves-dark" title="Order Management" href="{{Route('order.index')}}"><i
                                class="fas fa-arrow-up" aria-hidden="true"></i></i><span
                                         class="hide-menu">Order Management</span></a>

         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <script>

</script>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
