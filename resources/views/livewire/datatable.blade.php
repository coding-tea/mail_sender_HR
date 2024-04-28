<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
            {{ $title }}
            <p class="mt-1 text-sm font-normal text-gray-500"> {{ $description }} </p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                @isset($heads)
                    @foreach ($heads as $item)
                        <th scope="col" class="px-6 py-3">
                            {{ $item->getTitle() }}
                        </th>
                    @endforeach
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                @endisset
            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach ($data as $item)
                    <td class="px-6 py-4">
                        <input name="ids[]" type="checkbox" value="{{ $item->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ids">
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->email }}
                    </td>
                    <td class="px-6 py-4">
                        actions
                    </td>
                @endforeach
            @endisset

            {{ $data->links() }}
        </tbody>
    </table>
</div>
