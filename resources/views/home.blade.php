@extends('layout.app')

@section('content')
    <div class="datacontainer">
        <div id="datacontainer"></div>
    </div>

    <script>
        let getApiUrl = "{{ route('index.data') }}";
    </script>
@endsection
