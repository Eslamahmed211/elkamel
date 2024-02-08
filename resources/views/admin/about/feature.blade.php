<form action="/admin/features" class="row" method="post" enctype="multipart/form-data" id="theForm4">
    @csrf


    <div class="col-12" title="العنوان">
        <x-admin.forms.input class="checkThis" for="title" lable_title="العنوان" name="title" placeholder="العنوان">
        </x-admin.forms.input>
    </div>


    <div data-title="الوصف" class="col-12 mb-2">
        <label for="dis">الوصف</label>
        <textarea class="checkThis" name="dis" cols="15" rows="10"></textarea>
    </div>


    <div class="p-2">
        <button type="button" onclick="validate('theForm4')" class="mainBtn mt-3">اضافة ميزة جديدة</button>
    </div>
</form>



