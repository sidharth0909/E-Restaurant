<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="categoy.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                            </a>
                            <a class="nav-link" href="dish.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Dish
                            </a>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users orders
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?php echo $_SESSION['Email']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">