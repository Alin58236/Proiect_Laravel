<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo"><a href="https://github.com/Alin58236/Proiect_Laravel" class="simple-text logo-normal">
      Stoia Alin
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Orders</p>
        </a>
      </li>
      <li class="nav-item {{Request::is('categories','add-category') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('categories') }}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item {{Request::is('products','add-product') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('products') }}">
          <i class="material-icons">devices</i>
          <p>Products</p>
        </a>
      </li>
      
    </ul>
  </div>
</div>