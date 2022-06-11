@foreach ($childs as $parent)
<tr>
    <td>  {{ str_repeat('-', $count).' '.$parent->baslik }}</td>
    <td>{{ convert_to_date($parent->created_at) }}</td>
    <td>{!! $parent->durum == 1 
    ? '<span class="badge bg-soft-success text-success">Aktif</span>' 
    : '<span class="badge bg-soft-danger text-danger">Pasif</span>' !!}</td>
    <td>
        <a href="{{ url($url.'/update/'.$parent->id) }}" class="btn btn-sm btn-success">Güncelle</a>
        <a href="{{ url($url.'/destroy/'.$parent->id) }}" class="btn btn-sm btn-danger delete">Sil</a>
    </td>
</tr>

@if($parent->childs->isNotEmpty())
    @include('admin.theme.menu.sublist', [
        'childs' => $parent->childs,
        'count' => $count+1
    ])
@endif
@endforeach