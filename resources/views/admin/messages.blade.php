@extends('admin.layout')


@section('content')
    <div class="actions">

        <div class="contnet-title  m-0"> الرسائل ( {{ count($messages) }} ) </div>


    </div>


    <div class="tableSpace">

        <table class="not">
            <thead>


                <tr>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>التليفون</th>
                    <th>الرسالة</th>
                    <th>التاريخ</th>
                    <th>الاجراءات</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($messages as $message)
                    <tr>

                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($message->message, 75) }}</td>
                        <td>{{ fixDate($message->created_at) }}</td>

                        <td data-text="الإجراءات">
                            <div>
                                <div onclick='show_message("{{ $message->message }}")' data-tippy-content="عرض الرسالة"
                                    class="square-btn ltr has-tip"><i class="fa-regular fa-eye mr-2 icon"></i></div>

                                <div type="button" data-id="{{ $message->id }}" data-name="{{ $message->name }}"
                                    onclick="show_delete_model(this)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-tippy-content="حذف" class="square-btn ltr has-tip"><i
                                        class="far fa-trash-alt mr-2 icon" aria-hidden="true"></i></div>

                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>


    </div>

    <x-admin.forms.deleteModel model="messages" id="message_id"></x-admin.forms.deleteModel>

@endsection


@section('js')
    <script>
        $('aside .messages').addClass('active');

        function show_message($message) {
            Swal.fire($message);
        }

        function show_delete_model(e) {

            event.stopPropagation();
            let element = e;
            let data_name = element.getAttribute('data-name')
            let data_id = element.getAttribute('data-id')

            $('#model_title').text(data_name);

            $("input[name='message_id']").val(data_id)

        }
    </script>
@endsection
