          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="{!! access()->user()->picture !!}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                  <p>{{ access()->user()->name }}</p>
                  <!-- Status -->
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>


              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">

              {{--main dashboard & user Managemant--}}
                @permission('view-backend')
               <li class="{{ Active::pattern('') }}"><a href="{!!route('backend.dashboard')!!}"><span>{{ trans('menus.dashboard') }}</span></a></li>
               <li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/mohDashboard')!!}"><span>{{ trans('menus.mohdashboard') }}</span></a></li>
                @endauth
                {{--MOH User--}}
                @permission('moh_access_management')
                  @permission('view-access-management')
                  <li class="header">{{ trans('menus.user_lvl') }}</li>
                  <li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.search_contact') }}</span></a></li>
                  <li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/analytics')!!}"><span>{{ trans('menus.suggest_contact') }}</span></a></li>
                  <li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.suggest_map') }}</span></a></li>
                  <li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/analytics')!!}"><span>{{ trans('menus.view_suggest_contact') }}</span></a></li>

                  {{--<li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/patientDetail')!!}"><span>{{ trans('menus.moh_detail') }}</span></a></li>--}}
                  @endauth
                @endauth

                 {{--PHI User --}}
                @permission('phi_access_management')
                <li class="header">{{ trans('menus.admin_lvl') }}</li>
                <li class="{{ Active::pattern('') }}"><a href="{!!route('admin.access.user.change-password',Auth::user()->id)!!}"><span>{{ trans('menus.access_management') }}</span></a></li>
                <li><a href="{!!url('admin/access/new-contact')!!}">{{ trans('menus.add_contact') }}</a></li>
                <li><a href="{!!url('admin/access/add-map')!!}">{{ trans('menus.add_map') }}</a></li>
                  <li><a href="{!!url('admin/access/report')!!}">{{ trans('menus.view_contact_suggestion') }}</a></li>
                  <li><a href="{!!url('admin/access/PHI/CommunicableDiseaseRegistration/')!!}">{{ trans('menus.view_map_suggestion') }}</a></li>
                  <li><a href="{!!url('admin/access/report')!!}">{{ trans('menus.check_analysis') }}</a></li>
                  <li><a href="{!!url('admin/access/PHI/CommunicableDiseaseRegistration/')!!}">{{ trans('menus.register_dim') }}</a></li>

                @endauth



              </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>
