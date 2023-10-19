<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @if(Session::has('pesan'))
    <div class="bg-green-200 text-green-800 p-4 my-4 rounded-lg shadow-md">
        {{ Session::get('pesan') }}
    </div>
@endif

@if(Session::has('delete'))
    <div class="bg-red-200 text-red-800 p-4 my-4 rounded-lg shadow-md">
        {{ Session::get('delete') }}
    </div>
@endif
  <title>Data Buku</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
</head>
<body class="bg-gray-100">
  
  @yield('content')

  <script type="text/javascript">
    $('.date').datepicker({
      format: 'yyyy/mm/dd',
      autoclose: true
    });
  </script>

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
