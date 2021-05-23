<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('acetate/public/img/favicon.png') }}">

  <title>{{ config('app.name', 'My Site') }}</title>

  <!-- Vuetify Styles and Material Design Icons -->
  <link href="{{ asset('acetate/public/css/styles.css') }}" rel="stylesheet">
  <!-- Custom Styles and Flaticons -->
  <link href="{{ asset('acetate/public/css/app.css') }}" rel="stylesheet">

</head>

<body>

  <div id="app">
  </div>

  <script src={{ asset('acetate/public/js/app.js') }}></script>
</body>

</html>
