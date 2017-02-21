<?php $i=1; ?>
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Admin</h1>
            <h2>Most chosen products</h2>
            <p>
            <table>
                <tr>
                    <th>Rank</th>
                    <th>Product</th>
                    <th># Clicks</th>
                </tr>
                @foreach($clicks as $click)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $click->title }}</td>
                        <td>{{ $click->total }}</td>
                    </tr>
                @endforeach
            </table>
            </p>
            <p>
                <b>Total clicks: </b>{{ $totalcount }}
            </p>
            <p>
                <b>Location: </b>{{ $location->cityName }}, {{ $location->regionName }} ({{ $location->countryCode }})
            </p>
        </div>
    </div>
</div>
@endsection