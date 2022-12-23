<div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    EPMS Data <strong>BERHASIL!</strong> <?= $this->session->flashdata('flash'); ?>
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
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
    </div>
    <div class="ml-4 mt-2">
    <form id="form1" action="<?php echo base_url('hse/emailmanager') ?>" method="POST"> 
  <button type="button" class="btn btn-info">
                            <i class="fas fa-fw fa-mail-bulk"></i>

                        <a href="<?= base_url(); ?>hse/emailmanager" style="color: white" >Send Email to Manager</a>
    </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                    <th style="white-space:nowrap;" class="text-center">No</th>
                    <th colspan="2" style="white-space:nowrap;" class="text-center">Action</th>
                    <th style="white-space:nowrap;" class="text-center">Employee Name</th>
                  <th style="white-space:nowrap;" class="text-center">Employee ID</th>
                  <th style="white-space:nowrap;" class="text-center">Department</th>
                  <th style="white-space:nowrap;" class="text-center">Position</th>
                  <th style="white-space:nowrap;" class="text-center">Section</th>
                  <th style="white-space:nowrap;" class="text-center">Direct Leader Name</th>
                  <th style="white-space:nowrap;" class="text-center">Employee Status</th>
                  <th style="white-space:nowrap;" class="text-center">Working Location</th>
                  <th style="white-space:nowrap;" class="text-center">Period Covered</th>
                  <th style="white-space:nowrap;" class="text-center">Summary of department objectives as related to your role </th>
                  <th style="white-space:nowrap;" class="text-center">Working Incident</th>
                  <th style="white-space:nowrap;" class="text-center">Day Away From Work (DAFW) </th>
                  <th style="white-space:nowrap;" class="text-center">Motor Vehicle Crash (MVC) on the way and return from work</th>
                  <th style="white-space:nowrap;" class="text-center">Covid-19 Protocol Violation</th>
                  <th style="white-space:nowrap;" class="text-center">Safety violation</th>
                  <th style="white-space:nowrap;" class="text-center">HSE Observation Submission</th>
                  <th style="white-space:nowrap;" class="text-center">Performance Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Routine and Primary Job 1</th>
                  <th style="white-space:nowrap;" class="text-center">Routine and Primary Job - Result 1</th>
                  <th style="white-space:nowrap;" class="text-center">Routine and Primary Job - Rating 1</th>
                  <th style="white-space:nowrap;" class="text-center">Routine and Primary Job 2</th>
                  <th style="white-space:nowrap;" class="text-center">Routine and Primary Job - Result 2</th>
                  <th style="white-space:nowrap;" class="text-center">Routine and Primary Job - Rating 2</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine 1</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Result 1</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Rating 1</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine 2</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Result 2</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Rating 2</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine 3</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Result 3</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Rating 3</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine 4</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Result 4</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Rating 4</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine 5</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Result 5</th>
                  <th style="white-space:nowrap;" class="text-center">Non Routine - Rating 5</th>
                  <th style="white-space:nowrap;" class="text-center">Total Rating Part 3A</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development 1</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Result 1</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Rating 1</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development 2</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Result 2</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Rating 2</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development 3</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Result 3</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Rating 3</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development 4</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Result 4</th>
                  <th style="white-space:nowrap;" class="text-center">Competency Development - Rating 4</th>
                  <th style="white-space:nowrap;" class="text-center">Total Rating Part 3B</th>
                  <th style="white-space:nowrap;" class="text-center">Team work and Communication - Result</th>
                  <th style="white-space:nowrap;" class="text-center">Team work and Communication - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Flexibility - Result</th>
                  <th style="white-space:nowrap;" class="text-center">Flexibility - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Discipline : Attendance Rate</th>
                  <th style="white-space:nowrap;" class="text-center">Discipline : Attendance Violation</th>
                  <th style="white-space:nowrap;" class="text-center">Discipline : MC Case</th>
                  <th style="white-space:nowrap;" class="text-center">Discipline : Warning 1</th>
                  <th style="white-space:nowrap;" class="text-center">Discipline : Warning 2</th>
                  <th style="white-space:nowrap;" class="text-center">Discipline : Warning 3</th>
                  <th style="white-space:nowrap;" class="text-center">Discipline - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Building Inclusive Relationship - Result</th>
                  <th style="white-space:nowrap;" class="text-center">Building Inclusive Relationship - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Planning and Organization Skill - Result</th>
                  <th style="white-space:nowrap;" class="text-center">Planning and Organization Skill - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Leadership - Result</th>
                  <th style="white-space:nowrap;" class="text-center">Leadership - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Costumer Focus - Result</th>
                  <th style="white-space:nowrap;" class="text-center">Costumer Focus - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Integrity and Trust - Result</th>
                  <th style="white-space:nowrap;" class="text-center">Integrity and Trust - Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Total Rating Part 3C</th>
                  <th style="white-space:nowrap;" class="text-center">First Rating from Leader</th>
                  <th style="white-space:nowrap;" class="text-center">Final Rating</th>
                  <th style="white-space:nowrap;" class="text-center">Note from Leader</th>
                  <th style="white-space:nowrap;" class="text-center">Employee Submit</th>
                  <th style="white-space:nowrap;" class="text-center">Direct Leader Approval</th>
                  <th style="white-space:nowrap;" class="text-center">Next Leader Approval</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data_epms != null) : ?>
                        <?php $i = 1;
                        foreach ($data_epms as $row) { ?>
                        
                        <?php if ($row['dirleader_approve'] == 'Approve') : ?>
                          <tr style="background-color: white">
                        <?php endif; ?>
                
                        <?php if ($row['dirleader_approve'] == NULL) : ?>
                          <tr style="background-color: whitesmoke">
                        <?php endif; ?>

                        <?php if ($row['dirleader_approve'] == 'Approve' && $row['nextleader_approve'] == 'Approve') : ?>
                          <tr style="background-color: lightyellow">
                        <?php endif; ?>
                                <th scope="row"><?= $i++; ?></th>
                                <!--
                                <td nowrap>

                                     <a href="<?= base_url(); ?>gatepass/ubah/<?= $row['id']; ?>" style="color: black" ><i class="fas fa-fw fa-pencil-alt"> Update</i></a>
                                    <a href="<?= base_url(); ?>gatepass/detail/<?= $row['id']; ?>" class="badge bg-primary float-end">Detail</a> 
                                </td>
                                -->
                                <td nowrap >
                            <div>
                            <button type="button" class="btn btn-outline-warning">
                            <i class="fas fa-fw fa-pencil-alt"></i>

                        <a href="<?= base_url(); ?>epms/ubah/<?= $row['form_id']; ?>" style="color: black" >Update</a>
                        <!--
                        <div>
            <button type="button" class="btn btn-outline-warning">
            <i class="fa-solid fa-pen-to-square"></i>
              <?php echo anchor('direct_leader/edit/'.$row['employee_id'],'Edit'); ?>
            </button>
            </div>
                        -->
                        </button>
                        </div>
          </td>

          <td>
          <div>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapus">
              <i class="fas fa-fw fa-trash-alt"></i>
              <?php echo anchor('epms/hapus/'.$row['form_id'],'Delete'); ?>
            </button>
                        </td>
                                <td style="white-space:nowrap;" class="text-center"><?php echo $row['full_name']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['employee_id']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['department']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['designation']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['section']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['direct_leader']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['status']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['location']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['period_from']; ?> until <?php echo $row['period_to']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['summary']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['incident']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['dafw']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['mvc']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['covid']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['safety']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['hse']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['routine1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['routine1_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['routine2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['routine2_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine1_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_7']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine2_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_8']; ?></td>
            <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine3_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_9']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine4']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine4_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_10']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine5']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['non_routine5_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3A_11']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['sum1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development_result1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3B_1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development_result2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3B_2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development_result3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3B_3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development4']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['competency_development_result4']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3B_4']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['sum2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['teamwork_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['flexibility_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['attendance_rate']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['attendance_violation']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['mc_case']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['warning1']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['warning2']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['warning3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['building_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_4']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['planning_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_5']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['leadership_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_6']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['costumer_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_7']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['integrity_result']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['rating3C_8']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['sum3']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['first_rating']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['final_rating']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['part_4_note']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['emp_submit']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['dirleader_approve']; ?></td>
          <td style="white-space:nowrap;" class="text-center"><?php echo $row['nextleader_approve']; ?></td>
                        
                        <?php } ?>
                    <?php endif; ?>
                </tbody>

                <?php if (empty($data_epms)) : ?>
                    <div class="alert alert-info" role="alert">
                    Data Is Empty !
                    </div>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
                </form>
</div>

<script>
	function emailmanager()
	{
    var form = $("#form1");
    var id = $(this).parents("th").attr("value");
		Swal.fire({
  title: 'Are you sure?',
  text: "You will send notification to Manager for approval Performance Management System via email.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Send Email!'
}).then((result) => {
  if (result.value) {
    
    form.trigger('submit');
    $.ajax({
      url : '<?= base_url() ?>epms/button_emailmanager',
					//type: 'DELETE',
			
    
    });
  }
});
}
	</script>