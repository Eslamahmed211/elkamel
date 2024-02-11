@extends('users.layout')


@section('body')
    <div class="bg-gradient-to-b from-[#fceddc] to-white relative">
        <img src="../images/contactShape1.svg" class="absolute top-0 left-[60%] z-[-1]" alt="image" />
        <img src="../images/contactShape2.svg" class="absolute top-[100%] left-0" alt="image" />
        <img src="../images/contactShape3.svg" class="absolute top-[90%] right-0" alt="image" />
        <div class="p-5 container">
            <div class="bg-white shadow-lg rounded-lg p-5 md:px-10 lg:max-w-[70%] mx-auto my-20 relative">
                <img src="../images/contactShape1.svg" class="absolute top-[100%] -left-5 z-[0]" alt="image" />
                <div class="flex flex-col justify-center items-center gap-2">
                    <p class="text-[24px] md:text-[24px] text-[#000] font-[600] mt-10">
                        تواصل معنا
                    </p>
                    <img src="../images/curveLine.svg" alt="image" />
                </div>
                <div class="flex flex-col lg:flex-row justify-between gap-5 mt-5">
                    <div>
                        <p class="text-[20px] font-[500] text-[#0F001A] mb-5">
                            اترك لنا رسالة
                        </p>
                        <form class="flex flex-col gap-4" action="send_message" method="post">

                            @csrf
                            <input type="text" name="name" placeholder=" الاسم"
                                class="border-2 p-5 outline-none lg:min-w-[480px]" required />
                            <input name="email" type="email" placeholder=" البريد الإلكتروني"
                                class="border-2 p-5 outline-none lg:min-w-[480px]" required />
                            <input name="phone" type="text" placeholder=" تلفون"
                                class="border-2 p-5 outline-none lg:min-w-[480px]" required />
                            <textarea name="message" placeholder="رسالة" class="border-2 p-5 outline-none lg:min-w-[480px] min-h-[12rem]" required></textarea>
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
                            <button type="submit" class="bg-[#042E6F] rounded-lg p-5 text-white">
                                ارسال
                            </button>
                        </form>
                    </div>
                    <div class="text-left">
                        {{-- <p class="text-[#0F001A] font-[400]">Weekend UX</p> --}}
                        <p class="text-[#0F001A] font-[400]">
                            {{ home('call_adress') }}
                        </p>
                        <p class="text-[#0F001A] font-[400] mt-2">{{ home('call_phone') }}</p>
                        <p class="text-[#0F001A] font-[400] mt-2">{{ home('call_email') }}</p>

                        <div class="socal">


                            @if (!empty(variable('x')))
                                <a target="_blank" href="{{ variable('x') }}"><i
                                        class="fa-brands fa-x-twitter fa-fw"></i></a>
                            @endif

                            @if (!empty(variable('youtube')))
                                <a target="_blank" href="{{ variable('youtube') }}"><i class="fab fa-youtube fa-fw"></i></a>
                            @endif
                            @if (!empty(variable('insta')))
                                <a target="_blank" href="{{ variable('insta') }}"><i
                                        class="fab fa-instagram fa-fw "></i></a>
                            @endif

                            @if (!empty(variable('facebook')))
                                <a target="_blank" href="{{ variable('facebook') }}"><i
                                        class="fab fa-facebook fa-fw"></i></a>
                            @endif

                        </div>


                        {{-- <img src="../images/socialContact.svg" class="mt-5 mr-auto" /> --}}
                        {{-- <img src="../images/map.png" class="mt-7 w-full lg:w-auto" /> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
