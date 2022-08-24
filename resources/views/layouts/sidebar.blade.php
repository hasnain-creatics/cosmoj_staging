<!--aside open-->



<aside class="app-sidebar is-expanded ps ps--active-y">

					<div class="app-sidebar__logo">

						<a class="header-brand" href="index.html">

							<img src="{{asset('public')}}/assets/images/cosmojlogo.png" class="header-brand-img desktop-lgo" alt="Cosmoj Logo">

							<img src="{{asset('public')}}/assets/images/cosmojlogo.png" class="header-brand-img dark-logo" alt="Cosmoj Logo">

							<img src="{{asset('public')}}/assets/images/cosmojlogo.png" class="header-brand-img mobile-logo" alt="Cosmoj Logo">

							<img src="{{asset('public')}}/assets/images/cosmojlogo.png" class="header-brand-img darkmobile-logo" alt="Cosmoj Logo">

						</a>

					</div>

					<ul class="side-menu app-sidebar3">


					<li class="side-item side-item-category">Navigation</li>

						<li class="slide">

							<a class="side-menu__item"  href="{{route('home')}}">

								<svg xmlns="" class="side-menu__icon" width="45" height="24" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 20 15">
									<path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
									<path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
								</svg>
								<span class="side-menu__label">Dashboard</span>
							</a>

						</li>




						@if (Auth::user()->can('user-view') || Auth::user()->can('role-view'))

                            <li class="slide">

                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">                               

									<svg xmlns=""  class="side-menu__icon" width="45" height="24"  fill="currentColor" class="bi bi-people-fill" viewBox="0 0 15 10">

										<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>

										<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>

										<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>

									</svg>

									<span class="side-menu__label">User Management</span><i class="angle fe fe-chevron-right"></i>

								</a>

                                <ul class="slide-menu">

								@can('role-view')

                                    <li><a href="{{url('admin/roles')}}" class="slide-item">Roles</a></li>

								@endcan

								

								@can('user-view')

                                    <li><a href="{{url('admin/user')}}" class="slide-item">User</a></li>

								@endcan   

								</ul>

                            </li>





                        @endif



						

						 @if (Auth::user()->can('leads-view'))

                            <li class="slide">

                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">

									<svg xmlns="" class="side-menu__icon" width="45" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 20 14">

  										<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>

									</svg>

                               		 <span class="side-menu__label">Lead Management</span><i class="angle fe fe-chevron-right"></i>

								</a>

                                <ul class="slide-menu">

								    <li><a href="{{route('leads.home')}}" class="slide-item">Leads List</a></li>

								</ul>

                            </li>

						@endif 



					</ul>

                       </aside>



				<!--aside closed-->

