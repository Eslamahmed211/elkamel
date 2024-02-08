<form action="/admin/home/call_us" class="row" method="post" >
    @csrf


    <div class="col-12" title="خدماتنا">
        <label for="call_dis" class="mb-2">  الوصف </label>
        <textarea name="call_dis" id="" cols="30" rows="5">{{ home('call_dis') }}</textarea>
    </div>


    <div class="col-lg-4 col-12" title="العنوان">
        <x-admin.forms.input value="{{home('call_adress') }}" for="call_adress" lable_title="العنوان" name="call_adress"
            placeholder="العنوان">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-4 col-12" title="البريد الالكتروني">
        <x-admin.forms.input  value="{{home('call_email') }}" for="call_email" lable_title="البريد الالكتروني" name="call_email"
            placeholder="البريد الالكتروني">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-4  col-12" title="رقم التليفون">
        <x-admin.forms.input value="{{home('call_phone') }}"   for="call_phone" lable_title="رقم التليفون" name="call_phone"
            placeholder="رقم التليفون">
        </x-admin.forms.input>
    </div>





    <div class="p-2">
        <button class="mainBtn mt-3">تعديل</button>
    </div>
</form>
