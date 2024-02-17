@extends('users.layout')


@section('body')
    <!-- start landing -->
    <div class="bg-[url(../images/headerBackgrond.png)] bg-no-repeat bg-cover">
        <div class="bg-primaryColor relative grid place-content-center place-items-center">
            <div class="p-5 container flex flex-col gap-10 lg:flex-row justify-between items-center pb-[6rem]">
                <img src="../images/shapes.svg" alt="img" class="absolute top-0 left-0" />

                <div class="basis-[40%]">
                    <img src="{{ path(variable('header_services_img')) }}" alt="image" class="  " />
                </div>
                <div class="basis-[60%]">
                    <p class="text-[24px] font-[700] text-[#042E6F] mb-5">خدماتنا</p>

                    <p class="text-[20px] font-[400] text-[#fff] max-w-[558px]">
                        {{ variable('header_services_dis') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing -->

    <!-- start services  -->
    <div class="relative my-10">
        <img src="../images/silverCircle.svg" alt="image" class="absolute top-10 -right-20" />
        <img src="../images/smallgray.svg" alt="image" class="absolute top-5 left-[30%]" />
        <div class="">
            <div class="flex flex-col justify-center items-center gap-2">
                <p class="text-[32px] md:text-[48px] text-[#000] font-[700]">
                    الخدمات
                </p>
                <img src="../images/curveLine.svg" alt="image" />
            </div>

            @foreach (App\Models\service::orderBy("order" , "ASC")->get() as $service)
                @if ($loop->index % 2 == 0)
                    <div
                        class="p-5 container flex flex-col lg:flex-row justify-center items-center gap-[15%] gap-y-10 my-20">
                        <img src="{{ path($service->img) }}" alt="img" class="max-w-[50%] min-w-[300px]" />
                        <div>
                            <div class="flex flex-col justify-center gap-2 mb-3">
                                <p class="text-[32px] md:text-[48px] text-[#000] font-[700]">
                                    {{ $service->title }}
                                </p>
                                <img src="../images/curveLine.svg" alt="image" class="w-fit" />

                            </div>
                            <p class="text-[16px] text-[#000] font-[500] max-w-[540px]">
                                <?= $service->dis ?>
                            </p>

                            @if ($service->link != null)
                                <a target="_blank"  href="{{ $service->link }}">
                                    <div
                                        class="bg-[#042E6F] flex items-center gap-4 rounded-full p-5 w-fit mt-5 px-7 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M9.41683 16.0748C9.26405 15.922 9.18405 15.7276 9.17683 15.4915C9.16961 15.2553 9.24267 15.0609 9.396 14.9081L13.4793 10.8248H4.16683C3.93072 10.8248 3.73267 10.7448 3.57267 10.5848C3.41267 10.4248 3.33294 10.227 3.3335 9.99145C3.3335 9.75534 3.4135 9.55729 3.5735 9.39729C3.7335 9.23729 3.93128 9.15757 4.16683 9.15812H13.4793L9.396 5.07479C9.24322 4.92201 9.17017 4.72757 9.17683 4.49145C9.1835 4.25534 9.2635 4.0609 9.41683 3.90812C9.56961 3.75534 9.76405 3.67896 10.0002 3.67896C10.2363 3.67896 10.4307 3.75534 10.5835 3.90812L16.0835 9.40812C16.1668 9.47757 16.226 9.56451 16.261 9.66895C16.296 9.7734 16.3132 9.8809 16.3127 9.99145C16.3127 10.1026 16.2954 10.2067 16.261 10.304C16.2266 10.4012 16.1674 10.4915 16.0835 10.5748L10.5835 16.0748C10.4307 16.2276 10.2363 16.304 10.0002 16.304C9.76405 16.304 9.56961 16.2276 9.41683 16.0748Z"
                                                fill="white" />
                                        </svg>
                                        <p class="text-[16px] text-[white] font-[700]">شاهد المزيد</p>
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>
                @else
                    <div class="bg-[url(../images/wave_background.svg)] bg-no-repeat bg-cover my-10 py-10 relative">
                        <div
                            class="p-5 container flex flex-col lg:flex-row justify-center items-center gap-[5%] gap-y-10 my-20">
                            <div>
                                <div class="flex flex-col justify-center gap-2 mb-3">
                                    <p class="text-[32px] md:text-[48px] text-[#000] font-[700]">
                                        {{ $service->title }}
                                    </p>
                                    <img src="../images/curveLine.svg" alt="image" class="w-fit" />
                                </div>
                                <p class="text-[16px] text-[#000] font-[500] max-w-[540px]">
                                    <?= $service->dis ?>
                                </p>
                                @if ($service->link != null)
                                    <a target="_blank" href="{{ $service->link }}">
                                        <div
                                            class="bg-[#042E6F] flex items-center gap-4 rounded-full p-5 w-fit mt-5 px-7 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M9.41683 16.0748C9.26405 15.922 9.18405 15.7276 9.17683 15.4915C9.16961 15.2553 9.24267 15.0609 9.396 14.9081L13.4793 10.8248H4.16683C3.93072 10.8248 3.73267 10.7448 3.57267 10.5848C3.41267 10.4248 3.33294 10.227 3.3335 9.99145C3.3335 9.75534 3.4135 9.55729 3.5735 9.39729C3.7335 9.23729 3.93128 9.15757 4.16683 9.15812H13.4793L9.396 5.07479C9.24322 4.92201 9.17017 4.72757 9.17683 4.49145C9.1835 4.25534 9.2635 4.0609 9.41683 3.90812C9.56961 3.75534 9.76405 3.67896 10.0002 3.67896C10.2363 3.67896 10.4307 3.75534 10.5835 3.90812L16.0835 9.40812C16.1668 9.47757 16.226 9.56451 16.261 9.66895C16.296 9.7734 16.3132 9.8809 16.3127 9.99145C16.3127 10.1026 16.2954 10.2067 16.261 10.304C16.2266 10.4012 16.1674 10.4915 16.0835 10.5748L10.5835 16.0748C10.4307 16.2276 10.2363 16.304 10.0002 16.304C9.76405 16.304 9.56961 16.2276 9.41683 16.0748Z"
                                                    fill="white" />
                                            </svg>
                                            <p class="text-[16px] text-[white] font-[700]">شاهد المزيد</p>
                                        </div>
                                    </a>
                                @endif

                            </div>
                            <img src="{{ path($service->img) }}" alt="img" class="max-w-[50%] min-w-[300px]" />
                        </div>
                    </div>
                @endif
            @endforeach





        </div>
    </div>
    <!-- end services  -->
@endsection
