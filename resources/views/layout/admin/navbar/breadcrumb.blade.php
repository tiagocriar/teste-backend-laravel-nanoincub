@if (isset($breadcrumbs))
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
        @foreach ($breadcrumbs as $breadcrumb)
            @if($loop->last)
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">
                    {{ $breadcrumb['title'] }}
                </li>
            @else
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
@endif
