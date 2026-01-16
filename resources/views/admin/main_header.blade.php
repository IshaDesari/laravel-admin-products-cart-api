<div class="header">
    <nav class="navbar py-2">
        <div class="container-fluid container-xxl=">

            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">


                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <div class="mb-0 text-end line-height-sm">
                            <span class="font-weight-bold">
                                {{ Auth::user()->name }}
                            </span>
                        </div>
                        <small>{{ Auth::user()->name }}</small>
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button"
                        data-bs-toggle="dropdown" data-bs-display="static">
                        <img class="avatar lg rounded-circle img-thumbnail" alt="profile"
                            @if (Auth::user()->profilepicture) src="{{ asset('images/user/' . Auth::user()->profilepicture) }}"
                            @else src="{{ asset('dist/images/default-userprofile.png') }}" @endif>
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w280 p-0 m-0">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1=">
                                    <img class="avatar rounded-circle mt-1" alt="profile"
                                        @if (Auth::user()->profilepicture) src="{{ asset('images/user/' . Auth::user()->profilepicture) }}"
                                        @else src="{{ asset('dist/images/default-userprofile.png') }}" @endif>
                                    <div class="flex-fill ms-2 p-0">
                                        <div class="mb-0 pt-2=">
                                            <strong>
                                               {{ Auth::user()->name }}
                                            </strong>
                                        </div>
                                        <small class="">{{ Auth::user()->email }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group m-2">
                                <hr class="dropdown-divider border-dark m-0">

                                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action border-0"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icofont-logout fs-6 me-2"></i>Signout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>

            <!-- main menu change financial year -->
            <div class="order-0 col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2 mb-md-0">
                {{-- <form action="{{ route('changeFY') }}" method="post">
                    @csrf()
                    <select name="financial_year" id="financial_year" class="form-select form-select-sm bg-lightyellow"
                        style="font-size: 14px" onchange="if(this.value) { this.form.submit(); }">
                        <option value=""> - - Select Financial Year - - </option>
                        @for ($FY = 2023; $FY <= date('Y'); $FY++)
                            <option value="{{ $FY }}" @selected($financial_year == $FY)>
                                FY [ 01 Apr, {{ $FY }} - 31 Mar, {{ $FY + 1 }} ]
                            </option>
                        @endfor
                    </select>
                </form> --}}
            </div>

        </div>
    </nav>
</div>
