<table class="w-full my-3">
    <thead>
    <tr class="rounded-md bg-theme text-white">
        @forelse($columns as $colDisplay => $col)
            <th class="border-b-2 border-theme-light p-1.5">{{ $colDisplay }}</th>
        @empty
            <th class="border-b-2 border-theme-dark p-1.5">{!! __('table.no_column') !!}</th>
        @endforelse
    </tr>
    </thead>
    <tbody>
    @forelse ($elements as $elt)
        <tr class="hover:bg-gray-50 dark:hover:bg-dark">
            @foreach($columns as $col)
                <td class="border-t-2 border-dotted border-theme-dark p-1.5">{{ $elt[$col] }}</td>
            @endforeach
        </tr>
    @empty
        <tr>
            <td>{{ $slot }}</td>
        </tr>
    @endforelse
    </tbody>
</table>
