<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="/views/images/logos/Logo.png" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Spicy Noodle</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">



            <div class="image">
                <img src="<?=$_SESSION["userAvatar"]?>" class="img-circle elevation-2" alt="Avatar">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

       
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {  ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link active ">
                            <i class="nav-icon fa-brands fa-dropbox"></i>                            
                            <p>
                                Management
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">5</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/category" class="nav-link">
                                <i class="fa-solid fa-list nav-icon"></i>                                        
                                <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                    <a href="/admin/product" class="nav-link">
                                    <i class="fa-solid fa-list nav-icon"></i>                                        
                                    <p>Product</p>
                                    </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/table" class="nav-link">
                                <i class="fa-solid fa-tag nav-icon"></i>
                                    <p>Table</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/user" class="nav-link">
                                    <i class="fa-regular fa-user nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/order" class="nav-link">
                                <i class="fa-solid fa-envelope nav-icon"></i>                                    
                                <p>Order</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="nav-header">PROFILE</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>                        
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/logout" class="nav-link">
                    <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                     <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    
    </div>
   
</aside>