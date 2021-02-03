<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Weibo App') - Laravel练手教程</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <style>

    </style>
</head>
<body>
@include("layouts._header")

<div class="container">
    <div class="offset-md-1 col-md-10">
        @yield('content')

        @include("layouts._footer")
    </div>
</div>


</body>
</html>
