@extends('admin/layout')


@section('path')
    <ul class="paths">
        <li> <a href="{{ url('admin/courses?tab=nav-our_courses') }}"> دورتنا التدريبة / </a> </li>
        <li class="active"> {{ $course->title }} / </li>
        <li class="active"> معرض الصور </li>
    </ul>
@endsection

@section('content')
    <div class=" mt-lg-4 mx-3  ">
        <form action="/admin/courses/{{ $course->id }}/storeImgs" method="post" enctype="multipart/form-data">

            @csrf


            <div class=" bg-white px-1  mt-1 rounded row ">

                <div data-title="الصور" class="col-12  p-0 ">
                    <div class="bg-white  px-3 py-4 rounded">
                        <div class="ssi-uploader col-12">
                            <div class="contnet-title">صور المشروع</div>
                            <input type="file" id="ssi-uploader" multiple name="imgs[]" accept="image/*">

                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <x-admin.forms.mainBtn type="submit" icon="plus" title="اضافة صور جديدة" class="mt-3">
                        </x-admin.forms.mainBtn>
                    </div>
                </div>

                <div class="col-12 p-0 tableSpace ">
                    <p class="tip"><i aria-hidden="true" class="fas fa-info-circle "></i>

                        يمكن تغير ترتيب الصور من خلال الازرار او من خلال Drag and Drop

                    </p>

                    <table class="not">
                        <thead>

                            <tr class="not">
                                <th>#</th>

                                <th> صورة المنتج </th>
                                <th> الإجراءات </th>

                            </tr>

                        </thead>
                        <tbody>


                            @forelse ($course->imgs as $img)
                                <tr draggable='true' ondragstart='start()' ondragover='dragover()'>

                                    <input type="hidden" value="{{ $img->id }}" class="ids">


                                    @php
                                        $path = str_replace('public', 'storage', $img->img);
                                    @endphp

                                    <td>{{ $img->order }}</td>

                                    <td data-text='صورة المنتج '><img style="width: 100px;" class="prodcut_img"
                                            src="{{ asset("$path") }}"></td>


                                    <td data-text="الإجراءات">
                                        <div>
                                            <div onclick="up(this)" data-tippy-content="فوق" class="square-btn ltr has-tip">
                                                <i class=" fa-solid fa-up-long mr-2  icon" aria-hidden="true"></i>
                                            </div>

                                            <div onclick="down(this)" data-tippy-content="تحت"
                                                class="square-btn ltr has-tip">
                                                <i class=" fa-solid fa-down-long mr-2  icon" aria-hidden="true"></i>
                                            </div>

                                            <div type="button" data-id="{{ $img->id }}" data-name=""
                                                onclick="show_delete_model(this)" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-tippy-content="حذف"
                                                class="square-btn ltr has-tip"><i class="far fa-trash-alt mr-2 icon"
                                                    aria-hidden="true"></i></div>
                                        </div>

                                    </td>


                                </tr>

                            @empty
                                <tr>

                                    <td colspan="3">لا يوجد صور متاحة</td>
                                </tr>
                            @endforelse

                        </tbody>


                    </table>

                    @if (isset($course->imgs[0]))
                        <x-admin.forms.mainBtn onclick="UpdateOrder()" icon="update" title="تحديث" class="mt-3">
                        </x-admin.forms.mainBtn>
                    @endif

                </div>

            </div>

        </form>


        <x-admin.forms.deleteModel withoutTitle model="courses/course_images" id="img_id"></x-admin.forms.deleteModel>

    </div>
@endsection


@section('js')
    <script>
        $('#aside .courses').addClass('active');

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='img_id']").val(data_id)

        }

        $('#ssi-uploader').ssi_uploader({
            inForm: true,
            dropZone: true,
            allowed: ['jpg', 'jpeg', 'png', 'webp', 'gif'],
            allowDuplicates: false,
            maxFileSize: 10,


        });
    </script>
    <x-admin.extra.move model="courses/product_images"></x-admin.extra.move>
@endsection
