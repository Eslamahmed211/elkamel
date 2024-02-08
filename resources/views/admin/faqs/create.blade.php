@extends('admin/layout')


@section('content')
    <div class=" mt-lg-4 mx-3  ">

        <form class="row bg-white  py-4 px-2 rounded" action="/admin/faqs" method="post" id="theForm">

            @csrf


            <div class="col-12">
                <x-admin.forms.input class="checkThis" for="question" lable_title="السؤال" name="question" placeholder="السؤال">
                </x-admin.forms.input>
            </div>

            <div class="col-12">
                <x-admin.forms.input class="checkThis" for="answer" lable_title="الاجابة" name="answer"
                    placeholder="الاجابة">
                </x-admin.forms.input>
            </div>



            <div class="col-12">
                <x-admin.forms.mainBtn onclick="validate()" icon="plus" title="اضافة سؤال جديد" class="mt-3">
                </x-admin.forms.mainBtn>
            </div>




        </form>



    </div>
    <div class="mt-3">

        <a href="/admin/faqs" class="xbutton">
            رجوع

            <svg width="20" style="margin-right: 3px;" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"></path>
            </svg>

        </a>
    </div>
@endsection


@section('js')
    <script>
        $('#aside .faqs').addClass('active');
    </script>
@endsection
