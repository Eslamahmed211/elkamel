<form action="/admin/home/header" class="row" method="post" enctype="multipart/form-data">
    @csrf




    <div class="col-12" title="صورة الهيدر">
        <x-admin.forms.input type="file" accept="image/*" for="header_img" lable_title="صورة الهيدر" name="header_img"
            placeholder="صورة الهيدر">
        </x-admin.forms.input>
    </div>


    <div class="col-12" title="عنوان الهيدر">
        <label for="header_title" class="mb-2"> عنوان الهيدر</label>
        <textarea name="header_title" id="" cols="30" rows="3">{{ home('header_title') }}</textarea>
    </div>


    <div class="col-12" title="وصف الهيدر">
        <label for="header_dis" class="mb-2"> وصف الهيدر</label>
        <textarea name="header_dis" id="" cols="30" rows="5">{{ home('header_dis') }}</textarea>
    </div>


    <div class="p-2">
        <button class="mainBtn mt-3">تعديل الهيدر</button>
    </div>
</form>
