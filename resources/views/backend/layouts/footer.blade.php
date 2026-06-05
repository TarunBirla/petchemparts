<!-- ── FOOTER ── -->
      <footer class="sticky-footer"
              style="background: var(--surface); border-top: 1px solid var(--border); padding: 20px 0;">
          <div class="container my-auto">
              <div class="d-flex align-items-center justify-content-between flex-wrap" style="gap:10px; padding: 0 24px;">
                  <span style="font-family:var(--font-m); font-size:11px; color:var(--dim); letter-spacing:0.06em;">
                      &copy; {{date('Y')}} <a href="{{route('home')}}" target="_blank" style="color:var(--accent); text-decoration:none;">Petchemparts</a>
                      &mdash; All rights reserved.
                  </span>
                  <span style="font-family:var(--font-m); font-size:10px; color:var(--dim); letter-spacing:0.08em;">
                      v1.0.0
                  </span>
              </div>
          </div>
      </footer>

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <a class="scroll-to-top rounded" href="#page-top"
     style="background:var(--surface-2); border:1px solid var(--border-2); color:var(--muted); width:40px; height:40px; display:flex; align-items:center; justify-content:center; border-radius:10px !important; bottom:24px; right:24px; position:fixed; font-size:13px; text-decoration:none; transition:all 0.2s; z-index:1000; box-shadow:0 8px 24px rgba(0,0,0,0.4);"
     onmouseover="this.style.background='var(--accent)'; this.style.color='var(--bg)'; this.style.borderColor='var(--accent)'; this.style.transform='translateY(-2px)'"
     onmouseout="this.style.background='var(--surface-2)'; this.style.color='var(--muted)'; this.style.borderColor='var(--border-2)'; this.style.transform='none'">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="max-width:380px; margin:80px auto;">
      <div class="modal-content"
           style="background:var(--surface-2); border:1px solid var(--border-2); border-radius:16px; box-shadow:0 32px 64px rgba(0,0,0,0.7); overflow:hidden;">

        <div class="modal-header" style="border-bottom:1px solid var(--border); padding:20px 24px; background:transparent;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; background:rgba(255,71,87,0.12); border:1px solid rgba(255,71,87,0.25); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--red); font-size:14px;">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                <h5 style="font-family:var(--font-d); font-weight:700; color:var(--text); font-size:16px; margin:0;">
                    Sign Out?
                </h5>
            </div>
            <button class="close" type="button" data-dismiss="modal"
                    style="color:var(--muted); opacity:1; background:none; border:none; font-size:18px; cursor:pointer; padding:0; margin:0; line-height:1;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body" style="padding:20px 24px; color:var(--muted); font-size:14px; font-family:var(--font-b);">
            Are you sure you want to end your current session and log out?
        </div>

        <div class="modal-footer" style="border-top:1px solid var(--border); padding:16px 24px; display:flex; gap:10px; justify-content:flex-end;">
            <button type="button" data-dismiss="modal"
                    style="background:var(--surface-3); border:1px solid var(--border-2); color:var(--muted); font-family:var(--font-d); font-weight:600; font-size:13px; padding:9px 20px; border-radius:9px; cursor:pointer; transition:all 0.2s;"
                    onmouseover="this.style.color='var(--text)'"
                    onmouseout="this.style.color='var(--muted)'">
                Cancel
            </button>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('modal-logout-form').submit();"
               style="background:var(--red); color:white; font-family:var(--font-d); font-weight:700; font-size:13px; padding:9px 20px; border-radius:9px; text-decoration:none; display:inline-flex; align-items:center; gap:7px; transition:all 0.2s; border:none;"
               onmouseover="this.style.background='#FF6B78'; this.style.transform='translateY(-1px)'"
               onmouseout="this.style.background='var(--red)'; this.style.transform='none'">
                <i class="fas fa-sign-out-alt" style="font-size:12px;"></i>
                Logout
            </a>
            <form id="modal-logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS Scripts -->
  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

  @stack('scripts')

  <script>
  // ── Auto-dismiss alerts ──
  setTimeout(function(){
      document.querySelectorAll('.alert').forEach(function(el){
          el.style.transition = 'all 0.5s ease';
          el.style.opacity = '0';
          el.style.transform = 'translateY(-8px)';
          setTimeout(function(){ el.remove(); }, 500);
      });
  }, 4000);

  // ── Active sidebar link highlight ──
  (function(){
      const path = window.location.pathname;
      document.querySelectorAll('#accordionSidebar .collapse-item, #accordionSidebar .nav-link').forEach(function(link){
          if (link.getAttribute('href') && link.getAttribute('href') !== '#' && path.startsWith(link.getAttribute('href'))) {
              link.style.background = 'var(--accent-dim)';
              link.style.color = 'var(--accent)';
              // Open parent collapse if any
              const collapse = link.closest('.collapse');
              if (collapse) {
                  collapse.classList.add('show');
                  const trigger = document.querySelector('[data-target="#' + collapse.id + '"]');
                  if (trigger) trigger.setAttribute('aria-expanded', 'true');
              }
          }
      });
  })();

  // ── Chart.js dark theme defaults ──
  if (typeof Chart !== 'undefined') {
      Chart.defaults.global.defaultFontFamily  = "'DM Sans', sans-serif";
      Chart.defaults.global.defaultFontColor   = '#6B7FA3';
      Chart.defaults.global.defaultFontSize    = 12;
  }
  </script>