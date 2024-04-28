<li role="presentation">
    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="{{ $id }}"
        data-tabs-target="#{{ $tab }}" type="button" role="tab" aria-controls="{{ $tab }}"
        aria-selected="false"> {{ $slot }} </button>
</li>