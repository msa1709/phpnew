<?php
// Check if a session is already active before calling session_start()
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$user_type = $_SESSION['user_type'];
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>

    <link rel="stylesheet" href="style_1.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="script.js" defer></script>


    <style>
        /* Style to hide the sub-menu by default */ 

        .sidebar {
          width: 270px; /* Increase this value to widen the sidebar */
          background-color: #f1f1f1;
        }
      .sub_menu {
        display: none;
        padding-left: 20px;
      }

      .sub_menu.active {
        display: block;
      }

      .menu_item {
        list-style-type: none;
        margin: 0;
        padding: 0;
      }

      .link {
        display: flex;
        align-items: center;
        padding: 10px;
        text-decoration: none;
        color: #000;
      }

      .link i {
        margin-right: 10px;
      }

      .menu_title {
        margin-bottom: 10px;
        font-weight: bold;
      }

      .menu_title .line {
        flex-grow: 1;
        height: 1px;
        background-color: #ccc;
        margin-left: 10px;
      }
    </style>   
     
</head>

<body>
    <!-- <h1>Welcome,<?php // echo $_SESSION['user_type']; ?></h1> -->

    <?php if ($user_type == 'admin'): ?>
    <nav class="sidebar locked">
      <div class="logo_items flex">
        <!-- <span class="nav_image">
          <img src="images/logo.png" alt="logo_img" />
        </span> -->
        <span class="logo_name"><?php echo $_SESSION['user_type']; ?> </span>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Dashboard</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-home-alt"></i>
                <span>Home</span>
              </a>
            </li>
          </ul>

          <!-- Products Section -->
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Products</span>
              <span class="line"></span>
            </div>
            <li class="item" id="products-menu">
              <a href="#" class="link flex">
                <i class="bx bx-box"></i>
                <span>Products</span>
              </a>
            </li>

            <!-- Sub-menu for Products -->
            <ul class="sub_menu" id="products-sub-menu">
              <li class="item">
                <a href="showlist.php" class="link flex">
                  <i class="bx bx-show"></i>
                  <span>View Products</span>
                </a>
              </li>
              <li class="item">
                <a href="addproduct.php" class="link flex">
                  <i class="bx bx-plus"></i>
                  <span>Add Products</span>
                </a>
              </li>
            </ul>
          </ul>
          <!-- Logout Button Section -->
          <ul class="menu_item">
            <li class="item">
              <a href="logout.php" class="link flex">
                <i class="bx bx-log-out"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

        
           

       
      
    <?php else: ?>
      <nav class="sidebar locked">
      <div class="logo_items flex">
        <!-- <span class="nav_image">
          <img src="images/logo.png" alt="logo_img" />
        </span> -->
        <span class="logo_name"><?php echo $_SESSION['user_type']; ?> </span>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Dashboard</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-home-alt"></i>
                <span>Home</span>
              </a>
            </li>
          </ul>

          <!-- Products Section -->
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Products</span>
              <span class="line"></span>
            </div>
            <li class="item" id="products-menu">
              <a href="#" class="link flex">
                <i class="bx bx-box"></i>
                <span>Products</span>
              </a>
            </li>

            <!-- Sub-menu for Products -->
            <ul class="sub_menu" id="products-sub-menu">
              <li class="item">
                <a href="showlist.php" class="link flex">
                  <i class="bx bx-show"></i>
                  <span>View Products</span>
                </a>
              </li>
              <!-- <li class="item">
                <a href="addproduct.php" class="link flex">
                  <i class="bx bx-plus"></i>
                  <span>Add Products</span>
                </a>
              </li> -->
            </ul>
          </ul>
          <!-- Logout Button Section -->
          <ul class="menu_item">
            <li class="item">
              <a href="logout.php" class="link flex">
                <i class="bx bx-log-out"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

        
    <?php endif; ?>

    <!-- <a href="logout.php">Logout</a>   -->

    <script>
        // JavaScript to toggle the products sub-menu
      document.getElementById('products-menu').addEventListener('click', function (e) {
        e.preventDefault();
        const productsSubMenu = document.getElementById('products-sub-menu');
        productsSubMenu.classList.toggle('active');
      });
       
    </script>
</body>
</html>