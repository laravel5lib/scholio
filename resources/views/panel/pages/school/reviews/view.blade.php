@extends('panel.layouts.main')

@section('styles')


@endsection

@section('content')
    <schools-reviews></schools-reviews>
@endsection

@section('scriptsBefore')
    <script src="{{ asset('/new/js/jquery.raty-fa.js') }}"></script>
    <script src="{{ asset('/new/js/jquery.arctext.js') }}"></script>
@endsection

@section('scripts')

@endsection