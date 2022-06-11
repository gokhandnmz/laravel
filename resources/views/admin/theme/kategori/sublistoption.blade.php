@foreach ($childs as $parent)
    <option value="{{ $parent->id }}" data-id="{{ $parent_id }}"
        {{ $parent_id == $parent->id ? 'selected' : '' }}
        >{{ str_repeat("-", $count).' '.$parent->baslik }}</option>
@if($parent->childs->isNotEmpty())
    @include('admin.theme.kategori.sublistoption', [
        'childs' => $parent->childs,
        'count' => $count+1,
        'parent_id' => $parent_id
    ])
@endif
@endforeach