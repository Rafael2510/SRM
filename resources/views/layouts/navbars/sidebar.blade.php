<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      {{ __('Flores') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item @if ($activePage == 'users' || $activePage == 'profile' ) class="active  @endif>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li @if ($activePage == 'profile') class="active " @endif>
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-normal">{{ __('Perfil') }} </span>
              </a>
            </li>
          <li @if ($activePage == 'profile') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.user.index') }}">
              <span class="sidebar-normal">{{ __('Usuários') }} </span>
            </a>
          </li>
          <li @if ($activePage == 'profile') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
              <span class="sidebar-normal">{{ __('Categorias') }} </span>
            </a>
          </li>
          <li @if ($activePage == 'profile') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.products.index') }}">
              <span class="sidebar-normal">{{ __('Produtos') }} </span>
            </a>
          </li>
          <li @if ($activePage == 'profile') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.services.index') }}">
              <span class="sidebar-normal">{{ __('Serviços') }} </span>
            </a>
          </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
