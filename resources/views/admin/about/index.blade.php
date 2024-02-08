@extends('admin.layout')


@section('content')
    <div class="w-100 mt-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button onclick="change('nav-header')" class="nav-link active" id="nav-header-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-header" type="button" role="tab" aria-controls="nav-header"
                    aria-selected="true">الهيدر</button>

                <button onclick="change('nav-sec2')" class="nav-link " id="nav-sec2-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-sec2" type="button" role="tab" aria-controls="nav-sec2" aria-selected="true">
                    عن المكتب</button>

                <button onclick="change('nav-mission')" class="nav-link " id="nav-mission-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-mission" type="button" role="tab" aria-controls="nav-mission"
                    aria-selected="true">
                    مهمتنا واهدافنا
                </button>

                <button onclick="change('nav-feature')" class="nav-link " id="nav-feature-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-feature" type="button" role="tab" aria-controls="nav-feature"
                    aria-selected="true">
                    ما الذي يميزنا
                </button>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-header" role="tabpanel" aria-labelledby="nav-header-tab"
                tabindex="0">
                <div class="py-3 px-2 mt-3 bg-white rounded">
                    @include('admin.about.header')
                </div>
            </div>

            <div class="tab-pane fade show " id="nav-sec2" role="tabpanel" aria-labelledby="nav-sec2-tab" tabindex="0">
                <div class="py-3 px-2 mt-3 bg-white rounded">
                    @include('admin.about.sec2')
                </div>
            </div>

            <div class="tab-pane fade show " id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab"
                tabindex="0">
                <div class="py-3 px-2 mt-3 bg-white rounded">
                    @include('admin.about.mission')
                </div>

                <div class="tableSpace">

                    <table class="not">
                        <thead>


                            <tr>
                                <th>العنوان </th>
                                <th> الإجراءات </th>
                            </tr>

                        </thead>

                        <tbody>


                            @forelse ($missions as $mission)
                                <tr>

                                    <td>{{ $mission->title }}</td>

                                    <td data-text="الإجراءات">
                                        <div>
                                            <div onclick='window.location.href = "/admin/missions/{{ $mission->id }}/edit"'
                                                data-tippy-content="تعديل" class="square-btn ltr has-tip"><i
                                                    class="far fa-edit mr-2 icon" aria-hidden="true"></i></div>

                                            <div type="button" data-id="{{ $mission->id }}"
                                                data-name="{{ $mission->title }}" onclick="show_delete_model(this)"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                                    class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">لا يوجد بيانات</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                    <x-admin.forms.deleteModel model="missions" id="mission_id"></x-admin.forms.deleteModel>

                </div>
            </div>

            <div class="tab-pane fade show " id="nav-feature" role="tabpanel" aria-labelledby="nav-feature-tab"
                tabindex="0">
                <div class="py-3 px-2 mt-3 bg-white rounded">
                    @include('admin.about.feature')
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

                            @foreach (App\Models\feature::get() as $feature)
                                <tr>

                                    <td>{{ $feature->title }}</td>

                                    <td data-text="الإجراءات">
                                        <div>

                                            <div type="button" data-id="{{ $feature->id }}"
                                                data-title="{{ $feature->title }}" data-dis="{{ $feature->dis }}"
                                                onclick="show_new_value_model(this)" data-bs-toggle="modal"
                                                data-bs-target="#theForm" data-tippy-content="تعديل"
                                                class="square-btn ltr has-tip">
                                                <i class="far fa-edit mr-2 icon" aria-hidden="true"></i>
                                            </div>

                                            <div type="button" data-id="{{ $feature->id }}"
                                                data-name="{{ $feature->title }}" onclick="show_delete_model_serve(this)"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                                data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                                    class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                    <form method="post" action="{{ url('admin/features/destroy') }}" class="modal fade"
                        id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        @csrf
                        @method('delete')
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد من ازالة ؟</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <input type="hidden" name="feature_id">

                                <div class="modal-body">

                                    <div id="model_title2"> </div>
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
        </div>
    </div>



    <form method="post" action="{{ url('admin/features/update') }}" class="modal fade" id="theForm" tabindex="-1"
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
                    <input type="hidden" name="feature_id">

                    <x-admin.forms.input for="title" class="checkThis" lable_title="العنوان" id="title"
                        name="title" placeholder="العنوان">
                    </x-admin.forms.input>

                    <div data-title="الوصف" class="col-12 mb-4">

                        <label for="dis">الوصف</label>
                        <textarea class="checkThis" name="dis" cols="30" rows="10" id="dis"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" onclick="validate()" class="btn btn-primary">حفط التغيرات</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('js')
    <script>
        $('aside .about').addClass('active');

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='mission_id']").val(data_id)

        }

        function show_delete_model_serve(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title2').text(data_name);

            $("input[name='feature_id']").val(data_id)

        }
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
            } else if (activeTab === "nav-sec2") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-sec2-tab");
                const navImgsTabContent = document.getElementById("nav-sec2");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");
            } else if (activeTab === "nav-mission") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-mission-tab");
                const navImgsTabContent = document.getElementById("nav-mission");
                navImgsTab.classList.add("active");
                navImgsTab.setAttribute("aria-selected", "true");
                navImgsTabContent.classList.add("show", "active");

            } else if (activeTab === "nav-feature") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-feature-tab");
                const navImgsTabContent = document.getElementById("nav-feature");
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

            $("#title").val(element.getAttribute('data-title'))
            $("#dis").val(element.getAttribute('data-dis'))

            $("input[name='feature_id']").val(data_id)
        }
    </script>
@endsection
