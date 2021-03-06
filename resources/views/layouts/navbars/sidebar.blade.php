<div class="sidebar" data-color="orange" data-background-color="white">
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      {{ __('SRM') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item">

      <li class="nav-item @if ($activePage == 'users' || $activePage == 'profile' ) class=" active @endif>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li @if ($activePage=='profile' ) @endif>
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-normal">{{ __('Perfil') }} </span>
              </a>
            </li>
          <li @if ($activePage == 'users') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.user.index') }}">
              <span class="sidebar-normal">{{ __('Usuários') }} </span>
            </a>
          </li>
          <li @if ($activePage == 'categories') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
              <span class="sidebar-normal">{{ __('Categorias') }} </span>
            </a>
          </li>
          <li @if ($activePage == 'products') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.products.index') }}">
              <span class="sidebar-normal">{{ __('Produtos') }} </span>
            </a>
          </li>
          <li @if ($activePage == 'services') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.services.index') }}">
              <span class="sidebar-normal">{{ __('Serviços') }} </span>
            </a>
          </li>
          <li @if ($activePage == 'history') class="active " @endif>
            <a class="nav-link" href="{{ route('admin.history.index') }}">
              <span class="sidebar-normal">{{ __('Histórico') }} </span>
            </a>
          </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>