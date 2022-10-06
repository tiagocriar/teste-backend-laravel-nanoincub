<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo/iso-logo-nanoincub.png') }}" />
<link rel="icon" type="image/png" href="{{ asset('img/logo/iso-logo-nanoincub.png') }}" />
<title>{{ isset($title) ? ($title . ' | ' . config('app.name')) : config('app.name') }}</title>
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Nucleo Icons -->
<link href="{{ asset('argon2') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="{{ asset('argon2') }}/assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('css/datapicker/app.css') }}">

<!-- Main Styling -->
<link href="{{ mix('css/tailwind.css') }}" rel="stylesheet" />
