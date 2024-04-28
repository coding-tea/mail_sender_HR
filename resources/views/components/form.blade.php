<form action="{{ $action }}" method="post">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900"> {{ $title }} </h2>
        <p class="mt-1 text-sm leading-6 text-gray-600"> {{ $description }} </p>
  
        <div class="mt-10">
            {!! $slot !!}
        </div>

      </div>
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>