<div class="p-5 container flex flex-col lg:flex-row gap-5 items-center justify-between">
    <div>
        <p class="text-[32px] lg:text-[52px] text-[#042E6F] font-[700]">
            ماذا يقولون؟
        </p>
        <p class="text-[18px] lg:text-[24px] text-[black] font-[500] max-w-[530px]">
            {{ home('sp') }}
        </p>
        <p class="text-[16px] lg:text-[22px] text-[#696984] font-[400] mt-5">
            هل أنت أيضا؟ يرجى إعطاء تقييمك
        </p>
        <div class="bg-[#042E6F] flex items-center gap-4 rounded-full p-5 w-fit mt-5 px-7 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path
                    d="M9.41683 16.0748C9.26405 15.922 9.18405 15.7276 9.17683 15.4915C9.16961 15.2553 9.24267 15.0609 9.396 14.9081L13.4793 10.8248H4.16683C3.93072 10.8248 3.73267 10.7448 3.57267 10.5848C3.41267 10.4248 3.33294 10.227 3.3335 9.99145C3.3335 9.75534 3.4135 9.55729 3.5735 9.39729C3.7335 9.23729 3.93128 9.15757 4.16683 9.15812H13.4793L9.396 5.07479C9.24322 4.92201 9.17017 4.72757 9.17683 4.49145C9.1835 4.25534 9.2635 4.0609 9.41683 3.90812C9.56961 3.75534 9.76405 3.67896 10.0002 3.67896C10.2363 3.67896 10.4307 3.75534 10.5835 3.90812L16.0835 9.40812C16.1668 9.47757 16.226 9.56451 16.261 9.66895C16.296 9.7734 16.3132 9.8809 16.3127 9.99145C16.3127 10.1026 16.2954 10.2067 16.261 10.304C16.2266 10.4012 16.1674 10.4915 16.0835 10.5748L10.5835 16.0748C10.4307 16.2276 10.2363 16.304 10.0002 16.304C9.76405 16.304 9.56961 16.2276 9.41683 16.0748Z"
                    fill="white" />
            </svg>
            <a href="/#contact">
                <p class="text-[16px] text-[white] font-[700]">اكتب تقييمك</p>
            </a>
        </div>
    </div>
    <div class="relative">
        <img src="{{ path(home('sp_img')) }}" alt="image" class="rounded-xl" />
        <img src="./images/rightArrow.svg" alt="image"
            class="absolute top-[50%] translate-y-[-50%] right-[-4rem] md:-right-[6.3rem] next cursor-pointer"
            onclick="moveSlide(1)" />
        <div class="slider">
            <div class="slides">

                @foreach (App\Models\say::get() as $say)
                    <div
                        class="p-5 rounded-xl bg-white border-l-[.6rem] border-[#EF8B1D] shadow-xl absolute top-[70%] right-0 md:-right-[7rem] lg:-right-[10rem] slidee">
                        <p
                            class="text-[16px] lg:text-[16px] text-[#5F5F7E] font-[400] p-4  max-w-[400px] leading-[25px]">
                            {{ $say->dis }}
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="mx-2">
                                {{-- <img src="./images/starts.svg" alt="image" /> --}}

                                @php
                                    $index = 5;
                                @endphp


                                @for ($i = 1; $i <= $say->stars; $i++)
                                    <i class="fa-solid fa-star" style="color: #fba333"></i>

                                    @php
                                        $index--;
                                    @endphp
                                @endfor

                                @for ($i = $index; $i >= 1; $i--)
                                    <i class="fa-regular fa-star"></i>
                                @endfor




                            </div>
                            <p class="text-[#5F5F7E] text-[16px] lg:text-[16px] font-[600]">
                                {{ $say->name }}
                            </p>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
</div>
