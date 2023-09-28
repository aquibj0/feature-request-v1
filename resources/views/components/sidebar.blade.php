<div class="side-nav d-flex flex-column flex-shrink-0 p-3 text-black bg-white" style="width: 280px; height:100vh;border-right:1px solid #D0D5DD;">
    
    <a href="/" class="d-flex align-items-center justify-content-center mb-3  text-black text-decoration-none mx-auto">
        <x-application-logo width="65px" />
    </a>
    
    <hr class="section-divider">

    <ul class="nav nav-pills flex-column mb-auto mt-3">
        <li class="nav-item mb-1">
            <a href="/dashboard" class="nav-link text-gray-800 {{ (request()->is('dashboard')) ? 'active' : '' }}" aria-current="page">
                <i class="bi bi-speedometer2"></i>
                <span class="position-relative px-2 fw-500">Dashboard</span>
            </a>
        </li>
        <li class="nav-item mb-1">
            <a href="{{route('app.index')}}" class="nav-link text-gray-800 {{ (request()->is('dashboard/user-app')) ? 'active' : '' }}">
                <i class="bi bi-app"></i>
                <span class="position-relative px-2 fw-500">My App</span>
            </a>
        </li>
        <li  class="nav-item mb-1">
            <a href="{{route('feature-req.index')}}" class="nav-link text-gray-800 {{ (request()->is('dashboard/user-app/feature-request')) ? 'active' : '' }}">
                <i class="bi bi-journal-plus"></i>
                <span class="position-relative px-2 fw-500">Feature Requests</span>
            </a>
        </li>
        <li  class="nav-item mb-1">
            <a href="{{route('app.keys')}}" class="nav-link text-gray-800 {{ (request()->is('dashboard/user-app/access-keys')) ? 'active' : '' }}">
                <i class="bi bi-gear"></i>
                <span class="position-relative px-2 fw-500">Access Keys</span>
            </a>
        </li>
        <li  class="nav-item mb-2">
            <a href="{{route('app.use')}}" class="nav-link text-gray-800 {{ (request()->is('dashboard/user-app/how-to-use')) ? 'active' : '' }}">
                <i class="bi bi-hand-index"></i>
                <span class="position-relative px-2 fw-500">Docs</span>
            </a>
        </li>
    </ul>
    
    <hr class="section-divider">
    
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{Auth::user()->name}}</strong>            
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link class="dropdown-item" :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </li>
        </ul>
    </div>

</div>