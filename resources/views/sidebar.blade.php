<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
      
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
       
        <li class="nav-item">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Users</span>
            </a>
          </li> 
        
          <li class="nav-item">
            <a class="nav-link" href="{{ url('event') }}">
              <i class="menu-icon fa fa-calendar" aria-hidden="true"></i>
              <span class="menu-title">Events</span>
            </a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon fa fa-exchange" aria-hidden="true"></i>
              <span class="menu-title">Transactions</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="{{ url('discount') }}">
              <i class="menu-icon fa fa-gift" aria-hidden="true"></i>
              <span class="menu-title">Discounts</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="{{ url('services') }}">
              <i class="menu-icon fa-brands fa-servicestack"></i>
              <span class="menu-title">Services</span>
            </a>
          </li>
        </ul>
      </nav>
