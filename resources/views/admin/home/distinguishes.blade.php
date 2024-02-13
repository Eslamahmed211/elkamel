<form action="/admin/home/distinguishes_img" class="row" method="post" enctype="multipart/form-data">
    @csrf

    <div class="col-12" title="الصورة">
        <x-admin.forms.input type="file" accept="image/*" for="distinguishes_img" lable_title="الصورة"
            name="distinguishes_img" placeholder="الصورة">
        </x-admin.forms.input>
    </div>


    <div class="p-2">
        <button class="mainBtn mt-0">تعديل </button>
    </div>


</form>



<div class="actions">

    <div class="contnet-title">مميزتنا </div>

    <div class="d-flex align-items-center gap-2">

        <button onclick="add_form()" class="xbutton">اضافة ميزة <svg width="22" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg></button>

    </div>

</div>



