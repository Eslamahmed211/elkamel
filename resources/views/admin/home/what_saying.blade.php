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



<div class="actions">

    <div class="contnet-title">الاراء </div>

    <div class="d-flex align-items-center gap-2">

        <button onclick="add_say()" class="xbutton">اضافة راء <svg width="22" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
            </svg></button>

    </div>

</div>


<div class="tableSpace">

    <table class="not">
        <thead>


            <tr>
                <th>العنوان</th>
                <th> الإجراءات </th>
            </tr>

        </thead>

        <tbody>

            @foreach (App\Models\say::get() as $say)
                <tr>

                    <td>{{ $say->name }}</td>

                    <td data-text="الإجراءات">
                        <div>

                            <div type="button" data-id="{{ $say->id }}" data-name="{{ $say->name }}"  data-stars="{{ $say->stars }}"
                                data-dis="{{ $say->dis }}" onclick="show_new_value_model(this)"
                                data-bs-toggle="modal" data-bs-target="#theForm6" data-tippy-content="تعديل"
                                class="square-btn ltr has-tip">
                                <i class="far fa-edit mr-2 icon" aria-hidden="true"></i>
                            </div>

                            <div type="button" data-id="{{ $say->id }}" data-name="{{ $say->name }}"
                                onclick="show_delete_model(this)" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                    class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>


    <form method="post" action="{{ url('admin/saying/destroy') }}" class="modal fade" id="exampleModal2" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        @method('delete')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من ازالة ؟</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <input type="hidden" name="say_id">

                <div class="modal-body">

                    <div id="model_title"> </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger">ازالة</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </form>


</div>
