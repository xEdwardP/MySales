@foreach ($items as $item)
    <tr class="text-center">
        <td>{{ $item->email }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->rol }}</td>
        <td>
            <a href="#" onclick="setIdUser({{ $item->id }})" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                data-bs-target="#change_password">
                <i class="fa-solid fa-user-lock"></i> Actualizar
        </td>
        <td class="text-center">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $item->id }}"
                    {{ $item->active ? 'checked' : '' }}>
            </div>
        </td>
        <td>
            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-sm">
                <i class="fa-solid fa-user-pen"></i> Editar
            </a>
        </td>
    </tr>
@endforeach
