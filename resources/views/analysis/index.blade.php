@extends('master')

<!-- Content Row -->
@section('content')


<table class="table">
    @foreach ($data as $keyCluster => $cluster)
    @if (isset($cluster))
    <thead>
        <tr>
            <th scope="col">Cluster {{ $keyCluster }} </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @php
            $childCluster = $cluster;
            @endphp
            @foreach ($childCluster as $item)
            <td>Cluster {{ $keyCluster }} - {{ implode(",",$item) }}</td>
            @endforeach
            @endif
        </tr>
    </tbody>
    @endforeach
</table>

@if (isset($userCorrespondentAverage))
<h1>Average: {{ $userCorrespondentAverage ?? 0 }}</h1>
@endif

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Purchase Frequency</th>
            <th>Correspondents</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userCorrespondent as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->age}}</td>
            <td>{{$item->gender}}</td>
            <td>{{$item->purchase_frequency}}</td>
            <td>{{$item->correspondents}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </tfoot>
</table>

@endsection

@section('scripts')
<script>
    new DataTable('#example');
 </script>
@endsection
