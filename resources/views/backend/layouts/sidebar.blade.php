<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: var(--surface) !important; border-right: 1px solid var(--border); width: 260px; min-height: 100vh; position: relative; overflow: hidden; overflow-y: auto;">

    <!-- Background glow -->
    <div style="position:absolute; top:0; left:-60px; right:-60px; height:260px; background:radial-gradient(ellipse at 50% 0%, rgba(0,194,255,0.07) 0%, transparent 70%); pointer-events:none; z-index:0;"></div>

    <!-- ── BRAND ── -->
    <a class="sidebar-brand" href="{{route('admin')}}"
       style="display:flex; flex-direction:column; align-items:flex-start; padding:22px 20px; border-bottom:1px solid var(--border); text-decoration:none; position:relative; z-index:1;">
        <!-- Accent line -->
        <div style="position:absolute; bottom:0; left:20px; right:20px; height:1px; background:linear-gradient(90deg, var(--accent), transparent);"></div>

        <div style="display:flex; align-items:center; justify-content:center; width:40px; height:40px; background:var(--accent-dim); border:1px solid rgba(0,194,255,0.25); border-radius:10px; color:var(--accent); font-size:17px; margin-bottom:10px; transition:all 0.3s;">
            <i class="fas fa-industry"></i>
        </div>
        <div style="font-family:var(--font-d); font-size:14px; font-weight:800; color:var(--text); line-height:1.2; letter-spacing:0.01em;">
            Petchemparts
        </div>
        <div style="font-family:var(--font-m); font-size:9.5px; color:var(--muted); letter-spacing:0.14em; text-transform:uppercase; margin-top:3px;">
            Admin Dashboard
        </div>
    </a>

    <!-- ── DASHBOARD ── -->
    <li class="nav-item active" style="position:relative; z-index:1; margin-top:8px;">
        <a class="nav-link" href="{{route('admin')}}"
           style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--accent); font-size:13.5px; font-weight:600; font-family:var(--font-b); margin:1px 8px; border-radius:10px; background:var(--accent-dim); text-decoration:none; position:relative;">
            <span style="position:absolute; left:0; top:20%; bottom:20%; width:3px; background:var(--accent); border-radius:0 3px 3px 0;"></span>
            <i class="fas fa-tachometer-alt" style="font-size:13px; width:18px; text-align:center; color:var(--accent);"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr style="border-top:1px solid var(--border); margin:8px 16px;">

    <!-- ── BANNERS ── -->
    @include('backend.layouts.sidebar-item', [
        'id'     => 'collapseTwo',
        'icon'   => 'fa-image',
        'label'  => 'Banners',
        'links'  => [
            ['url' => route('banner.index'),  'text' => 'All Banners'],
            ['url' => route('banner.create'), 'text' => 'Add Banner'],
        ]
    ])

    <!-- ── CATEGORIES ── -->
    @include('backend.layouts.sidebar-item', [
        'id'     => 'categoryCollapse',
        'icon'   => 'fa-sitemap',
        'label'  => 'Categories',
        'links'  => [
            ['url' => route('category.index'),  'text' => 'All Categories'],
            ['url' => route('category.create'), 'text' => 'Add Category'],
        ]
    ])

    <!-- ── PRODUCTS ── -->
    @include('backend.layouts.sidebar-item', [
        'id'     => 'productCollapse',
        'icon'   => 'fa-cubes',
        'label'  => 'Products',
        'links'  => [
            ['url' => route('product.index'),  'text' => 'All Products'],
            ['url' => route('product.create'), 'text' => 'Add Product'],
        ]
    ])

    <!-- ── PDF (single link) ── -->
    <li class="nav-item" style="position:relative; z-index:1;">
        <a class="nav-link" href="{{ route('pdf.index') }}"
           style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--muted); font-size:13.5px; font-weight:500; font-family:var(--font-b); margin:1px 8px; border-radius:10px; text-decoration:none; transition:all 0.2s; position:relative;"
           onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'; this.querySelector('i').style.color='var(--accent)'"
           onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'; this.querySelector('i').style.color='var(--dim)'">
            <i class="fas fa-file-pdf" style="font-size:13px; width:18px; text-align:center; color:var(--dim); transition:color 0.2s;"></i>
            <span>PDF Files</span>
        </a>
    </li>

    <!-- ── BRANDS ── -->
    @include('backend.layouts.sidebar-item', [
        'id'     => 'brandCollapse',
        'icon'   => 'fa-copyright',
        'label'  => 'Brands',
        'links'  => [
            ['url' => route('brand.index'),  'text' => 'All Brands'],
            ['url' => route('brand.create'), 'text' => 'Add Brand'],
        ]
    ])

    <!-- ── MANUFACTURERS (single link) ── -->
    <li class="nav-item" style="position:relative; z-index:1;">
        <a class="nav-link" href="{{ route('manufacturer.index') }}"
           style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--muted); font-size:13.5px; font-weight:500; font-family:var(--font-b); margin:1px 8px; border-radius:10px; text-decoration:none; transition:all 0.2s; position:relative;"
           onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'; this.querySelector('i').style.color='var(--accent)'"
           onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'; this.querySelector('i').style.color='var(--dim)'">
            <i class="fas fa-industry" style="font-size:13px; width:18px; text-align:center; color:var(--dim); transition:color 0.2s;"></i>
            <span>Manufacturers</span>
        </a>
    </li>

    <!-- ── ORDERS (single link) ── -->
    <li class="nav-item" style="position:relative; z-index:1;">
        <a class="nav-link" href="{{route('order.index')}}"
           style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--muted); font-size:13.5px; font-weight:500; font-family:var(--font-b); margin:1px 8px; border-radius:10px; text-decoration:none; transition:all 0.2s; position:relative;"
           onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'; this.querySelector('i').style.color='var(--accent)'"
           onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'; this.querySelector('i').style.color='var(--dim)'">
            <i class="fas fa-shopping-bag" style="font-size:13px; width:18px; text-align:center; color:var(--dim); transition:color 0.2s;"></i>
            <span>Orders</span>
        </a>
    </li>

    <hr style="border-top:1px solid var(--border); margin:8px 16px;">

    <!-- ── BLOGS ── -->
    @include('backend.layouts.sidebar-item', [
        'id'     => 'postCollapse',
        'icon'   => 'fa-rss',
        'label'  => 'Blogs',
        'links'  => [
            ['url' => route('post.index'),  'text' => 'All Blogs'],
            ['url' => route('post.create'), 'text' => 'Add Blog'],
        ]
    ])

    <hr style="border-top:1px solid var(--border); margin:8px 16px;">

    <!-- ── GENERAL SETTINGS HEADING ── -->
    <div style="font-family:var(--font-m); font-size:9px; font-weight:500; color:var(--dim); letter-spacing:0.18em; text-transform:uppercase; padding:10px 20px 6px; position:relative; z-index:1;">
        General Settings
    </div>

    <!-- ── USERS ── -->
    <li class="nav-item" style="position:relative; z-index:1;">
        <a class="nav-link" href="{{route('users.index')}}"
           style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--muted); font-size:13.5px; font-weight:500; font-family:var(--font-b); margin:1px 8px; border-radius:10px; text-decoration:none; transition:all 0.2s; position:relative;"
           onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'; this.querySelector('i').style.color='var(--accent)'"
           onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'; this.querySelector('i').style.color='var(--dim)'">
            <i class="fas fa-users" style="font-size:13px; width:18px; text-align:center; color:var(--dim); transition:color 0.2s;"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- ── SETTINGS ── -->
    <li class="nav-item" style="position:relative; z-index:1;">
        <a class="nav-link" href="{{route('settings')}}"
           style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--muted); font-size:13.5px; font-weight:500; font-family:var(--font-b); margin:1px 8px; border-radius:10px; text-decoration:none; transition:all 0.2s; position:relative;"
           onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'; this.querySelector('i').style.color='var(--accent)'"
           onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'; this.querySelector('i').style.color='var(--dim)'">
            <i class="fas fa-cog" style="font-size:13px; width:18px; text-align:center; color:var(--dim); transition:color 0.2s;"></i>
            <span>Settings</span>
        </a>
    </li>

    <!-- ── COLLAPSE TOGGLE BUTTON ── -->
    <div class="text-center d-none d-md-inline" style="padding:16px 0 20px; position:relative; z-index:1;">
        <button id="sidebarToggle"
                style="background:var(--surface-2); border:1px solid var(--border); border-radius:50%; width:32px; height:32px; display:inline-flex; align-items:center; justify-content:center; color:var(--muted); cursor:pointer; transition:all 0.2s;"
                onmouseover="this.style.background='var(--accent-dim)'; this.style.borderColor='rgba(0,194,255,0.3)'; this.style.color='var(--accent)'"
                onmouseout="this.style.background='var(--surface-2)'; this.style.borderColor='var(--border)'; this.style.color='var(--muted)'">
        </button>
    </div>

</ul>

{{-- ──────────────────────────────────────────────────────────
     REUSABLE SIDEBAR ACCORDION ITEM
     Save this as: resources/views/backend/partials/sidebar-item.blade.php
     ────────────────────────────────────────────────────────── --}}
{{--
@props(['id', 'icon', 'label', 'links'])

<li class="nav-item" style="position:relative; z-index:1;">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#{{ $id }}"
       aria-expanded="false" aria-controls="{{ $id }}"
       style="display:flex; align-items:center; gap:11px; padding:11px 12px; color:var(--muted); font-size:13.5px; font-weight:500; font-family:var(--font-b); margin:1px 8px; border-radius:10px; text-decoration:none; transition:all 0.2s; cursor:pointer;"
       onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'"
       onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'">
        <i class="fas {{ $icon }}" style="font-size:13px; width:18px; text-align:center; color:var(--dim);"></i>
        <span style="flex:1;">{{ $label }}</span>
        <i class="fas fa-chevron-right" style="font-size:9px; color:var(--dim); transition:transform 0.2s;"></i>
    </a>
    <div id="{{ $id }}" class="collapse" data-parent="#accordionSidebar">
        <div style="background:var(--surface-2); border:1px solid var(--border); border-radius:10px; margin:4px 8px 8px; padding:8px; box-shadow:0 8px 24px rgba(0,0,0,0.3);">
            @foreach($links as $link)
            <a href="{{ $link['url'] }}"
               style="display:flex; align-items:center; gap:8px; padding:9px 12px; border-radius:7px; font-size:13px; font-weight:500; color:var(--muted); text-decoration:none; font-family:var(--font-b); transition:all 0.15s;"
               onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'"
               onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'">
                <span style="width:5px; height:5px; background:var(--dim); border-radius:50%; flex-shrink:0; transition:background 0.2s;"></span>
                {{ $link['text'] }}
            </a>
            @endforeach
        </div>
    </div>
</li>
--}}