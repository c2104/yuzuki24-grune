@extends('layouts.app')

@section('content')
<h1>Companies</h1>

<div>
    <a href="{{ route('companies.create') }}">{{ __('新規作成') }}</a>
</div>
<table>
    <thead>
        <tr>
            <th style="padding: 5px;">Name</th>
            <th style="padding: 5px;">Email</th>
            <th style="padding: 5px;">Postcode</th>
            <th style="padding: 5px;">Prefecture</th>
            <th style="padding: 5px;">Address</th>
            <th style="padding: 5px;">Updated At</th>
            <th style="padding: 5px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td style="padding: 5px;">{{ $company->name }}</td>
                <td style="padding: 5px;">{{ $company->email }}</td>
                <td style="padding: 5px;">{{ $company->postcode }}</td>
                <td style="padding: 5px;">{{ $prefectures[$company->prefecture_id] }}</td>
                <td style="padding: 5px;">{{ $company->city.$company->local.$company->street_address }}</td>
                <td style="padding: 5px;">{{ $company->updated_at->format('Y/m/d') }}</td>
                <td style="padding: 5px;"><a href="{{ route('companies.edit', $company->id) }}">編集</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
