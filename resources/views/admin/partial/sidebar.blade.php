<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->
    <div class="sidebar-content">
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                @role('admin')
                <li class="nav-item">
                    <a href="{{ URL::route('admin.user.index') }}" class="nav-link @active_menu_class('admin.user')">
                        <i class="icon-users2"></i>
                        <span>@lang('common.sidebar.users')</span>
                    </a>
                </li>
                @endrole
                <li class="nav-item">
                    <a href="{{ URL::route('admin.order.index') }}" class="nav-link @active_menu_class('admin.product')">
                        <i class="icon-filter4"></i>
                        <span>@lang('common.sidebar.orders')</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::route('admin.notification.index') }}" class="nav-link @active_menu_class('admin.notification')">
                        <i class="icon-bell3"></i>
                        <span>@lang('common.sidebar.notifications')</span>
                    </a>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a href="{{ URL::route('admin.setting.index') }}" class="nav-link @active_menu_class('admin.setting')">
                        <i class="icon-cog"></i>
                        <span>@lang('common.sidebar.settings')</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
    </div>
</div>
