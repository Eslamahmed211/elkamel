<form action="/admin/services" class="row" method="post" enctype="multipart/form-data" id="theForm">
    @csrf

    <div class="col-lg-4 col-12" title="الصورة">
        <x-admin.forms.input class="checkThis" type="file" accept="image/*" for="img" lable_title="الصورة" name="img"
            placeholder="img">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-4 col-12" title="العنوان">
        <x-admin.forms.input class="checkThis"   for="title" lable_title="العنوان" name="title" placeholder="العنوان">
        </x-admin.forms.input>
    </div>


    <div class="col-lg-4 col-12" title="اللينك">
        <x-admin.forms.input for="name" notRequired lable_title="اللينك" name="link" placeholder="اللينك">
        </x-admin.forms.input>
    </div>


    <div data-title="الوصف" class="col-12 mb-4">

        <input type="hidden" id="hiddenArea" name="dis">

        <label class="mb-3">الوصف</label>

        <div class="quill-container overflow-hidden">
            <div id="editor" class="quill-editor quill">
                <?= old('dis') ?>
            </div>
        </div>
    </div>


    <div class="p-2">
        <button type="button" onclick="validate()" class="mainBtn mt-3">اضافة خدمة جديدة</button>
    </div>
</form>
