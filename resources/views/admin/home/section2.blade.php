<form action="/admin/home/section2" class="row" method="post" >
    @csrf


    <div class="col-12" title="خدماتنا">
        <label for="about_dis" class="mb-2"> من نحنا </label>
        <textarea name="about_dis" id="" cols="30" rows="5">{{ home('about_dis') }}</textarea>
    </div>

    <div class="col-12" title="خدماتنا">
        <label for="about_dis" class="mb-2"> خدماتنا </label>
        <textarea name="our_services_dis" id="" cols="30" rows="5">{{ home('our_services_dis') }}</textarea>
    </div>

    <div class="p-2">
        <button class="mainBtn mt-3">تعديل</button>
    </div>
</form>
