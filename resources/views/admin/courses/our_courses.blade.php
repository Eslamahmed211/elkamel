<form action="/admin/courses" class="row" method="post" enctype="multipart/form-data" id="theForm">
    @csrf

    <div class="col-lg-3 col-12" title="الصورة">
        <x-admin.forms.input class="checkThis" type="file" accept="image/*" for="img" lable_title="الصورة" name="img"
            placeholder="img">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-3 col-12" title="العنوان">
        <x-admin.forms.input  class="checkThis"  for="title" lable_title="العنوان" name="title" placeholder="العنوان">
        </x-admin.forms.input>
    </div>


    <div class="col-lg-2 col-12" title="تاريخ البداية">
        <x-admin.forms.input notRequired class="date" for="start_at" lable_title="تاريخ البداية" name="start_at"
            placeholder="تاريخ البداية">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-2 col-12" title="تاريخ النهاية">
        <x-admin.forms.input notRequired class="date" for="end_at" lable_title="تاريخ الانتهاء" name="end_at"
            placeholder="تاريخ الانتهاء">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-2 col-12" title="نسبة الاكتمال">
        <x-admin.forms.input type="number" notRequired for="percent" lable_title="نسبة الاكتمال" name="percent"
            placeholder="نسبة الاكتمال">
        </x-admin.forms.input>
    </div>



    <div class="col-12" title="وصف قصير">
        <label>وصف قصير </label>
        <textarea  class="checkThis"  name="short_dis" cols="30" rows="10">{{old("short_dis")}}</textarea>
    </div>


    <div data-title="الوصف" class="col-12 mb-4">

        <input type="hidden" id="hiddenArea" name="long_dis">

        <label class="mb-3">وصف طويل</label>

        <div class="quill-container overflow-hidden">
            <div id="editor" class="quill-editor quill">
                <?= old('long_dis') ?>
            </div>
        </div>
    </div>




    <div class="p-2">
        <button type="button" onclick="validate()" class="mainBtn mt-3">اضافة دورة جديدة</button>
    </div>
</form>
