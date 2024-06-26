@extends('master')

@section('content')

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Question</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listRespondent as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->question}}</td>
            <td>{{$item->type}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Question</th>
            <th>Type</th>
        </tr>
    </tfoot>
</table>

@endsection

@section('scripts')
<script>
    new DataTable('#example');
 </script>
@endsection
