@extends('layout-admin::master')
@section('main-content')
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-xl bg-clip-border">
        <div class="flex-auto p-4">
            <a href="{{ route('administrador.funcionario.create') }}" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-red-600 to-red-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">
                Novo
            </a>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-xl bg-clip-border">
        <div class="flex-auto px-0 pt-0 pb-2">
            @include('administrador-funcionario::index-content.search')

            @include('administrador-funcionario::index-content.desktop')
            @include('administrador-funcionario::index-content.mobile')
        </div>
    </div>
@endsection
