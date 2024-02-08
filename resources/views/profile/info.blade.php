<form class="row" action="{{ url('/profile/info') }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('put')

    <div class="col-lg-6 col-12">
        <x-admin.forms.input value="{{ auth()->user()->name }}" class="checkThis" for="name" lable_title="اسمك ثنائي"
            name="name" placeholder="اسمك ثنائي">
        </x-admin.forms.input>
    </div>

    <div class="col-lg-6 col-12">
        <x-admin.forms.input disabled type="email" value="{{ auth()->user()->email }}" for="email"
            lable_title="البريد الالكتروني" name="email" placeholder="البريد الالكتروني">
        </x-admin.forms.input>
    </div>


    <div class="col-lg-6 col-12">
        <x-admin.forms.input type="file" for="img" lable_title="صورة الحساب" name="img"
            placeholder="صورة الحساب">
        </x-admin.forms.input>
    </div>

    <div class="d-flex justify-content-end">

        <a class="xbutton " href="/delete_img">
            ازالة صورة الحساب
        </a>

    </div>


    <div class="col-12">
        <x-admin.forms.mainBtn type="submit" title="تعديل  بيانات الحساب" class="mt-3"></x-admin.forms.mainBtn>
    </div>




</form>
