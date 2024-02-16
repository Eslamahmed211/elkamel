@extends('users.layout')


@section('body')
    <style>
        .swiper {
            width: 90%;
            height: 250px;
            padding: 10px 0px;
            box-shadow: -10px 20px 30px rgb(0 0 0 / 5%);
            margin-bottom: 20px;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-slide {
            border: 1px solid #edf0f4;
            padding: 5px;
            box-shadow: -10px 20px 30px rgb(0 0 0 / 5%);
            border-radius: 5px;
            background-color: #ffffff;
        }


        .main {
            position: relative;
            display: flex;
        }

        :root {
            --swiper-navigation-size: 35px;
        }
    </style>


    <!-- start landing -->
    <div class="bg-[url(../images/headerBackgrond.png)] bg-no-repeat bg-cover">
        <div class="bg-primaryColor relative grid place-content-center place-items-center">
            <div class="py-5 px-2 container flex flex-col gap-10 lg:flex-row justify-between items-center pb-[6rem]">
                <img src="../images/shapes.svg" alt="img" class="absolute top-0 left-0" />

                <div class="basis-[50%]">
                    <img style="border-radius: 5px;border: none" src="{{ path("$course->img") }}" alt="image"
                        class="  " />
                </div>

                <div class="basis-[60%]">
                    <p class="text-[24px] font-[700] text-[#042E6F] mb-2">{{ $course->title }}</p>

                    <p class="text-[20px] font-[700] text-[#042E6F] mb-2">{{ $course->start_at }} <span
                            style="margin-right: 15px">{{ $course->end_at }} </span> </p>

                    <p class="text-[18px] font-[700] text-[#042E6F] mb-2">نسبة الاكتمال % {{ $course->percent }} </p>


                    <p class="text-[20px] font-[400] text-[#fff] max-w-[558px]">
                        {{ $course->short_dis }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing -->

    <div class="bg-gradient-to-b from-[#fceddc] to-white relative px-3 py-5">
        <h1 style="text-align: center;font-weight: 900;font-size: 20px">تفاصيل الدورة</h1>

        <div class="dis my-3 p-2">
            <?= $course->long_dis ?>
        </div>


    </div>

    <h1 style="text-align: center;font-weight: 900;font-size: 20px;margin-bottom: 15px">صور من الدورة</h1>


    <!-- Swiper -->
    <div class="main">
        <div class="swiper-button-next"></div>

        <div class="swiper mySwiper">

            <div class="swiper-wrapper">

                @foreach ($course->imgs as $img)
                    <div class="swiper-slide"><img src="{{ path("$img->img") }}"></div>
                @endforeach
                @foreach ($course->imgs as $img)
                    <div class="swiper-slide"><img src="{{ path("$img->img") }}"></div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-prev"></div>


    </div>

    <script src="https://zamzamfoods-eg.com/assets/sw/swiper-element.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {

            navigation: {
                prevEl: '.swiper-button-next',
                nextEl: '.swiper-button-prev'
            },

            slidesPerView: 4.3,
            spaceBetween: 15,
            loop: false,
            breakpoints: {
                320: {
                    slidesPerView: 1.5,
                    spaceBetween: 10
                }, // when window width is <= 480px
                480: {
                    slidesPerView: 2.3,
                    spaceBetween: 20
                }, // when window width is <= 640px
                640: {
                    slidesPerView: 2.3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4.3,
                    spaceBetween: 20,
                },
            },

        });
    </script>
@endsection
