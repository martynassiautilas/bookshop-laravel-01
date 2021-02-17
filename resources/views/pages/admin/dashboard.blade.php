@extends('template.layout.base')

@section('content')
<a href="{{ route('admin.book.index') }}">Knygu valdymas</a>
<a href="{{ route('admin.user.index') }}">Vartotoju valdymas</a>
@endsection
