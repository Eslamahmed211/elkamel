<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ get_title() }}</title>
    <link rel="icon" type="image/x-icon" href="{{ get_logo() }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://zamzamfoods-eg.com/assets/sw/swiper-element.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/css/index.css" />
    <script src="/js/index.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Public Sans";
            direction: rtl;
            scroll-behavior: smooth !important;
        }

        .socal i {
            font-size: 20px;
            margin-top: 10px;
            margin-right: 10px;
        }

        .swal2-popup {
            width: 25em !important;
        }

        .logo {
            max-width: 150px;
            padding: 20px;
            object-fit: contain;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    container: {
                        center: true,
                    },
                },
            },
        };
    </script>
</head>

<body>
    <!-- start navbar  -->
    <div class="bg-[#EF8B1D] pb-1">
        <div class="relative lg:hidden">
            <div class="flex justify-between items-center px-5">
                <img src="{{ get_logo() }}" alt="image" class="-mr-8 logo" />
                <img id="menu" src="/images/hamburger.png" alt="image" class="w-8 cursor-pointer" />
            </div>
            <div id="links" class="absolute bg-[#EF8B1D] z-20 py-5 hidden">
                <ul class="flex flex-wrap gap-10 lg:hidden justify-center px-5">
                    <li class="relative">
                        <a href="/" class="text-[16px] font-[700] text-[#042E6F]">الرئيسية</a>
                    </li>
                    <li>
                        <a href="/about" class="text-[16px] font-[700] text-[#222]">عن الكامل</a>
                    </li>
                    <li>
                        <a href="/services" class="text-[16px] font-[700] text-[#222]">خدماتنا</a>
                    </li>
                    <li>
                        <a href="/projects" class="text-[16px] font-[700] text-[#222]">مشاريعنا</a>
                    </li>

                    <li>
                        <a href="/questions" class="text-[16px] font-[700] text-[#222] ">أسئلة شائعة</a>
                    </li>
                    <li>
                        <a href="/contactus" class="text-[16px] font-[700] text-[#222]">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="hidden bg-white lg:flex justify-between items-center px-20 rounded-t-[5px] rounded-b-[200px]">
            <li class="relative">
                <a href="/"
                    class="text-[16px] font-[700]  @if (request()->is('/')) text-[#042E6F]
                    @else
                    text-[#222] @endif ">الرئيسية</a>
                @if (request()->is('/'))
                    <span
                        class="w-[45px] h-[8px] bg-[#EF8B1D] rounded-[4px] absolute top-[182%] left-[50%] translate-x-[-50%]"></span>
                @endif
            </li>


            <li class="relative">
                <a href="/about"
                    class="text-[16px] font-[700] @if (request()->is('about')) text-[#042E6F]
                    @else
                    text-[#222] @endif  ">عن
                    الكامل</a>

                @if (request()->is('about'))
                    <span
                        class="w-[45px] h-[8px] bg-[#EF8B1D] rounded-[4px] absolute top-[182%] left-[50%] translate-x-[-50%]"></span>
                @endif
            </li>
            <li class="relative">
                <a href="/services"
                    class="text-[16px] font-[700] @if (request()->is('about')) text-[#042E6F]
                    @else
                    text-[#222] @endif  ">
                    خدمتنا</a>

                @if (request()->is('services'))
                    <span
                        class="w-[45px] h-[8px] bg-[#EF8B1D] rounded-[4px] absolute top-[182%] left-[50%] translate-x-[-50%]"></span>
                @endif
            </li>
            <li class="relative">
                <a href="/"><img class="logo" src="{{ get_logo() }}" /></a>
            </li>
            <li class="relative">

                <a href="/projects"
                    class="text-[16px] font-[700] @if (request()->is('about')) text-[#042E6F]
                @else
                text-[#222] @endif  ">
                    مشاريعنا</a>

                @if (request()->is('projects*'))
                    <span
                        class="w-[45px] h-[8px] bg-[#EF8B1D] rounded-[4px] absolute top-[182%] left-[50%] translate-x-[-50%]"></span>
                @endif


            </li>

            <li class="relative">

                <a href="/questions"
                    class="text-[16px] font-[700] @if (request()->is('about')) text-[#042E6F]
                @else
                text-[#222] @endif  ">أسئلة
                    شائعة</a>

                @if (request()->is('questions'))
                    <span
                        class="w-[45px] h-[8px] bg-[#EF8B1D] rounded-[4px] absolute top-[182%] left-[50%] translate-x-[-50%]"></span>
                @endif


            </li>
            <li class="relative">
                <a href="/contactus"
                    class="text-[16px] font-[700] @if (request()->is('contactus')) text-[#042E6F]
            @else
            text-[#222] @endif  ">تواصل
                    معنا</a>

                @if (request()->is('contactus'))
                    <span
                        class="w-[45px] h-[8px] bg-[#EF8B1D] rounded-[4px] absolute top-[182%] left-[50%] translate-x-[-50%]"></span>
                @endif
            </li>
        </ul>
    </div>
    <!-- end navbar -->

    @yield('body')


    <!-- start footer  -->
    <div class="mt-24 relative">
        <img src="/images/bgFooter.svg" alt="img"
            class="bg-cover bg-no-repeat w-full absolute top-0 left-0 z-[-1]" />
        <div class="p-5 container">
            <div
                class="bg-white p-10 rounded-[10px] flex flex-col lg:flex-row gap-5 justify-center items-center mt-[3.5rem] shadow-2xl">
                <form id="form" method="post" action="/email"
                    class="border-[2px] border-gray-400 py-1 px-2 flex items-center gap-3 md:min-w-[512px]">

                    @csrf
                    <div
                        class="max-w-[80px] md:max-w-[180px] bg-[#042E6F] rounded-[4px] flex justify-center text-white px-10 py-3 cursor-pointer">
                        <p class="whitespace-nowrap text-center" onclick="submit()">اشترك الأن</p>
                    </div>
                    <input type="email" name="email" required placeholder="ادخل البريد الالكتروني"
                        class="outline-none border-none flex-grow" />
                </form>
                <p class="text-[16px] lg:text-[32px] font-[400] text-[#0A142F]">
                    ابدء في التواصل معنا من هنا
                </p>
            </div>
            <div class="flex flex-col lg:flex-row justify-between items-center border-b py-10">
                <div class="socal">


                    @if (!empty(variable('x')))
                        <a target="_blank" href="{{ variable('x') }}"><i class="fa-brands fa-x-twitter fa-fw"></i></a>
                    @endif

                    @if (!empty(variable('youtube')))
                        <a target="_blank" href="{{ variable('youtube') }}"><i class="fab fa-youtube fa-fw"></i></a>
                    @endif
                    @if (!empty(variable('insta')))
                        <a target="_blank" href="{{ variable('insta') }}"><i class="fab fa-instagram fa-fw "></i></a>
                    @endif

                    @if (!empty(variable('facebook')))
                        <a target="_blank" href="{{ variable('facebook') }}"><i
                                class="fab fa-facebook fa-fw"></i></a>
                    @endif

                </div>


                <div class="flex flex-wrap gap-5 md:gap-10 lg:gap-20 items-center">
                    <p class="text-[16px] text-[#0A142F] font-[400]"><a href="/contactus">تواصل معنا</a></p>
                    <p class="text-[16px] text-[#0A142F] font-[400]"><a href="/projects">مشاريعنا</a></p>
                    <p class="text-[16px] text-[#0A142F] font-[400]"><a href="/services">خدماتنا</a></p>
                    <p class="text-[16px] text-[#0A142F] font-[400]"> <a href="/about#office">عن المكتب</a></p>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row justify-between items-center mt-5">
                {{-- <p>شروط الخدمة سياسة الخصوصية</p> --}}

                <div>
                    @foreach (App\Models\page::where('show', '1')->get() as $page)
                        <a style="margin-left: 10px" target="_blank"
                            href="/pages/{{ $page->slug }}">{{ $page->title }}</a>
                    @endforeach
                </div>


                <a href="/"><img class="logo" src="{{ get_logo() }}" alt="image" /></a>
                <p>© 2019 Lift Media. All rights reserved.</p>
            </div>
        </div>
    </div>
    <!-- end footer  -->

    <script src="{{ asset('assets/admin/js/sweetalert2.all.min.js') }}"></script>


    @include('admin/inc/errors')

    <script>
        function submit() {
            document.getElementById("form").submit()
        }
    </script>



</body>

</html>
