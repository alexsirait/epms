<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Gatepass</title>

</head>

<body>
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('flash');  ?>

                <form action="<?= base_url('login/changePassword'); ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="new_password1">New Password</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label for="new_password2">Repeat Password</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>

                </form>


            </div>
        </div>



    </div>
    </div>
</body>

</html>