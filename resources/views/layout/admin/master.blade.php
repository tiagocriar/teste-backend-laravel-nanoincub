<!DOCTYPE html>
<html class="dark">

<head>
    @include('layout-admin::head')
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    @include('layout-admin::sidenav.master')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        @include('layout-admin::navbar.master')


        <div class="w-full px-6 py-6 mx-auto">

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    @yield('main-content')
                </div>
            </div>

        </div>
    </main>
</body>

@include('layout-admin::js-includes')
@stack('scripts')

</html>
