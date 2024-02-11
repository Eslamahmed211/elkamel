@extends('users.layout')


@section('body')
    <div class="bg-gradient-to-b from-[#fceddc] to-white relative px-3 py-5">
        <h1 style="text-align: center;font-weight: 900;font-size: 20px">{{ $page->title }}</h1>

        <div class="dis my-3">
            <?= $page->body ?>
        </div>
    </div>
@endsection
