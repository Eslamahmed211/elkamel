@extends('admin/layout')


@section('path')
    <ul class="paths">
        <li> <a href="{{ url('admin/users') }}"> المستخدمين / </a> </li>
        <li class="active"> {{ $user->name }} / </li>
        <li class="active"> تعديل </li>
    </ul>
@endsection

@section('css')
    <style>
        .contnet-title {
            font-size: 16px;
            color: rgb(30, 41, 53);
            /* color: red; */
            font-weight: 700;
            width: 100%;
            border-right: solid 4px #ddd;
            background: #f5f5f5;
            padding: 8pt;
            border-radius: 2pt;
            font-family: "cairo";

        }

        form .role {
            display: flex;
            align-items: center;
            column-gap: 20px;
            border-bottom: 1px solid #dddddd;
            padding: 10px;

        }

        .action2,
        .master {
            display: flex;
            align-items: center;
            column-gap: 10px;

        }

        .master label {
            margin: 0px;
            font-size: 15px;
            font-weight: 700;
        }


        .role label {
            margin: 0px;
            font-size: 15px;
        }
    </style>
@endsection



@section('content')
    <div class=" mt-lg-4 mt-3">


        <form class="row bg-white  py-4 px-2 rounded" action="/admin/users/{{ $user->id }}" method="post" id="theForm"
            autocomplete="off">

            @csrf
            @method('put')

            <div class="col-lg-4 col-12" title="اسم المستخدم">
                <x-admin.forms.input value="{{ $user->name }}" class="checkThis" for="name" lable_title="اسم المستخدم"
                    name="name" placeholder="اسم المستخدم">
                </x-admin.forms.input>
            </div>


            <div class="col-lg-4 col-12" title="كلمة السر">
                <x-admin.forms.input notRequired type="password" for="password" lable_title="كلمة السر" name="password"
                    placeholder="كلمة السر">
                </x-admin.forms.input>
            </div>

            <div class="col-lg-4 col-12" title="تاكيد كلمة السر">
                <x-admin.forms.input notRequired type="password" for="password_confirmation" lable_title="تأكيد كلمة السر"
                    name="password_confirmation" placeholder="تأكيد كلمة السر">
                </x-admin.forms.input>
            </div>




            <div class="col-lg-4 col-12" title="الايميل">
                <x-admin.forms.input value="{{ $user->email }}" name="" for="email" lable_title="الايميل"
                    disabled readonly placeholder="المحفظة">
                </x-admin.forms.input>
            </div>


            <div class="col-lg-4 col-12" title="الصلاحية">
                <label for="role_id">الصلاحية</label>
                <select name="role_id" id="role_id">
                    @foreach ($roles as $role)
                        <option @if ($role->id == $user->role_id) selected @endif value="{{ $role->id }}">
                            {{ $role->name }}</option>
                    @endforeach
                </select>
            </div>





            <div class="col-12">
                <x-admin.forms.mainBtn type="submit" title="تعديل {{ $user->name }}"
                    class="mt-3"></x-admin.forms.mainBtn>
            </div>




        </form>

    </div>
@endsection


@section('js')
    <script>
        $('#aside .users').addClass('active');
    </script>
@endsection
