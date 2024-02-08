@extends('admin/layout')


@section('title')
    <title>المستخدمين</title>
@endsection


@section('content')
    <x-searchForm action="/admin/users/search">

        @php
            !empty($_GET['id']) ? ($id = $_GET['id']) : ($id = '');
            !empty($_GET['name']) ? ($name = $_GET['name']) : ($name = '');
            !empty($_GET['email']) ? ($email = $_GET['email']) : ($email = '');
        @endphp


        <x-admin.forms.input name="id" value="{{ $id }}" placeholder="مثال : 123456" lable_title="كود المستخدم">
        </x-admin.forms.input>



        <x-admin.forms.input name="name" value="{{ $name }}" lable_title="اسم المسخدم"
            placeholder="مثال : اسلام احمد">
        </x-admin.forms.input>


        <x-admin.forms.input name="email" value="{{ $email }}" lable_title="البريد الالكتروني"
            placeholder="مثال : Eslam@gmail.com ">
        </x-admin.forms.input>


    </x-searchForm>


    <div class="actions">


        <div class="contnet-title">المستخدمين </div>

        <div class="d-flex align-items-center gap-2">


            <x-searchBtn></x-searchBtn>

            <x-link path="/admin/users/create" title="اضافة مستخدم"><svg width="22" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                </svg></x-link>

        </div>




    </div>

    <div class="tableSpace">

        <table class="not">
            <thead>


                <tr>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th> الإجراءات </th>
                </tr>

            </thead>

            <tbody>

                @foreach ($users as $user)
                    <tr>

                        <td data-text="الاسم">{{ $user->name }}</td>
                        <td data-text="الايميل">{{ $user->email }}</td>

                        <td data-text="الإجراءات">
                            <div>
                                @if (!$user->deleted_at)
                                    <div onclick='window.location.href = "/admin/users/{{ $user->id }}/edit"'
                                        data-tippy-content="تعديل" class="square-btn ltr has-tip"><i
                                            class="far fa-edit mr-2 icon" aria-hidden="true"></i></div>
                                @endif

                                @if (!$user->deleted_at)
                                    <div type="button" data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                        onclick="show_delete_model(this)" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-tippy-content="حذف"
                                        class="square-btn ltr has-tip"><i class="far fa-trash-alt mr-2 icon"
                                            aria-hidden="true"></i></div>
                                @else
                                    <div type="button" data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                        onclick="show_restore_model(this)" data-tippy-content="استرجاع"
                                        class="square-btn ltr has-tip"><i class="fa-solid fa-trash-arrow-up mr-2 icon"
                                            aria-hidden="true"></i></div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <x-admin.forms.deleteModel model="users" id="user_id" withInput></x-admin.forms.deleteModel>

    </div>
@endsection


@section('js')
    <script>
        $('#aside .users').addClass('active');

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='user_id']").val(data_id)

        }
    </script>

    <script>
        function show_restore_model(e) {

            let element = e;


            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            if (confirm("هل انت متاكد من استرجاع " + data_name)) {
                window.location.href = `/admin/users/restore/${data_id}`;
            }

        }
    </script>
@endsection
