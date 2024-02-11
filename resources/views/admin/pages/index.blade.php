@extends('admin/layout')



@section('content')
    <div style="text-align: left">
        <x-admin.forms.buttonLink path="/admin/pages/create" title="اضافة صفحة جديدة" icon="plus">
        </x-admin.forms.buttonLink>
    </div>

    <div class=" tableSpace  p-3">

        <div class="contnet-title">الصفحات الثابتة</div>

    

        <table class="not">
            <thead>

                <tr>
                    <th>#</th>

                    <th> العنوان </th>
                    <th> الإجراءات </th>

                </tr>

            </thead>
            <tbody>


                @forelse ($pages as $page)
                    <tr>


                        <td style="font-weight: 600" data-text="#">{{ $page->order }}</td>


                        <td data-text='العنوان'> {{ $page->title }}
                        </td>

                        <td data-text="الإجراءات">
                            <div>

                                <div onclick='window.location.href = "/admin/pages/{{ $page->id }}/edit"' id="myButton"
                                    data-tippy-content="تعديل" class="square-btn ltr has-tip"><i
                                        class="far fa-edit mr-2  icon" aria-hidden="true"></i></div>



                                <div type="button" data-id="{{ $page->id }}" data-name="{{ $page->title }}"
                                    onclick="show_delete_model(this)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                        class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>
                            </div>

                        </td>


                    </tr>

                @empty
                    <tr>

                        <td colspan="3">لا يوجد صفحات متاحة</td>
                    </tr>
                @endforelse

            </tbody>


        </table>



        <x-admin.forms.deleteModel model="pages" id="page_id"></x-admin.forms.deleteModel>



    </div>
@endsection




@section('js')

    <script>
        $('#aside .pages').addClass('active');

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='page_id']").val(data_id)

        }
    </script>
@endsection
