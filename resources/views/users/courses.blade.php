@extends('users.layout')


@section('body')
    <!-- start landing -->
    <div class="bg-[url(../images/headerBackgrond.png)] bg-no-repeat bg-cover">
        <div class="bg-primaryColor relative grid place-content-center place-items-center">
            <div class="p-5 container flex flex-col gap-10 lg:flex-row justify-between items-center pb-[6rem]">
                <img src="../images/shapes.svg" alt="img" class="absolute top-0 left-0" />

                <div class="basis-[40%]">
                    <img src="{{ path(variable('header_courses_img')) }}" alt="image" class="  " />
                </div>
                <div class="basis-[60%]">
                    <p class="text-[24px] font-[700] text-[#042E6F] mb-5">دوراتنا التدريبة</p>

                    <p class="text-[20px] font-[400] text-[#fff] max-w-[558px]">
                        {{ variable('header_courses_dis') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing -->

    <!-- start courses  -->
    <div class="relative my-10">
        <img src="../images/silverCircle.svg" alt="image" class="absolute top-10 right-20 z-[-1]" />
        <img src="../images/smallgray.svg" alt="image" class="absolute top-5 left-[30%] z-[-1]" />
        <div class="">
            <div class="flex flex-col justify-center items-center gap-2">
                <p class="text-[32px] md:text-[48px] text-[#000] font-[700] mt-10">
                    دوراتنا التدريبة
                </p>
                <img src="../images/curveLine.svg" alt="image" />
            </div>
            <div class="w-fit mx-auto my-5 p-5">
                <p class="text-[20px] lg:text-[32px] text-[#000] font-[500] max-w-[600px] text-center mx-auto">
                    {{ variable('courses_dis') }}
                </p>

            </div>
            <div
                class="p-5 container my-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-1 gap-y-5 place-content-center place-items-center relative">

                @foreach (App\Models\course::get() as $course)
                    <div class="flex flex-col gap-4">
                        <div class="max-w-[330px] md:max-w-[376px] max-h-[253px] overflow-hidden">
                            <img src="{{ path($course->img) }}" alt=""
                                class="w-full h-full hover:scale-105 cursor-pointer transition-all duration-100" />
                        </div>

                        <p class="text-[24px] text-[#000] font-[700] max-w-[330px]">
                            {{ $course->title }}
                        </p>
                        <p class="text-[16px] text-[#000] font-[500] max-w-[330px]">
                            {{ $course->short_dis }}

                        </p>
                        <a href="/courses/{{ $course->slug }}">
                            <button
                                class="border-2 border-[#042E6F] flex items-center gap-4 rounded-full py-4 w-fit px-7 group hover:bg-[#042E6F] text-[#042E6F] hover:text-white transition-all duration-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" class="fill-[#042E6F] group-hover:fill-[white]">
                                    <path
                                        d="M9.41634 16.0833C9.26357 15.9306 9.18357 15.7361 9.17634 15.5C9.16912 15.2639 9.24218 15.0694 9.39551 14.9167L13.4788 10.8333H4.16634C3.93023 10.8333 3.73218 10.7533 3.57218 10.5933C3.41218 10.4333 3.33246 10.2356 3.33301 10C3.33301 9.76389 3.41301 9.56583 3.57301 9.40583C3.73301 9.24583 3.93079 9.16611 4.16634 9.16667H13.4788L9.39551 5.08333C9.24273 4.93056 9.16968 4.73611 9.17634 4.5C9.18301 4.26389 9.26301 4.06944 9.41634 3.91667C9.56912 3.76389 9.76357 3.6875 9.99968 3.6875C10.2358 3.6875 10.4302 3.76389 10.583 3.91667L16.083 9.41667C16.1663 9.48611 16.2255 9.57306 16.2605 9.6775C16.2955 9.78194 16.3127 9.88944 16.3122 10C16.3122 10.1111 16.295 10.2153 16.2605 10.3125C16.2261 10.4097 16.1669 10.5 16.083 10.5833L10.583 16.0833C10.4302 16.2361 10.2358 16.3125 9.99968 16.3125C9.76357 16.3125 9.56912 16.2361 9.41634 16.0833Z" />
                                </svg>
                                <p class="text-[16px]  font-[700]">شاهد المزيد</p>
                            </button>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- end courses  -->
@endsection
