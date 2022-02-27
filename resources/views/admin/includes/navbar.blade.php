
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">Flash Sale</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/flash-sale') }}">Flash Sales List</a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/flash-sale/create') }}">Add New Flash Sale</a>
    </li>   
  </ul>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <button class="btn btn-primary" href="#">Logout</button>
    </li> 
  </ul>

</nav>
