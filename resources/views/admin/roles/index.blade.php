@extends('admin/layout')



@section('content')
    <div class="actions">
        <div class="contnet-title"> الصلاحيات </div>
        <div class="d-flex align-items-center gap-2">

            <a class="xbutton" href="/admin/roles/create">
                اضافة صلاحية <svg width="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                </svg>
            </a>

        </div>
    </div>

    <div class=" tableSpace ">
        <table class="not">
            <thead>

                <tr>
                    <th> الصلاحية </th>
                    <th> الإجراءات </th>
                </tr>

            </thead>
            <tbody>


                @forelse ($roles as $role)
                    <tr>


                        <td data-text='الصلاحية'> {{ $role->name }}</td>
                        <td data-text="الإجراءات">
                            <div>

                                <div onclick='window.location.href = "/admin/roles/{{ $role->id }}/edit"' id="myButton"
                                    data-tippy-content="تعديل" class="square-btn ltr has-tip"><i
                                        class="far fa-edit mr-2  icon" aria-hidden="true"></i></div>


                                <div type="button" data-id="{{ $role->id }}" data-name="{{ $role->name }}"
                                    onclick="show_delete_model(this)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                        class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>
                            </div>

                        </td>

                    </tr>

                @empty
                    <tr>

                        <td colspan="2">لا يوجد صلاحيات مضافة</td>
                    </tr>
                @endforelse

            </tbody>


        </table>
        <x-admin.forms.deleteModel model="roles" id="role_id"></x-admin.forms.deleteModel>
    </div>
@endsection

@section('js')
    <script>
        $('#aside .roles').addClass('active');

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='role_id']").val(data_id)

        }
    </script>
@endsection
