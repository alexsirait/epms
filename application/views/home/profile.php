<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    <div class="row">
        <div class="col-md">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <!-- Card -->
    <div class="card mb-3 col-lg-6">
        <div class="row no-gutters">

            <div class="col-md-4">

                <img src="<?= base_url('assets/img/profile/') . $admin['image'] ?>" class="card-img" alt="Profile Picture">
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $admin['full_name'] ?></h5>
                    <p class="card-text"><?= $admin['email'] ?></p>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->