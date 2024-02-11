<form action="/admin/saying" class="row" method="post" id="theForm4">
    @csrf


    <div class="col-12" title="الاسم">
        <x-admin.forms.input class="checkThis" for="name" lable_title="الاسم" name="name" placeholder="الاسم">
        </x-admin.forms.input>
    </div>


    <div data-title="الوصف" class="col-12 mb-2">
        <label for="dis">الوصف</label>
        <textarea class="checkThis" name="dis" cols="15" rows="5"></textarea>
    </div>


    <div class="p-2">
        <button type="button" onclick="validate('theForm4')" class="mainBtn mt-3">اضافة رائ</button>
    </div>
</form>
