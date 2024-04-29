@extends('layouts.layout')

@section('title', 'Emails')

@section('breadcrumb')
    <x-breadcrumb :breadcrumb="$breadcrumb" />
@endsection

@section('content')
    <x-card>
        <x-datatable title="Emails List" description="Emails List Description" :heads="$heads" :actions="$actions"
            :queryBuilder="$queryBuilder" showRoute="email.show" deleteRoute="email.destroy" />
    </x-card>

    <x-card>
        <x-export_import exportRoute="email.export" importRoute="email.import" downloadRoute="email.download">

            {{-- <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Select an --}}
                {{-- option</label> --}}
            <select id="category" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Choose a catgeory</option>
                @foreach (\App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                @endforeach
            </select>

        </x-export_import>
    </x-card>
@endsection
