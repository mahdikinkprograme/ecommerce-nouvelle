<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li  class="active ">
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li   class="active ">
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>

                        <li   class="active ">
                            <a href="{{ route('livewire.admincreate')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('admin create') }}</p>
                            </a>
                        </li>

                        <li   class="active ">
                            <a href="{{ route('livewire.showproduct')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('show product') }}</p>
                            </a>
                        </li>

                        <li   class="active ">
                            <a href="{{ route('livewire.multiimg')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('add multiimg') }}</p>
                            </a>
                        </li>

                       
                    </ul>
                </div>
            </li>
            <li  class="active ">
                <a href="{{ route('livewire.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li  class="active ">
                <a href="{{ route('livewire.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li  class="active ">
                <a href="{{ route('livewire.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li  class="active ">
                <a href="{{ route('livewire.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li  class="active ">
                <a href="{{ route('livewire.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li  class="active ">
                <a href="{{ route('livewire.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class="active bg-info">
                <a href="{{ route('livewire.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>
