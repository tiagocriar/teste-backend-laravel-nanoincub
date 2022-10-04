<!DOCTYPE html>
<html>
  <head>
    @include('layout-admin::head')
  </head>

  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section>
        <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
          <div class="container z-1">
            <div class="flex flex-wrap -mx-3">
              <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                    @yield('form-content')
                </div>
              </div>
              <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                <div style="background-image: url('{{ asset('img/login/img-side.jpg') }}')" class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden rounded-xl ">
                  <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                  <h4 class="z-20 font-bold text-white">"Crescendo em comunidade"</h4>
                  <p class="z-20 text-white "><b>Bônus Incub!</b> Nossa plataforma de crescimento e sucesso compartilhado.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>

  @include('layout-admin::js-includes')
  @stack('scripts')
</html>
