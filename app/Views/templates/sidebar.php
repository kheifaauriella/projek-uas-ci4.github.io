 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-stream"></i>
                </div>
                <div class="sidebar-brand-text mx-3">The Arkh <sup>list</sup></div>
            </a>

             <!-- Nav Item - Dashboard -->
             <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard/index'); ?>">
                <i class="fas fa-columns"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->

            
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                    aria-expanded="true" aria-controls="collapseProduct">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Product Management</span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Components:</h6>
                        <a class="collapse-item" href="<?= base_url('product/create'); ?>">Zuerst</a>
                        <a class="collapse-item" href="buttons.html">Bracelets</a>
                        <a class="collapse-item" href="buttons.html">Necklaces</a>
                        <a class="collapse-item" href="cards.html">Rings</a>
                        <a class="collapse-item" href="cards.html">Straps</a>
                    </div>
                </div>
            </li> -->
        
            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Order Management</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-warehouse"></i>
                    <span>Inventory Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Components:</h6>
                        <a class="collapse-item" href="buttons.html">Beads</a>
                        <a class="collapse-item" href="cards.html">Snippets</a>
                        <a class="collapse-item" href="cards.html">Strings</a>
                    </div>
                </div>
            </li> -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <?php if(in_groups('admin')) : ?>

                <!-- Nav Item - User Management -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/index'); ?>">
                        <i class="fas fa-users"></i>
                        <span>User Management</span></a>
                </li>
            <?php endif; ?>

            <?php if(in_groups('user')) : ?>

                <!-- Nav Item - User Management -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user/index'); ?>">
                        <i class="fas fa-user"></i>
                        <span>Profile Management</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->