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

              <!-- search form (Optional) -->
              {{--<form action="#" method="get" class="sidebar-form">--}}
                {{--<div class="input-group">--}}
                  {{--<input type="text" name="q" class="form-control" placeholder="{{ trans('strings.search_placeholder') }}"/>--}}
                  {{--<span class="input-group-btn">--}}
                    {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
                  {{--</span>--}}
                {{--</div>--}}
              {{--</form>--}}
              <!-- /.search form -->

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
                  <li class="header">{{ trans('menus.general') }}</li>
                  <li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.access_management') }}</span></a></li>
                  <li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/analytics')!!}"><span>{{ trans('menus.moh_analytics') }}</span></a></li>
                  <li class="treeview">
                  <li><a href="{!!url('admin/access/report')!!}">View communicable Dis-Report”</a></li>
                  {{--<li class="{{ Active::pattern('') }}"><a href="{!!url('admin/access/patientDetail')!!}"><span>{{ trans('menus.moh_detail') }}</span></a></li>--}}
                  @endauth
                @endauth

                 {{--PHI User --}}
                @permission('phi_access_management')
                <li class="header">{{ trans('menus.phi_admin') }}</li>
                <li class="{{ Active::pattern('') }}"><a href="{!!route('admin.access.user.change-password',Auth::user()->id)!!}"><span>{{ trans('menus.access_management') }}</span></a></li>
                <li><a href="{!!url('admin/access/report')!!}">View communicable Dis-Report</a></li>
                <li><a href="{!!url('admin/access/PHI/CommunicableDiseaseRegistration/')!!}">View communicable Dis-Report</a></li>

                @endauth

                 {{--<li class="{{ Active::pattern('admin/log-viewer*') }} treeview">--}}
                  {{--<a href="#">--}}
                    {{--<span>{{ trans('menus.log-viewer.main') }}</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                  {{--</a>--}}
                  {{--<ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">--}}
                    {{--<li class="{{ Active::pattern('admin/log-viewer') }}">--}}
                      {{--<a href="{!! url('admin/log-viewer') !!}">{{ trans('menus.log-viewer.dashboard') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="{{ Active::pattern('admin/log-viewer/logs') }}">--}}
                      {{--<a href="{!! url('admin/log-viewer/logs') !!}">{{ trans('menus.log-viewer.logs') }}</a>--}}
                    {{--</li>--}}
                  {{--</ul>--}}
                {{--</li>--}}

              </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>
