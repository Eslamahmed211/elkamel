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
            <div class="tab-pane fade show " id="nav-what_saying" role="tabpanel" aria-labelledby="nav-what_saying-tab" tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.home.what_saying')
                </div>
            </div>
            <div class="tab-pane fade show " id="nav-call_us" role="tabpanel" aria-labelledby="nav-call_us-tab" tabindex="0">
                <div class="py-3  px-2 mt-3 bg-white rounded">
                    @include('admin.home.call_us')
                </div>
            </div>


        </div>
    </div>
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
            }
            else if (activeTab === "nav-call_us") {
                removeActiveFromTabs(); // Remove active class from other tabs
                const navImgsTab = document.getElementById("nav-call_us-tab");
                const navImgsTabContent = document.getElementById("nav-call_us");
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
    </script>
@endsection
