@extends('admin.layout')


@section('content')
    <div class="w-100">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button onclick="change('nav-header')" class="nav-link active" id="nav-header-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-header" type="button" role="tab" aria-controls="nav-header"
                    aria-selected="true">الهيدر</button>


                <button onclick="change('nav-our_courses')" class="nav-link " id="nav-our_courses-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-our_courses" type="button" role="tab"
                    aria-controls="nav-our_courses" aria-selected="true">
                    دورتنا التدريبة</button>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-header" role="tabpanel" aria-labelledby="nav-header-tab"
                tabindex="0">
                <div class="py-3 px-2 mt-3 bg-white rounded">
                    @include('admin.courses.header')
                </div>




            </div>

            <div class="tab-pane fade show " id="nav-our_courses" role="tabpanel" aria-labelledby="nav-our_courses-tab"
                tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.courses.our_courses')
                </div>


                <div class="tableSpace">

                    <table class="not">
                        <thead>


                            <tr>
                                <th>عنوان الدورة</th>
                                <th> الإجراءات </th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($courses as $course)
                                <tr>


                                    <td>{{ $course->title }}</td>

                                    <td data-text="الإجراءات">
                                        <div>
                                            <div onclick='window.location.href = "/admin/courses/{{ $course->id }}/edit"'
                                                data-tippy-content="تعديل" class="square-btn ltr has-tip"><i
                                                    class="far fa-edit mr-2 icon" aria-hidden="true"></i></div>
                                            <div onclick='window.location.href = "/admin/courses/{{ $course->id }}/imgs"'
                                                data-tippy-content="معرض الصور" class="square-btn ltr has-tip"><i
                                                    class="fa-solid fa-image mr-2 icon" aria-hidden="true"></i></div>

                                            <div type="button" data-id="{{ $course->id }}"
                                                data-name="{{ $course->title }}" onclick="show_delete_model(this)"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                                    class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <x-admin.forms.deleteModel model="courses" id="course_id"></x-admin.forms.deleteModel>

                </div>
            </div>


        </div>
    </div>
@endsection


@section('js')
    <script>
        $('aside .courses').addClass('active');

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='course_id']").val(data_id)

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
            } else if (activeTab === "nav-our_courses") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-our_courses-tab");
                const navImgsTabContent = document.getElementById("nav-our_courses");
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


        flatpickr('input.date', {
            enableTime: false,
            dateFormat: "Y-m-d"
        });
    </script>
@endsection