@extends('layouts.app')

@section('content')
<h1>Companies</h1>


<a href="{{ route('companies.create') }}">{{ __('新規作成') }}</a>
<table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Postcode</th>
        <th>Prefecture</th>
        <th>Address</th>
        <th>Updated At<th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($companies as $company)
        <tr>
          <td>{{ $company->name }}</td>
          <td>{{ $company->email }}</td>
          <td>{{ $company->postcode }}</td>
          <td>{{-- $companies->prefecture --}}</td>
          <td>{{-- $companies->address --}}</td>
          <td>{{-- date('Y/m/d', $timestamp) --}}</td>
          <td><a href="{{ route('companies.edit', $company->id) }}">編集</a></td>
        </tr>

      @endforeach
    </tbody>
  </table>
@endsection
