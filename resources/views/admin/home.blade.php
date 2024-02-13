@extends('admin.layout')


@section('content')
    <div class="w-100">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button onclick="change('nav-header')" class="nav-link active" id="nav-header-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-header" type="button" role="tab" aria-controls="nav-header"
                    aria-selected="true">الهيدر</button>


                <button onclick="change('nav-about')" class="nav-link " id="nav-about-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about"
                    aria-selected="true">
                    من نحنا وخدمتنا</button>


                <button onclick="change('nav-distinguishes')" class="nav-link " id="nav-distinguishes-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-distinguishes" type="button" role="tab"
                    aria-controls="nav-distinguishes" aria-selected="true">ما الذي يميزنا ؟</button>



                <button onclick="change('nav-what_saying')" class="nav-link " id="nav-what_saying-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-what_saying" type="button" role="tab" aria-controls="nav-what_saying"
                    aria-selected="true">
                    ماذا يقولون؟</button>



                <button onclick="change('nav-call_us')" class="nav-link " id="nav-call_us-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-call_us" type="button" role="tab" aria-controls="nav-call_us"
                    aria-selected="true">
                    تواصل معنا</button>



            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-header" role="tabpanel" aria-labelledby="nav-header-tab"
                tabindex="0">
                <div class="py-3 px-2 mt-3 bg-white rounded">
                    @include('admin.home.header')
                </div>
            </div>

            <div class="tab-pane fade show " id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab" tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.home.section2')
                </div>
            </div>
            <div class="tab-pane fade show " id="nav-what_saying" role="tabpanel" aria-labelledby="nav-what_saying-tab"
                tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.home.what_saying')
                </div>
            </div>
            <div class="tab-pane fade show " id="nav-distinguishes" role="tabpanel" aria-labelledby="nav-distinguishes-tab"
                tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.home.distinguishes')
                </div>

                <div class="tableSpace">

                    <table class="not">
                        <thead>


                            <tr>
                                <th>الوصف</th>
                                <th> الإجراءات </th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach (App\Models\distinguishe::get() as $distinguishe)
                                <tr>

                                    <td>{{ $distinguishe->dis }}</td>

                                    <td data-text="الإجراءات">
                                        <div>

                                            <div type="button" data-id="{{ $distinguishe->id }}"
                                                data-dis="{{ $distinguishe->dis }}"
                                                onclick="show_new_value_model_distinguishe(this)" data-bs-toggle="modal"
                                                data-bs-target="#distinguishe_update" data-tippy-content="تعديل"
                                                class="square-btn ltr has-tip">
                                                <i class="far fa-edit mr-2 icon" aria-hidden="true"></i>
                                            </div>

                                            <div type="button" data-id="{{ $distinguishe->id }}"
                                                data-name="{{ $distinguishe->dis }}"
                                                onclick="show_delete_model_distinguishe(this)" data-bs-toggle="modal"
                                                data-bs-target="#distinguishe_model" data-tippy-content="حذف"
                                                class="square-btn ltr has-tip"><i class="far fa-trash-alt mr-2 icon"
                                                    aria-hidden="true"></i></div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                    <form method="post" action="{{ url('admin/saying/destroy') }}" class="modal fade" id="exampleModal2"
                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        @csrf
                        @method('delete')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من ازالة ؟</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <input type="hidden" name="say_id">

                                <div class="modal-body">

                                    <div id="model_title"> </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-danger">ازالة</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">اغلاق</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="{{ url('admin/distinguishes/destroy') }}" class="modal fade"
                        id="distinguishe_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        @csrf
                        @method('delete')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من ازالة ؟</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <input type="hidden" name="distinguishe_id">

                                <div class="modal-body">

                                    <div id="model_title_distinguishe"> </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-danger">ازالة</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">اغلاق</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>


            </div>

            {{-- <div class="tab-pane fade show " id="nav-saying" role="tabpanel" aria-labelledby="nav-saying-tab"
                tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.home.saying')
                </div>


            </div>
 --}}

            <div class="tab-pane fade show " id="nav-call_us" role="tabpanel" aria-labelledby="nav-call_us-tab"
                tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.home.call_us')
                </div>

            </div>


        </div>
    </div>

    <form method="post" action="{{ url('admin/saying/update') }}" class="modal fade" id="theForm6" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        @method('PUT')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغير البيانات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="say_id">

                    <x-admin.forms.input for="name" class="checkThis" lable_title="الاسم" id="name"
                        name="name" placeholder="الاسم">
                    </x-admin.forms.input>

                    <div data-title="الوصف" class="col-12 mb-4">

                        <label for="dis">الوصف</label>
                        <textarea class="checkThis" name="dis" cols="30" rows="10" id="dis"></textarea>
                    </div>


                    <div class="col-12" title="النجوم">
                        <x-admin.forms.input class="checkThis"  min="0" max="5" type="number" id="stars" for="stars" value="5" lable_title="عدد النجوم" name="stars" >
                        </x-admin.forms.input>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" onclick="validate('theForm6')" class="btn btn-primary">حفط التغيرات</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </form>

    <form method="post" action="{{ url('admin/distinguishes/update') }}" class="modal fade" id="distinguishe_update"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        @method('PUT')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغير البيانات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="distinguishe_id">



                    <div data-title="الوصف" class="col-12 mb-4">

                        <label for="dis">الوصف</label>
                        <textarea class="checkThis" name="dis" cols="30" rows="10" id="distinguishe_dis"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" onclick="validate('distinguishe_update')" class="btn btn-primary">حفط
                        التغيرات</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('js')
    <script>
        $('aside .home').addClass('active');
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Read the URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const activeTab = urlParams.get("tab");

            // Function to remove active class from other tabs
            function removeActiveFromTabs() {
                const tabs = document.querySelectorAll(".nav-link");
                const tabContents = document.querySelectorAll(".tab-pane");
                tabs.forEach((tab) => {
                    tab.classList.remove("active");
                    tab.setAttribute("aria-selected", "false");
                });
                tabContents.forEach((tabContent) => {
                    tabContent.classList.remove("show", "active");
                });
            }


            // Activate the tab based on the URL parameter
            if (activeTab === "nav-header") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-header-tab");
                const navImgsTabContent = document.getElementById("nav-header");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");
            } else if (activeTab === "nav-about") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-about-tab");
                const navImgsTabContent = document.getElementById("nav-about");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");

            } else if (activeTab === "nav-what_saying") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-what_saying-tab");
                const navImgsTabContent = document.getElementById("nav-what_saying");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");
            } else if (activeTab === "nav-call_us") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-call_us-tab");
                const navImgsTabContent = document.getElementById("nav-call_us");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");
            } else if (activeTab === "nav-saying") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-saying-tab");
                const navImgsTabContent = document.getElementById("nav-saying");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");
            } else if (activeTab === "nav-distinguishes") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-distinguishes-tab");
                const navImgsTabContent = document.getElementById("nav-distinguishes");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");
            }

        });

        function change(tab) {
            const urlWithoutTab = window.location.href.split("?")[0];
            const newUrl = urlWithoutTab + `?tab=${tab}`;
            window.history.replaceState({}, "", newUrl);
        }

        function show_new_value_model(e) {
            event.stopPropagation();
            let element = e;
            let data_id = element.getAttribute('data-id')

            $("#name").val(element.getAttribute('data-name'))
            $("#stars").val(element.getAttribute('data-stars'))
            $("#dis").val(element.getAttribute('data-dis'))

            $("input[name='say_id']").val(data_id)
        }



        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            console.log(data_name);

            $('#model_title').text(data_name);

            $("input[name='say_id']").val(data_id)

        }


        function show_delete_model_distinguishe(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            console.log(data_name);

            $('#model_title_distinguishe').text(data_name);

            $("input[name='distinguishe_id']").val(data_id)

        }


        function show_new_value_model_distinguishe(e) {
            event.stopPropagation();
            let element = e;
            let data_id = element.getAttribute('data-id')

            $("#distinguishe_dis").val(element.getAttribute('data-dis'))

            $("input[name='distinguishe_id']").val(data_id)
        }
    </script>

    <script>
        function add_form() {
            Swal.fire({
                title: "اضافة ميزة",
                html: `<form action="/admin/distinguishes" class=" mt-2 w-100" method="post" id="distinguishes_form">
                    @csrf



                        <label for="dis">الوصف</label>
                        <textarea class="checkThis" name="dis"  rows="5"></textarea>


                    <div class="p-2">
                        <button type="button" onclick="validate('distinguishes_form')" class="mainBtn mt-3">اضافة</button>
                    </div>
                </form>
                `,
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false
            });
        }
    </script>

    <script>
        function add_say() {
            Swal.fire({
                title: "اضافة رائ جديد",
                html: `<form action="/admin/saying"  method="post" id="theForm4">
    @csrf


    <div class="col-12" title="الاسم">
        <x-admin.forms.input class="checkThis" for="name" lable_title="الاسم" name="name" placeholder="الاسم">
        </x-admin.forms.input>
    </div>


    <div data-title="الوصف" class="col-12 mb-2">
        <label for="dis">الوصف</label>
        <textarea class="checkThis" name="dis" cols="15" rows="5"></textarea>
    </div>

    <div class="col-12" title="النجوم">
        <x-admin.forms.input class="checkThis" type="number"  min="0" max="5"  for="stars" value="5" lable_title="عدد النجوم" name="stars" >
        </x-admin.forms.input>
    </div>


    <div class="p-2">
        <button type="button" onclick="validate('theForm4')" class="mainBtn mt-3">اضافة رائ</button>
    </div>
</form>
                `,
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false
            });
        }
    </script>
@endsection
