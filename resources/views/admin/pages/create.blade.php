@extends('admin/layout')


@section('path')
    <ul class="paths">
        <li> <a href="{{ url('admin/pages') }}"> الصفحات الثابتة / </a> </li>
        <li class="active">اضافة </li>
    </ul>
@endsection

@section('css')
    <style>
        .contnet-title {
            font-size: 16px;
            color: rgb(30, 41, 53);
            /* color: red; */
            font-weight: 700;
            width: 100%;
            border-right: solid 4px #ddd;
            background: #f5f5f5;
            padding: 8pt;
            border-radius: 2pt;
            font-family: "cairo";

        }
    </style>
@endsection



@section('content')
    <div class=" mt-lg-4 mx-3  ">

        <form class="row bg-white  py-4 px-2 rounded" action="/admin/pages" method="post" id="theForm" autocomplete="on">

            @csrf

            <div class="col-lg-6 col-12">
                <x-admin.forms.input class="checkThis" for="title" lable_title="عنوان الصفحة " name="title"
                    placeholder="  خدمة العملاء - سياسية الخصوصية">
                </x-admin.forms.input>
            </div>

            <div class="col-lg-6 col-12">

                <x-admin.forms.input notRequired type="text" for="slug" lable_title="اسم الصفحة في الرابط "
                    name="slug" placeholder="اسم الصفحة في الرابط ">
                </x-admin.forms.input>
            </div>



            <div data-title="محتوي الصفحة" class="col-12 mb-4">

                <input type="hidden" id="hiddenArea" name="body">

                <label class="mb-3">محتوي الصفحة</label>

                <textarea name="body" class="tiny"><?= old('body') ?></textarea>


            </div>


            <fieldset class="d-flex align-items-center mb-2">
                <input  @if (old("show")) checked @endif type="checkbox" id="show" class="mx-2" name="show">
                <label for="show">تفعيل تلك الصفحة</label>
            </fieldset>






            <div class="col-12">
                <x-admin.forms.mainBtn onclick="validate()" icon="plus" title="اضافة صفحة جديدة" class="mt-3">
                </x-admin.forms.mainBtn>
            </div>




        </form>


    </div>


@endsection


@section('js')
    <script>
        $('#aside .pages').addClass('active');
    </script>
@endsection
