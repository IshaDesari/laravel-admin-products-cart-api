<?php $page = Route::current()->getName(); ?>

{{-- @if ($page != 'dgrs.index' && $page != 'dgrs.import' && $page != 'dgrs.trash') --}}

<div class="sidebar px-3 pt-4 pt-md-3 pb-0 pb-md-0 me-0 gradient">
    {{-- <div class="sidebar px-3 pt-3 pt-md-2 pb-0 pb-md-0 me-0 gradient="> --}}
    <div class="d-flex flex-column h-100">
        <div align="center">
            <span class="badge alert-light">
                {{ Auth::user()->name }}
            </span>
        </div>

        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3 mb-0">
            <li>
                <a @if ($page == 'admin.dashboard') class="m-link active" @else class="m-link" @endif
                    href="{{ route('admin.dashboard') }}" title="Dashboard">
                    <i class="icofont-home fs-6"></i>
                    <span>Dashboard</span>
                </a>
            </li>



            {{-- @can('user-read')
                <li>
                    <a @if ($page == 'users.index' || $page == 'users.trash') class="m-link active" @else class="m-link" @endif
                        href="{{ route('users.index') }}" title="Users">
                        <i class="icofont-users-alt-5 fs-6"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endcan --}}


            {{-- <hr class="dropdown-divider border-light"> --}}


            {{-- <li>
                        <a @if ($page == 'customers.index') class="m-link active" @else class="m-link" @endif
                            href="{{ route('customers.index') }}" title="Customer">
                            <i class="icofont-contacts fs-6"></i>
                            <span>Customers</span>
                        </a>
                    </li> --}}


            <hr class="dropdown-divider border-light">




            <li>
                <a @if ($page == 'products.index') class="m-link active" @else class="m-link" @endif
                    href="{{ route('products.index') }}" title="Products">
                    <i class="icofont-shopping-cart fs-6"></i>
                    <span>Products</span>
                </a>
            </li>


        </ul>

        <!-- Menu: menu collapse btn -->
        <button class="btn btn-sm btn-link= sidebar-mini-btn text-light m-0 p-0" title="Sidebar Expand / Collapse"
            style="line-height: 24px">
            <span class="p-0 m-0"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
{{-- @endif --}}
