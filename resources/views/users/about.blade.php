@extends('users.layout')

{{-- @section('active')
    <span class="w-[45px] h-[8px] bg-[#EF8B1D] rounded-[4px] absolute top-[182%] left-[50%] translate-x-[-50%]"></span>
@endsection --}}

@section('body')

    <body>


        <!-- start landing -->
        <div class="bg-[url(../images/headerBackgrond.png)] bg-no-repeat bg-cover">
            <div class="bg-primaryColor relative grid place-content-center place-items-center">
                <div class="p-5 container flex flex-col gap-10 lg:flex-row justify-between items-center pb-[6rem]">
                    <img src="../images/shapes.svg" alt="img" class="absolute top-0 left-0" />

                    <div class="basis-[40%]">
                        <img src="{{ path(variable('header_about_img')) }}" alt="image" class="  " />
                    </div>
                    <div class="basis-[60%]">
                        <p class="text-[24px] font-[700] text-[#042E6F] mb-5">عن الكامل</p>

                        <p class="text-[20px] font-[400] text-[#fff] max-w-[558px]">
                            {{ variable('header_about_dis') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end landing -->

        <!-- start about office -->
        <div id="office" class="p-5 container flex flex-col lg:flex-row justify-center items-center gap-[15%] gap-y-10 my-10">
            <div>
                <p class="text-[#042E6F] text-[32px] lg:text-[48px] font-[700]">
                    عن المكتب
                </p>


                <div class="text-[#000000] text-[18px] lg:text-[24px] font-[400] max-w-[450px]">
                    <?= variable('sec2_about_dis') ?>
                </div>
                <div class="bg-[#042E6F] flex items-center gap-4 rounded-full p-5 w-fit mt-5 px-7 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M9.41683 16.0748C9.26405 15.922 9.18405 15.7276 9.17683 15.4915C9.16961 15.2553 9.24267 15.0609 9.396 14.9081L13.4793 10.8248H4.16683C3.93072 10.8248 3.73267 10.7448 3.57267 10.5848C3.41267 10.4248 3.33294 10.227 3.3335 9.99145C3.3335 9.75534 3.4135 9.55729 3.5735 9.39729C3.7335 9.23729 3.93128 9.15757 4.16683 9.15812H13.4793L9.396 5.07479C9.24322 4.92201 9.17017 4.72757 9.17683 4.49145C9.1835 4.25534 9.2635 4.0609 9.41683 3.90812C9.56961 3.75534 9.76405 3.67896 10.0002 3.67896C10.2363 3.67896 10.4307 3.75534 10.5835 3.90812L16.0835 9.40812C16.1668 9.47757 16.226 9.56451 16.261 9.66895C16.296 9.7734 16.3132 9.8809 16.3127 9.99145C16.3127 10.1026 16.2954 10.2067 16.261 10.304C16.2266 10.4012 16.1674 10.4915 16.0835 10.5748L10.5835 16.0748C10.4307 16.2276 10.2363 16.304 10.0002 16.304C9.76405 16.304 9.56961 16.2276 9.41683 16.0748Z"
                            fill="white" />
                    </svg>
                    <p class="text-[16px] text-[white] font-[700]">انضم الينا</p>
                </div>
            </div>
            <div class="relative">
                <img src="{{ path(variable('sec2_about_img')) }}" alt="image" />
                <img src="../images/blueCircle.svg" alt="img" class="absolute -bottom-20 -right-16 z-[-1]" />
            </div>
        </div>
        <!-- end about office -->

        <!-- start goals -->
        <div class="bg-[url(../images/wave_background.svg)] bg-no-repeat bg-cover my-10 pt-10 relative">
            <img src="../images/silverCircle.svg" alt="image" class="absolute top-[100%] right-20 z-[-1]" />
            <div class="p-5 container">
                <div class="flex flex-col justify-center items-center gap-5">
                    <p class="text-[32px] md:text-[48px] text-[#000] font-[700]">
                        مهمتنا و اهدافنا
                    </p>
                    <img src="../images/curveLine.svg" alt="image" />
                </div>
                <p class="text-[#222222] text-[16px] md:text-[24px] font-[400] max-w-[1000px] text-center mx-auto mt-5">
                    {{ variable('mission_dis') }}
                </p>
                <div class="flex gap-4">
                    <button class="prev" onclick="increaseScrollbar()">&#10094;</button>
                    <div class="flex items-center my-10 gap-5 overflow-hidden scrollbar relative">
                        @foreach (App\Models\mission::get() as $mission)
                            <div
                                class="bg-white rounded-lg p-8 hover:bg-[#EF8B1D] transition-all duration-100 group min-w-[300px]">
                                <div class="flex gap-5 items-center">
                                    <img src="../images/statistcs.svg" alt="image" />
                                    <p class="text-[20px] md:text-[24px] font-[700] text-[#000] group-hover:text-white">
                                        {{ $mission->title }}
                                    </p>
                                </div>
                                <p class="font-[500] text-[#717171] group-hover:text-white text-[16px] my-5 max-w-[290px]">
                                    {{ $mission->dis }}
                                </p>

                            </div>
                        @endforeach
                    </div>
                    <button class="next" onclick="decreaseScrollbar()">&#10095;</button>
                </div>

                <button
                    class="bg-[#042E6F] flex items-center gap-4 rounded-full py-3 px-10 w-fit mt-5 mx-auto text-[16px] text-[white] font-[700]">
                    اشترك الان مجانا
                </button>
            </div>
        </div>
        <!-- end goals  -->

        <!-- start what is say  -->
        @include('users.say')
        <!-- end what is say  -->

        <!-- start penefits -->
        <div>
            <div>
                <p class="text-[32px] md:text-[48px] text-[#042E6F] font-[700] mt-10 text-center">
                    ما الذي يميزنا
                </p>

                <div class="w-fit mx-auto my-2 p-5">

                    <p class="text-[20px] text-[#000] font-[500] max-w-[500px] text-center mx-auto mt-0">
                        {{ variable('distinguishes_dis') }}
                    </p>
                </div>
                <div
                    class="p-5 container my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-5 place-content-center place-items-center relative">

                    @foreach (App\Models\feature::get() as $feature)
                    <div class="@if ($loop->index%2 ==0)
                    bg-[#FDF3E8]
                    @else
                    border border-[#F2F2F2]
                    @endif rounded-lg p-5 flex flex-col gap-3">
                        <p class="text-[34px] text-[#042E6F] font-[500] bg-[url(../images/shape1.svg)] bg-no-repeat w-fit">
                            0{{$loop->index + 1}}
                        </p>
                        <p class="text-[24px] text-[#141414] font-[500]">{{$feature->title}}</p>
                        <p class="text-[16px] text-[#000] font-[500]">
                            {{$feature->dis}}
                        </p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end penifits  -->

    </body>
@endsection
