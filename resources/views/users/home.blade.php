@extends('users.layout')




@section('body')
    <!-- start landing -->
    <div class="bg-[url(./images/headerBackgrond.png)] bg-no-repeat bg-cover overflow-x-hidden">
        <div class="bg-primaryColor relative grid place-content-center place-items-center">
            <div
                class="p-5 container flex flex-col gap-5 lg:flex-row justify-between items-center pb-[6rem] overflow-x-hidden">
                <img src="./images/shapes.svg" alt="img" class="absolute top-0 left-0" />
                <img src="./images/bar.svg" alt="image" class="absolute -top-[12.5rem] -right-5" />
                <img src="./images/circleGray.svg" alt="image" class="absolute top-[30rem] right-[10rem]" />
                <div class="basis-[50%] overflow-x-hidden">
                    <img src="{{ path(home('header_img')) }}" alt="image" class="  " />
                </div>
                <div class="basis-[50%]">
                    <p class="text-[24px] font-[700] text-[#042E6F]">ابدأ بالنجاح</p>
                    <p class="text-[35px] lg:text-[45px] font-[700] text-[#000] leading-[55px] mb-5 max-w-[558px]">
                        {{ home('header_title') }}
                    </p>

                    <p class="text-[16px] md:text-[16px] font-[400] text-[#fff] max-w-[558px]">
                        {{ home('header_dis') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing -->

    <!-- start about us -->
    <div class="p-5 container flex flex-col md:flex-row gap-5 justify-center mt-32">
        <div
            class="shadow-[0px_8px_16px_0px_rgba(0,_0,_0,_0.08),_0px_0px_4px_0px_rgba(0,_0,_0,_0.04)] bg-white flex flex-col gap-3 w-fit min-h-[316px] justify-center items-center p-10 rounded-[20px] flex-grow max-w-[557px] relative">
            <img src="./images/silverCircle.svg" alt="img" class="absolute -top-24 left-[50%] z-[-10]" />
            <img src="./images/blueShadow.svg" alt="img" class="absolute -bottom-24 -right-20 z-[-10]" />
            <img src="./images/aboutHome.svg" alt="Frame1" />
            <div id="HFeaturetitleSec"
                class="text-right text-2xl font-bold tracking-[0.1] leading-[32px] text-[#042e6f] z-20">
                من نحنا
            </div>
            <div class="bg-[#ef8b1d] w-12 h-[2px]"></div>
            <div class="text-center text-xl tracking-[0.2] leading-[25px] lg:w-3/4">
                {{ home('about_dis') }}
            </div>
        </div>
        <div
            class="shadow-[0px_8px_16px_0px_rgba(0,_0,_0,_0.08),_0px_0px_4px_0px_rgba(0,_0,_0,_0.04)] bg-white flex flex-col gap-3 w-fit min-h-[316px] justify-center items-center p-10 rounded-[20px] flex-grow max-w-[557px] relative">
            <img src="./images/smallSilverCircle.svg" alt="img" class="absolute -top-24 left-[40%] z-[-10]" />
            <img src="./images/blueCircle.svg" alt="img" class="absolute -bottom-24 -right-0 z-[-10]" />
            <img src="./images/servicesHome.svg" alt="Frame1" />
            <div id="HFeaturetitleSec" class="text-right text-2xl font-bold tracking-[0.1] leading-[32px] text-[#042e6f]">
                خدماتنا
            </div>
            <div class="bg-[#ef8b1d] w-12 h-[2px]"></div>
            <div class="text-center text-xl tracking-[0.2] leading-[25px] lg:w-3/4">
                {{ home('our_services_dis') }}
            </div>
        </div>
    </div>
    <!-- end about us  -->

    <div class="bg-[url(./images/wave_background.svg)] bg-no-repeat bg-cover my-10 p-10">
        <div class="container flex flex-col lg:flex-row items-center justify-between">
            <div>
                <p class="text-[28px] md:text-[32px] font-[400] text-black max-w-[450px]">
                    ما الذي <span class="text-[#EF8B1D]"> يميزنا ؟</span>
                </p>
                <div class="flex items-center justify-between">
                    <img src="./images/icon1.svg" alt="image" class="w-24 mt-5" />
                    <p class="text-[16px] lg:text-[16px] font-[400] text-[#696984] max-w-[380px]">
                        وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية
                        هيالشكلوليسالمحتوى)
                    </p>
                </div>
                <div class="flex items-center justify-center">
                    <img src="./images/icon2.svg" alt="image" class="w-24 mt-5" />
                    <p class="text-[16px] lg:text-[16px] font-[400] text-[#696984] max-w-[380px]">
                        وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية
                        هيالشكلوليسالمحتوى)
                    </p>
                </div>
                <div class="flex items-center justify-center">
                    <img src="./images/icon1.svg" alt="image" class="w-24 mt-5" />
                    <p class="text-[16px] lg:text-[16px] font-[400] text-[#696984] max-w-[380px]">
                        وريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية
                        هيالشكلوليسالمحتوى)
                    </p>
                </div>
            </div>
            <div>
                <img src="./images/people.svg" alt="image" />
            </div>
        </div>
    </div>

    <!-- start what is say  -->
    @include('users.say')
    <!-- end what is say  -->

    <!-- start contact us  -->
    <div id="contact" class="p-5 container my-20 lg:my-10">
        <div
            class="bg-[url('./images/rectangle.svg')] bg-cover bg-no-repeat bg-right flex flex-col lg:flex-row items-center justify-between gap-5 p-5 rounded-xl relative">
            <div class="p-10">
                <p class="text-[32px] lg:text-[45px] font-[700] text-white">
                    ابق على اتصال
                </p>
                <p class="border-solid border-t-2 border-[#ef8b1d] w-12 h-1" />
                <p class="mt-5 text-[16px] lg:text-[16px] font-[400] text-white max-w-[480px]">
                    {{ home('call_dis') }}
                </p>
                <div class="flex gap-5 items-center mt-5">
                    <img src="./images/home.svg" alt="image" class="max-w-[3.5rem]" />
                    <div>
                        <p class="text-[16px] md:text-[24px] text-[white] font-[700]">
                            تفضل بزيارتنا :
                        </p>
                        <p class="text-[14px] md:text-[19px] text-[#C0C0C0] font-[700]">
                            {{ home('call_adress') }}
                        </p>
                    </div>
                </div>
                <div class="flex gap-5 items-center mt-5">
                    <img src="./images/email.svg" alt="image" class="max-w-[3.5rem]" />
                    <div>
                        <p class="text-[16px] md:text-[24px] text-[white] font-[700]">
                            ارسل لنا :
                        </p>
                        <p class="text-[14px] md:text-[19px] text-[#C0C0C0] font-[700]">
                            {{ home('call_email') }}
                        </p>
                    </div>
                </div>
                <div class="flex gap-5 items-center mt-5">
                    <img src="./images/phone.svg" alt="image" class="max-w-[3.5rem]" />
                    <div>
                        <p class="text-[16px] md:text-[24px] text-[white] font-[700]">
                            اتصل بنا :
                        </p>
                        <p class="text-[14px] md:text-[19px] text-[#C0C0C0] font-[700]">
                            {{ home('call_phone') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg p-5 rounded-xl mb-10">
                <form class="flex flex-col gap-5" method="post" action="send_message">

                    @csrf
                    <input type="text" name="name" placeholder=" الاسم"
                        class="border-2 p-5 outline-none lg:min-w-[480px]" required />
                    <input name="email" type="email" placeholder=" البريد الإلكتروني"
                        class="border-2 p-5 outline-none lg:min-w-[480px]" required />
                    <input name="phone" type="text" placeholder=" تلفون"
                        class="border-2 p-5 outline-none lg:min-w-[480px]" required />
                    <textarea name="message" placeholder="رسالة" class="border-2 p-5 outline-none lg:min-w-[480px] min-h-[12rem]"
                        required></textarea>
                    <star-rating>
                        <label for="rating-1">1</label>
                        <input type="radio" id="rating-1" name="star" value="1" />
                        <label for="rating-2">2</label>
                        <input type="radio" id="rating-2" name="star" value="2" />
                        <label for="rating-3">3</label>
                        <input type="radio" id="rating-3" name="star" value="3" />
                        <label for="rating-4">4</label>
                        <input type="radio" id="rating-4" name="star" value="4" />
                        <label for="rating-5">5</label>
                        <input type="radio" id="rating-5" name="star" value="5" />
                    </star-rating>
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                required />
                        </div>
                        <label for="remember" class="ms-2 font-medium text-[#042E6F]">لقد قرأت وأوافق على سياسة
                            الخصوصية.</label>
                    </div>
                    <button type="submit"
                        class="text-white bg-[#042E6F] rounded-[10px] font-medium text-sm sm:w-auto px-5 py-2.5 text-center w-fit mr-auto">
                        ارسل رسالة
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- end contact us  -->
@endsection
