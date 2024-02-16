<form action="/admin/courses/header" class="row" method="post" enctype="multipart/form-data">
    @csrf
    @method("put")


    <div class="col-12" title="صورة الهيدر">
        <x-admin.forms.input type="file" accept="image/*" for="header_courses_img" lable_title="صورة الهيدر" name="header_courses_img"
            placeholder="صورة الهيدر">
        </x-admin.forms.input>
    </div>



    <div class="col-12" title="وصف الهيدر">
        <label for="header_courses_dis" class="mb-2"> وصف الهيدر</label>
        <textarea name="header_courses_dis" id="" cols="30" rows="5">{{ variable('header_courses_dis') }}</textarea>
    </div>

    <div class="col-12" title="وصف المشاريع">
        <label for="courses_dis" class="mb-2"> وصف الدورات</label>
        <textarea name="courses_dis" id="" cols="30" rows="5">{{ variable('courses_dis') }}</textarea>
    </div>


    <div class="p-2">
        <button class="mainBtn mt-3">تعديل الهيدر</button>
    </div>
</form>

