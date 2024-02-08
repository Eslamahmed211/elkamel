<form action="/admin/home/what_saying" class="row" method="post" enctype="multipart/form-data">
    @csrf

    <div class="col-12" title="sp_img">
        <x-admin.forms.input type="file" accept="image/*" for="sp_img" lable_title="الصورة" name="sp_img"
            placeholder="sp_img">
        </x-admin.forms.input>
    </div>


    <div class="col-12" title="الوصف">
        <label for="sp" class="mb-2"> الوصف</label>
        <textarea name="sp" id="" cols="30" rows="5">{{ home('sp') }}</textarea>
    </div>


    <div class="p-2">
        <button class="mainBtn mt-3">تعديل ماذا يقولون</button>
    </div>
</form>
