@extends('layouts.layout')

@section('title', 'Emails')

@section('breadcrumb')
    <x-breadcrumb :breadcrumb="$breadcrumb" />
@endsection

@section('content')
    <x-card>
        <x-datatable title="Emails List" description="Emails List Description" :heads="$heads"
            :actions="$actions" :queryBuilder="$queryBuilder" :showRoute="route('/c')" :deleteRoute="route('/c')" />
    </x-card>

    <x-card>
        <x-export_import :exportRoute="route('/c')" :importRoute="route('/c')" />
    </x-card>
@endsection