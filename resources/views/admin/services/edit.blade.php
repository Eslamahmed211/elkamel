@extends('admin/layout')


@section('path')
    <ul class="paths">
        <li> <a href="{{ url('admin/services?tab=nav-our_services') }}"> خدماتنا / </a> </li>
        <li class="active"> {{ $service->title }} / </li>
        <li class="active"> تعديل </li>
    </ul>
@endsection

@section('content')
    <div class=" mt-lg-4 mx-3  ">

        <form class="row bg-white  py-4 px-2 rounded" action="/admin/services/{{ $service->id }}" method="post"
            enctype="multipart/form-data" id="theForm">
            @csrf
            @method('put')

            <div class="col-lg-6 col-12" title="الصورة">
                <x-admin.forms.input type="file" notRequired accept="image/*" for="img" lable_title="الصورة"
                    name="img" placeholder="img">
                </x-admin.forms.input>
            </div>

            <div class="col-lg-6 col-12" title="العنوان">
                <x-admin.forms.input for="title" value="{{ $service->title }}" lable_title="العنوان" name="title"
                    placeholder="العنوان">
                </x-admin.forms.input>
            </div>


            <div data-title="الوصف" class="col-12 mb-4">

                <input type="hidden" id="hiddenArea" name="dis">

                <label class="mb-3">الوصف</label>

                <div class="quill-container overflow-hidden">
                    <div id="editor" class="quill-editor quill">
                        <?= $service->dis ?>
                    </div>
                </div>
            </div>


            <div class="p-2">
                <button type="button" onclick="validate()" class="mainBtn mt-3">تعديل</button>
            </div>
        </form>
    </div>
@endsection


@section('js')
    <script>
        $('#aside .services').addClass('active');
    </script>
@endsection
