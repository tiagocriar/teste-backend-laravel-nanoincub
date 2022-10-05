<!-- Navbar -->
<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <nav>
        <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
      </nav>

      <div class="flex items-center justify-end mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
          <li class="flex items-center">
            <form id="logout-form" action="{{ route('administrador.logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                    <span class="hidden sm:inline">Sair</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
          </li>
        </ul>

      </div>
    </div>
  </nav>
<!-- end Navbar -->
