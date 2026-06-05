{{--
    Reusable Sidebar Accordion Item
    ─────────────────────────────────
    Save as: resources/views/backend/partials/sidebar-item.blade.php
    Usage in sidebar:
        @include('backend.partials.sidebar-item', [
            'id'    => 'collapseProducts',
            'icon'  => 'fa-cubes',
            'label' => 'Products',
            'links' => [
                ['url' => route('product.index'),  'text' => 'All Products'],
                ['url' => route('product.create'), 'text' => 'Add Product'],
            ]
        ])
--}}

<li class="nav-item" style="position:relative; z-index:1;">
    <a class="nav-link collapsed"
       data-toggle="collapse"
       data-target="#{{ $id }}"
       aria-expanded="false"
       aria-controls="{{ $id }}"
       style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--muted); font-size:13.5px; font-weight:500; font-family:var(--font-b); margin:1px 8px; border-radius:10px; text-decoration:none; transition:all 0.2s; cursor:pointer; position:relative;"
       onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'; this.querySelectorAll('i')[0].style.color='var(--accent)'"
       onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'; this.querySelectorAll('i')[0].style.color='var(--dim)'">
        <i class="fas {{ $icon }}" style="font-size:13px; width:18px; text-align:center; color:var(--dim); transition:color 0.2s; flex-shrink:0;"></i>
        <span style="flex:1;">{{ $label }}</span>
        <i class="fas fa-chevron-right" style="font-size:9px; color:var(--dim); transition:transform 0.25s;" class="accordion-arrow"></i>
    </a>

    <div id="{{ $id }}" class="collapse" data-parent="#accordionSidebar">
        <div style="background:var(--surface-2); border:1px solid var(--border); border-radius:10px; margin:4px 8px 8px; padding:8px; box-shadow:0 8px 24px rgba(0,0,0,0.3);">
            @foreach($links as $link)
            <a href="{{ $link['url'] }}"
               style="display:flex; align-items:center; gap:8px; padding:9px 12px; border-radius:7px; font-size:13px; font-weight:500; color:var(--muted); text-decoration:none; font-family:var(--font-b); transition:all 0.15s;"
               onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'; this.querySelector('span').style.background='var(--accent)'"
               onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'; this.querySelector('span').style.background='var(--dim)'">
                <span style="width:5px; height:5px; background:var(--dim); border-radius:50%; flex-shrink:0; transition:background 0.2s;"></span>
                {{ $link['text'] }}
            </a>
            @endforeach
        </div>
    </div>
</li>