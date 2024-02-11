@extends('users.layout')


@section('body')
    <div class="bg-[#e6eaf1] pb-20">
        <div class="p-5 md:container pt-20">
            <p class="text-[32px] lg:text-[45px] font-[700] text-[#1B3764] text-center relative">
                أسئلة متكررة؟
                <span class="bg-[#FFAF51] w-[55px] h-[3px] absolute left-[50%] -bottom-5 rounded-full"></span>
            </p>
        </div>
        <div class="p-2 md:container grid grid-cols-1 md:grid-cols-2 gap-10 gap-x-32 mt-12">


            @foreach (App\Models\faq::get() as $faq)
                <details class="p-2 border-b border-b-[#1b37645a]">
                    <summary class="text-[24px] font-[700] text-[#1B3764] cursor-pointer">
                        {{ $faq->question }}
                    </summary>
                    <p style="margin-top: 10px ; padding-right: 10px" class="text-[17px] text-[#969AA0] font[500]">
                        {{ $faq->answer }}
                    </p>
                </details>
            @endforeach


        </div>
    </div>
@endsection
