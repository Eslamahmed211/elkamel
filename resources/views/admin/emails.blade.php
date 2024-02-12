@extends('admin.layout')


@section('content')
    <div class="actions">

        <div class="contnet-title  m-0"> الايميلات ( {{ count($emails) }} ) </div>

        <div class="d-flex align-items-center gap-2">

            <a href="/admin/emails/export"><button class="asSearch"> تحميل الايميلات </button></a>


        </div>

    </div>


    <div class="tableSpace">

        <table class="not">
            <thead>


                <tr>
                    <th>الايميل</th>
                    <th>التاريخ</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($emails as $email)
                    <tr>

                        <td>{{ $email->email }}</td>
                        <td>{{ fixDate($email->created_at) }}</td>

                    </tr>
                @endforeach
            </tbody>

        </table>


    </div>
@endsection


@section('js')
    <script>
        $('aside .emails').addClass('active');
    </script>
@endsection
