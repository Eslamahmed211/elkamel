<form action="/admin/about/sec2" class="row" method="post" enctype="multipart/form-data" id="theForm_sec2">
    @csrf
    @method('put')


    <div class="col-12" title="الصورة">
        <x-admin.forms.input type="file" accept="image/*" for="sec2_about_img" lable_title="الصورة"
            name="sec2_about_img" placeholder="">
        </x-admin.forms.input>
    </div>



    <div data-title="الوصف" class="col-12 mb-4">

        <input type="hidden" id="hiddenArea" name="sec2_about_dis">

        <label class="mb-3">الوصف</label>

        <div class="quill-container overflow-hidden">
            <div id="editor" class="quill-editor quill">
                <?= variable('sec2_about_dis') ?>
            </div>
        </div>
    </div>

    <div data-title="وصف مهمتنا و اهدافنا" class="col-12 mb-4">

        <label for="mission_dis">وصف مهمتنا و اهدافنا</label>
        <textarea name="mission_dis" cols="30" rows="10">{{ variable('mission_dis') }}</textarea>


    </div>

    <div data-title="ما الذي يميزنا" class="col-12 mb-4">

        <label for="distinguishes_dis">وصف ما الذي يميزنا</label>
        <textarea name="distinguishes_dis" cols="30" rows="10">{{ variable('distinguishes_dis') }}</textarea>


    </div>




    <div class="p-2">
        <button type="button" onclick="validate('theForm_sec2')" class="mainBtn mt-3">تعديل </button>
    </div>
</form>
