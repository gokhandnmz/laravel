<ul class="sub-menu">
    @foreach ($childs as $parent)
        <li class="{{ $parent->childs->isNotEmpty() ? 'has-sub-child' : '' }}">
            
            <a href="
            {{ 
                $parent->ozel_url != "" 
                ? url($parent->ozel_url)
                : url($parent->slug != NULL ? $parent->slug : '') 
            }}" 
            {{ $parent->ozel_url != "" ? 'target="_blank"' : '' }}
            >{{ $parent->baslik }}</a>
        @if($parent->childs->isNotEmpty())
            @include('theme.menu', [
                'childs' => $parent->childs
            ])
        @endif
</li>	
    @endforeach
</ul>