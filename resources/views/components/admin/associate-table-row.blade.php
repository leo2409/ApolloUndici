<tr @class([
        'bg-green-300' => $user->status === 'attivo',
        'bg-yellow-300' => $user->status === 'rinnovo' || $user->status === 'nuovo',
        'bg-red-300' => $user->status === 'rifiutato',
        'border-t', 'border-b', 'border-gray-700', 'border-collapse', 'py-2',
])>
    <td class="px-3 py-1">{{ $user->name }}</td>
    <td class="px-3 py-1">{{ $user->status }}</td>
    <td class="px-3 py-1">
        @if(!$user->accepted || $user->accepted == null)
            <button id="accept-button" onclick="acceptAssociate({{ $user->id }})" type="button" class="border border-gray-700 rounded-full px-3 py-1 bg-blue-300 font-semibold">Accetta</button>
        @endif
        @if($user->status != 'attivo')
                <button id="pay-button" onclick="accept({{ $user->id }})" type="button" class="border border-gray-700 rounded-full px-3 py-1 bg-blue-300 font-semibold hidden">{{ $user->accepted ? 'Paga' : 'Accetta e Paga' }}</button>
        @endif
    </td>
</tr>
