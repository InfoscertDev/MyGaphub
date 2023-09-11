@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
@endsection

@section('content')
<div class="row">
    <div>
        <example-component></example-component>
        <nonportfolio-view></nonportfolio-view>
        <nonportfolio-component></nonportfolio-component>
    </div>
</div>

@endsection
