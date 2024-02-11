<form action="/admin/projects/header" class="row" method="post" enctype="multipart/form-data">
    @csrf
    @method("put")


    <div class="col-12" title="صورة الهيدر">
        <x-admin.forms.input type="file" accept="image/*" for="header_project_img" lable_title="صورة الهيدر" name="header_project_img"
            placeholder="صورة الهيدر">
        </x-admin.forms.input>
    </div>


    <div class="col-12" title="وصف الهيدر">
        <label for="header_project_dis" class="mb-2"> وصف الهيدر</label>
        <textarea name="header_project_dis" id="" cols="30" rows="5">{{ variable('header_project_dis') }}</textarea>
    </div>


    <div class="p-2">
        <button class="mainBtn mt-3">تعديل الهيدر</button>
    </div>
</form>

