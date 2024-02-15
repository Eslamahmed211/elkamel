<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <title>{{ get_title() }}</title>
    <link rel="icon" type="image/x-icon" href="{{ get_logo() }}">
    @yield('title')


    @include('admin.inc.head')

    @yield('css')



</head>

<body>

    <div class="layout"></div>

    <x-layout.nav></x-layout.nav>

    <x-admin.aside></x-admin.aside>


    <x-colors> </x-colors>


    <div class="content mt-0">

        <div class="path">
            @yield('path')
        </div>


        @yield('content')
    </div>




    @include('admin.inc.scripts')
    @include('admin/inc/errors')





    @yield('js')

</body>

</html>
