@extends('layout-login::master')
@section('form-content')
    <div class="p-6 pb-0 mb-0">
        <h4 class="font-bold">Login</h4>
        <p class="mb-0">Faça login com seu usuário e senha</p>
    </div>
    <div class="flex-auto p-6">
        <form role="form">
            <div class="mb-4">
                <input type="username" placeholder="Usuário" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
            </div>
            <div class="mb-4">
                <input type="password" placeholder="Senha" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
            </div>
            <div class="text-center">
                <button type="button" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                    Entrar
                </button>
            </div>
        </form>
    </div>
@endsection
