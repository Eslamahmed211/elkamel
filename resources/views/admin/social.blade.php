@extends('admin.layout')


@section('content')
    <div class=" mt-lg-2 mx-3 ">
        <form action="/admin/social" class="row bg-white  py-4 px-2 rounded" method="post" id="theForm">
            @csrf
            @method("put")

            <div class="col-lg-6 col-12" title="facebook">
                <x-admin.forms.input value="{{ variable('facebook') }}" lable_title="فيسبوك" name="facebook"
                    placeholder="facebook page"></x-admin.forms.input>
            </div>
            <div class="col-lg-6 col-12" title="youtube">
                <x-admin.forms.input value="{{ variable('youtube') }}" lable_title="يويتوب" name="youtube"
                    placeholder="youtube"></x-admin.forms.input>
            </div>

            <div class="col-lg-6 col-12" title="x">
                <x-admin.forms.input value="{{ variable('x') }}" lable_title="اكس ( تويتر )" name="x"
                    placeholder="x"></x-admin.forms.input>
            </div>

            <div class="col-lg-6 col-12" title="insta">
                <x-admin.forms.input value="{{ variable('insta') }}" lable_title="انستجرام" name="insta"
                    placeholder="انستجرام"></x-admin.forms.input>
            </div>



            <div class="p-2">
                <button type="button" onclick="validate()" class="mainBtn mt-3">تعديل</button>
            </div>
        </form>
    </div>
@endsection


@section('js')
    <script>
        $('aside .social').addClass('active');
    </script>
@endsection
