@extends('admin/layout')



@section('content')
    <div style="text-align: left ; margin-top: 10px;display: flex;flex-direction: row-reverse;">
        <x-admin.forms.buttonLink path="/admin/faqs/create" title="اضافة سؤال جديد" icon="plus">
        </x-admin.forms.buttonLink>
    </div>


    <div class=" tableSpace  p-3">

        <div class="contnet-title">أسئلة شائعة</div>



        <table class="not">
            <thead>

                <tr>
                    <th> السؤل </th>
                    <th> الاجابة </th>
                    <th>الاجراءات</th>

                </tr>

            </thead>
            <tbody>


                @forelse ($faqs as $faq)
                    <tr>
                        <td data-text='الاسم'> {{ $faq->question }}</td>
                        <td data-text='الايميل'> {{ $faq->answer }}</td>
                        <td data-text="الإجراءات">
                            <div>

                                <div onclick='window.location.href = "/admin/faqs/{{ $faq->id }}/edit"' id="myButton"
                                    data-tippy-content="تعديل" class="square-btn ltr has-tip"><i
                                        class="far fa-edit mr-2  icon" aria-hidden="true"></i></div>

                                <div type="button" data-id="{{ $faq->id }}" data-name="{{ $faq->question }}"
                                    onclick="show_delete_model(this)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                        class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>
                            </div>

                        </td>
                    </tr>

                @empty
                    <tr>

                        <td colspan="3">لا يوجد اسالة مضافة</td>
                    </tr>
                @endforelse

            </tbody>


        </table>




        <x-admin.forms.deleteModel model="faqs" id="faq_id"></x-admin.forms.deleteModel>



    </div>
@endsection




@section('js')
    <script>
        $('#aside .faqs').addClass('active');

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='faq_id']").val(data_id)

        }
    </script>
@endsection
