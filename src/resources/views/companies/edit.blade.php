@extends('layouts.app')

@section('content')
    <h2>投稿編集</h2>
    <div>
        <form action='{{ route("companies.update",$companies -> id )}}' method='post'>
            @csrf
            Name:<input type='text' name='name' value='{{ $companies->name }}'><br>
            Email:<input type='text' name='email' value='{{ $companies->email }}'><br>
            Postcode:<input type='text' name='postcode' value='{{ $companies->postcode }}'><br>
            Prefecture:<input type='text' name='prefecture_id' value='{{ $companies->prefecture }}'><br>
            Address:<input type='text' name='street_address' value='{{ $companies->address }}'><br>
        </form>
    </div>
    <div>
        <a href="{{ route('companies.index') }}">企業一覧へ戻る</a>
    </div>
@endsection
