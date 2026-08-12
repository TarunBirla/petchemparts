  @php
        $categories = DB::table('categories')
            ->where('status', 'active')
            ->whereNull('parent_id')
            ->limit(6)
            ->get();

        $catProductCounts = DB::table('products')
            ->where('status', 'active')
            ->selectRaw('cat_id, count(*) as total')
            ->groupBy('cat_id')
            ->pluck('total', 'cat_id');

       
    @endphp
 <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <a href="/" class="logo footer-logo" style="margin-bottom:18px;display:flex;">
                    <img src="/brands/logo.png" alt="Petchem Parts"
                        onerror="this.style.display='none';this.nextElementSibling.style.display='inline';">
                    <span class="sub" style="display:none;">PETCHEMPARTS.CO</span>
                </a>
                <p style="color:var(--ink-soft);font-size:13.5px;max-width:280px;line-height:1.65;">Global spare parts
                    sourcing for petrochemical, industrial, oil &amp; gas infrastructure since 2009.</p>
            </div>
            <div class="footer-col">
                <h4>Catalog</h4>
                 
                <ul>
                    @foreach($categories as $i => $cat)
                    
                    <li><a href="{{ route('product-cat', $cat->slug) }}">{{ $cat->title }}</a></li>
                    
                @endforeach

                </ul>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">About Petchem</a></li>
                    <li><a href="#">Brand Partners</a></li>
                    <li><a href="#">Engineering Desk</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#">+44 1234 440530</a></li>
                    <li><a href="#">sales@petchemparts.com</a></li>
                    <li><a href="#">Request Callback</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2026 Petchem Parts. All trademarks belong to their respective owners.</span>
            <span>Privacy · Terms · Modern Slavery Statement</span>
        </div>
    </footer>