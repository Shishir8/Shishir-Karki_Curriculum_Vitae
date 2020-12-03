<div class="sidebar" data-color="orange">
     
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li class="{{ Request::is('admin/dashboard*') ? 'active': '' }}">
            <a href="{{ route('admin.dashboard') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/slider*') ? 'active': '' }}">
             <a href="{{ route('slider.index') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Slider</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/aboutme*') ? 'active': '' }}">
             <a href="{{ route('aboutme.index') }}">
              <i class="now-ui-icons design_app"></i>
              <p>About Me</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/skill*') ? 'active': '' }}">
             <a href="{{ route('skill.index') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Skills</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/service*') ? 'active': '' }}">
             <a href="{{ route('service.index') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Services</p>
            </a>
          </li>

          <li class="{{ Request::is('admin/contact*') ? 'active': '' }}">
             <a href="{{ route('contact.index') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Contacts</p>
            </a>
          </li>

          <li>
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="now-ui-icons location_map-big"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table List</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li>
        </ul>
      </div>
    </div>