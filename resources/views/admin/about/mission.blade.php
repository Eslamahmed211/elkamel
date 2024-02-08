<form action="/admin/missions" class="row" method="post" enctype="multipart/form-data" id="theForm2">
    @csrf

    <div class="col-lg-6 col-12" title="الصورة">
        <x-admin.forms.input type="file" class="checkThis" accept="image/*" for="img" lable_title="الصورة" name="img"
            placeholder="img">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-6 col-12" title="العنوان">
        <x-admin.forms.input for="title" class="checkThis"  lable_title="العنوان" name="title" placeholder="العنوان">
        </x-admin.forms.input>
    </div>

    <div data-title="الوصف" class="col-12 mb-4">

        <label for="dis">وصف مهمتنا و اهدافنا</label>
        <textarea class="checkThis" name="dis" cols="30" rows="10"></textarea>
    </div>

    <div class="p-2">
        <button type="button" onclick="validate('theForm2')" class="mainBtn mt-3">اضافة</button>
    </div>
</form>
