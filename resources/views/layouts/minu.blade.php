@php 

$minu = [
  [
    'title' => 'Dashboard',
    'icon' => 'zmdi zmdi-view-dashboard', 
    'name' => 'dashboard',
    // 'blank' => true
  ],
  [
    'title' => 'Sertificates',
    'icon' => 'zmdi zmdi-calendar-check',
    'name' => 'sertificates.index'
  ],
  [
    'title' => 'Discriptions',
    'name' => 'discriptions.index',
    'icon' => 'zmdi zmdi-format-list-bulleted'
  ]
];


@endphp      

      <!--Start sidebar-wrapper-->
      <div
        id="sidebar-wrapper"
        data-simplebar=""
        data-simplebar-auto-hide="true"
      >
        <div class="brand-logo">
          <a href="">
            <img
              src="{{ asset('assets/images/logo-icon.png') }}"
              class="logo-icon"
              alt="logo icon"
            />
            <h5 class="logo-text">Dashtreme Admin</h5>
          </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
          <li class="sidebar-header">MAIN NAVIGATION</li>
          @foreach($minu as $item)
            <li>
              <a href="@isset($item['name']) {{ route($item['name']) }} @else {{ $item['link'] ?? '' }}  @endisset" 
                  @isset($item['blank']) target="_blank"  @endisset>
                <i class="{{ $item['icon'] ?? '' }}"></i> <span>{{ $item['title'] ?? 'No Title' }}</span>
              </a>
            </li>
          @endforeach


          {{-- <li>
            <a href="icons.html">
              <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
            </a>
          </li>

          <li>
            <a href="forms.html">
              <i class="zmdi zmdi-format-list-bulleted"></i> <span>Forms</span>
            </a>
          </li>

          <li>
            <a href="tables.html">
              <i class="zmdi zmdi-grid"></i> <span>Tables</span>
            </a>
          </li>

          <li>
            <a href="calendar.html">
              <i class=""></i> <span>Calendar</span>
              <small class="badge float-right badge-light">New</small>
            </a>
          </li>

          <li>
            <a href="profile.html">
              <i class="zmdi zmdi-face"></i> <span>Profile</span>
            </a>
          </li>

          <li>
            <a href="login.html" target="_blank">
              <i class="zmdi zmdi-lock"></i> <span>Login</span>
            </a>
          </li>

          <li>
            <a href="register.html" >
              <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
            </a>
          </li>

          <li class="sidebar-header">LABELS</li>
          <li>
            <a href="javaScript:void();"
              ><i class="zmdi zmdi-coffee text-danger"></i>
              <span>Important</span></a
            >
          </li>
          <li>
            <a href="javaScript:void();"
              ><i class="zmdi zmdi-chart-donut text-success"></i>
              <span>Warning</span></a
            >
          </li>
          <li>
            <a href="javaScript:void();"
              ><i class="zmdi zmdi-share text-info"></i>
              <span>Information</span></a
            >
          </li> --}}
        </ul>
      </div>
      <!--End sidebar-wrapper-->