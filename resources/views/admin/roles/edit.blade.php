@extends('admin/layout')

@section('title')
    <title>تعديل الصلاحية</title>
@endsection


@section('path')
    <ul class="paths">
        <li> <a href="{{ url('admin/roles') }}"> الصلاحيات / </a> </li>
        <li class="active"> {{ $role->name }} / </li>
        <li class="active">تعديل </li>
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
    <div class=" mt-lg-4 mx-3  ">

        <form class="row bg-white  py-4 px-2 rounded" action="/admin/roles/{{ $role->id }}" method="post">

            @csrf
            @method('put')

            <div class="col-12">
                <x-admin.forms.input value="{{ $role->name }}" class="checkThis" for="name" lable_title="العنوان"
                    name="name" placeholder="العنوان ">
                </x-admin.forms.input>
            </div>


            <div id="AdminRoles" class="mt-3">

                <p class="contnet-title d-flex align-items-center ">
                    <label for="all"> الصلاحيات كاملة </label> <input class="mx-2" onchange="allCheckedAdmin(this)"
                        id="all" type="checkbox">
                </p>

                <div class="tree">
                    @foreach (config('adminRoles.permissions') as $rolee => $actions)
                        <div class="role">
                            <div class="master">
                                <input name="permissions[]" value="{{ $actions }}" @checked(in_array($actions, json_decode($role->permissions))) type="checkbox"
                                    id="{{ $actions }}" class="master-checkbox">
                                <label for="{{ $actions }}">{{ $rolee }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>



            <div class="col-12">
                <x-admin.forms.mainBtn type="submit" title="تعديل {{ $role->name }}"
                    class="mt-3"></x-admin.forms.mainBtn>
            </div>
        </form>

    </div>
@endsection


@section('js')
    <script>
        $('#aside .roles').addClass('active');

        function allCheckedAdmin(e) {
            $('#AdminRoles input:checkbox').not(e).prop('checked', e.checked);
        }
    </script>
@endsection
