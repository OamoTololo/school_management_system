<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a class="navbar-brand text-white" href="index.php">Admin Area</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
          <a class="nav-link text-white" href="index.php"><i class="fa-solid fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white" href="add_gallery.php"><i class="fa-solid fa-camera"></i> Add Gallery</a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white" href="add_student.php"><i class="fa-solid fa-user"></i> Add Student</a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-white" href="add_educator.php"><i class="fa-solid fa-user"></i> Add Educator</a>
      </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="other_stuff.php" role="button" data-toggle="dropdown"
               aria-expanded="false">
                <i class="fa-solid fa-book"></i> Create Masters
            </a>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="add_category.php">Create Category</a>
                <a class="dropdown-item" href="add_course.php">Create Course</a>
            </div>

        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-white" href="logout.php"><i class="fa-solid fa-home"></i> Logout</a>
        </li>
    </ul>

  </div>

</nav>