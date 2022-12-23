
<div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Gate Pass Data <strong>BERHASIL!</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

<div class="row mt-3">
    <div class="col-md-6">
        <form action="" method="post">
            <div class="input-group">
            </div>
        </form>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Performance Management System Approval</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                    <th style="white-space:nowrap;" class="text-center">No</th>
                    <th style="white-space:nowrap;" class="text-center">Employee ID</th>
                    <th style="white-space:nowrap;" class="text-center">Employee Name</th>
                    <th style="white-space:nowrap;" class="text-center">Department</th>
                    <th style="white-space:nowrap;" class="text-center">Gate Pass Count</th>
                </thead>
                <tbody>
                    <?php if ($form != null) : ?>
                        <?php $i = 1;
                        foreach ($form as $row) { ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td nowrap><?= $row['employee_id']; ?></td>
                                <td nowrap><?= $row['employee_name']; ?></td>
                                <td nowrap><?= $row['department']; ?></td>
                                <td nowrap><?= $dataif->employee_id; ?></td>
                            </tr>
                        <?php } ?>
                    <?php endif; ?>
                </tbody>

                <?php if (empty($form)) : ?>
                    <div class="alert alert-info" role="alert">
                    Data Is Empty !
                    </div>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</div>