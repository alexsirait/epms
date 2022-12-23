<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-0">
            <img class="logo" src="<?= base_url('assets/img/logo.png'); ?>" style="position: center; width: 60px; height: auto;">
        </div>
        <div class="sidebar-brand-text mx-3">EPMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!--Query userdata-->
    <?php
    $level_id = $this->session->userdata('level_id');
    $queryMenu = "SELECT `user_menu`.`id`,`menu` 
    FROM `user_menu` JOIN `user_access_menu` 
    ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
    WHERE `user_access_menu`.`level_id` = $level_id 
    ORDER BY `user_access_menu`.`menu_id` ASC ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- LOOPING Sub-Menu -->
        <?php
        $menuID = $m['id'];
        $querySubMenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id` WHERE `user_sub_menu`.`menu_id` = $menuID AND `user_sub_menu`.`is_active` = 1";
        $subMenu = $this->db->query($querySubMenu)->result_array(); ?>

        <?php foreach ($subMenu as $sm) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>


        <?php endforeach; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php endforeach; ?>



<!-- Logout Modal-->
<!-- <li class="nav-item">
<a class="nav-link" href="<?= base_url('login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            Logout
                        </a>
        </li>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div> -->
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->