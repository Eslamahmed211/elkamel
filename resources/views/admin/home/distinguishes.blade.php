<form action="/admin/home/distinguishes_img" class="row" method="post" enctype="multipart/form-data">
    @csrf

    <div class="col-12" title="الصورة">
        <x-admin.forms.input type="file" accept="image/*" for="distinguishes_img" lable_title="الصورة" name="distinguishes_img"
            placeholder="الصورة">
        </x-admin.forms.input>
    </div>


    <div class="p-2">
        <button class="mainBtn mt-0">تعديل </button>
    </div>


</form>


<form action="/admin/distinguishes" class="row mt-2" method="post" id="distinguishes_form">
    @csrf



    <div data-title="الوصف" class="col-12 mb-2">
        <label for="dis">الوصف</label>
        <textarea class="checkThis" name="dis" cols="15" rows="2"></textarea>
    </div>


    <div class="p-2">
        <button type="button" onclick="validate('distinguishes_form')" class="mainBtn mt-3">اضافة</button>
    </div>
</form>
