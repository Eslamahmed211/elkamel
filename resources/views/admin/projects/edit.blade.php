@extends('admin/layout')


@section('path')
    <ul class="paths">
        <li> <a href="{{ url('admin/projects?tab=nav-our_projects') }}"> مشريعنا / </a> </li>
        <li class="active"> {{ $project->title }} / </li>
        <li class="active"> تعديل </li>
    </ul>
@endsection

@section('content')
    <div class=" mt-lg-4 mx-3  ">

        <form class="row bg-white  py-4 px-2 rounded" action="/admin/projects/{{ $project->id }}" method="post"
            enctype="multipart/form-data" id="theForm">
            @csrf
            @method('put')

            <div class="col-lg-3 col-12" title="الصورة">
                <x-admin.forms.input type="file" notRequired accept="image/*" for="img" lable_title="الصورة"
                    name="img" placeholder="img">
                </x-admin.forms.input>
            </div>

            <div class="col-lg-3 col-12" title="العنوان">
                <x-admin.forms.input for="title" value="{{ $project->title }}" lable_title="العنوان" name="title"
                    placeholder="العنوان">
                </x-admin.forms.input>
            </div>



            <div class="col-lg-2 col-12" title="تاريخ البداية">
                <x-admin.forms.input value="{{ $project->start_at }}" notRequired class="date" for="start_at"
                    lable_title="تاريخ البداية" name="start_at" placeholder="تاريخ البداية">
                </x-admin.forms.input>
            </div>

            <div class="col-lg-2 col-12" title="تاريخ النهاية">
                <x-admin.forms.input value="{{ $project->end_at }}" notRequired class="date" for="end_at"
                    lable_title="تاريخ الانتهاء" name="end_at" placeholder="تاريخ الانتهاء">
                </x-admin.forms.input>
            </div>


            <div class="col-lg-2 col-12" title="نسبة الاكتمال">
                <x-admin.forms.input value="{{ $project->percent }}" type="number" notRequired for="percent"
                    lable_title="نسبة الاكتمال" name="percent" placeholder="نسبة الاكتمال">
                </x-admin.forms.input>
            </div>

            <div class="col-12" title="وصف قصير">
                <label>وصف قصير </label>
                <textarea class="checkThis" name="short_dis" cols="30" rows="10">{{ $project->short_dis }}</textarea>
            </div>



            <div data-title="الوصف" class="col-12 mb-4">

                <input type="hidden" id="hiddenArea" name="long_dis">

                <label class="mb-3">وصف طويل</label>

                <div class="quill-container overflow-hidden">
                    <div id="editor" class="quill-editor quill">
                        <?= $project->long_dis ?>
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
        $('#aside .projects').addClass('active');
        flatpickr('input.date', {
            enableTime: false,
            dateFormat: "Y-m-d"
        });
    </script>
@endsection
