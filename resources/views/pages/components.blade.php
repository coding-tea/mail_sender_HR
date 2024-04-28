@extends('layouts.layout')

@section('title', 'components')
@section('content')

    <x-modal_btn id="modal1"> open modal </x-modal_btn>
    <x-modal id="modal1" title="modal title example">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
        Debitis facilis in molestias dicta voluptatum eveniet eaque quaerat
        autem dolorum quia iste pariatur dolores dolor minus exercitationem,
        consectetur asperiores. Placeat, doloremque?
    </x-modal>

@endsection
