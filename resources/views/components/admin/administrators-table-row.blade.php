<tr @class([
        'bg-gray-100' => $loop->odd,
]) class="border-t border-b border-gray-700 border-collapse">
    <td class="py-1 pl-3 text-sm">{{ $administrator->name }}</td>
    <td class="py-1 pl-3 text-sm">{{ $administrator->username }}</td>
    <td class="py-1 pl-3 md:table-cell hidden text-sm">{{ $administrator->email }}</td>
    <td class="py-1 pl-3 text-sm flex flex-row items-center justify-start gap-x-2">
        <form class="inline" id="edit-{{ $administrator->id }}" method="get" action="/admin/administrator/{{ $administrator->id }}/modifica">
            @csrf
            <button form="edit-{{ $administrator->id }}" type="submit" class="border border-gray-700 rounded-full px-3 py-1 bg-yellow-200 font-semibold">
                <img src="{{ asset('cms/images/edit.png') }}" alt="edit icon" class="h-5">
            </button>
        </form>
        <form class="inline" id="delete-{{ $administrator->id }}" method="post" action="/admin/administrator/{{ $administrator->id }}">
            @csrf
            @method('delete')
            <button type="submit" form="delete-{{ $administrator->id }}" onclick="return confirm('Sei sicuro di volerlo eliminare?')" class="border border-gray-700 rounded-full px-3 py-1 bg-red-300 font-semibold">
                <img src="{{ asset('cms/images/delete.png') }}" alt="delete icon" class="h-5">
            </button>
        </form>
    </td>
</tr>

