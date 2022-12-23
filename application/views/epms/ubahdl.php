<!doctype html>
<html lang="en">


<!-- Required meta tags -->
<meta charset="utf-8">
<title>Performance Management System</title>
<style type="text/css"></style>
<link rel='stylesheet' href='<?php echo base_url() . 'assets/autocomplete/jquery-ui.min.css' ?>'>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

<div class="container">
<a href="<?= base_url(); ?>home"><img src="<?php echo base_url()?>images/logo-cladtek.png" alt="Logo-Cladtek" style="width: 10%; height: auto"></a>
  <h2 class="text-right">Performance Management System (PMS)</h2>
  <h4 class="text-right">Edit Form</h4> 

  <a href="<?= base_url(); ?>epms/rating_criteria"> Rating Criteria (Kriteria Penilaian) </a>
  <br>
  <a href="<?= base_url(); ?>epms/filling_instruction"> Filling Instruction (Instruksi Pengisian)</a>

  <?php echo form_open_multipart('epms/update');?>
  <form action="<?php echo site_url('epms/update')?>" method="post">
  <!-- PART 1 -->
  <table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4" style="background-color: #99c2ce; color: white; color: white">Part 1 : Employee Information (Informasi Pegawai)</th>
        </tr>
    </thead>
    <thead style="background-color: #f2f2f2">
      <tr>
        <th>Employee Name <br> (Nama Pegawai)*</th>
        <th>Employee ID <br> (ID Pegawai)*</th>
        <th>Department <br> (Departemen)*</th>
        <th>Position & Section <br> (Posisi)*</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <input class="form-control" type="text" name="full_name" value="<?php echo $data_epms->full_name ?>">
            <input class="form-control" type="text" name="form_id" value="<?php echo $data_epms->form_id ?>" hidden>
        </td>
        <td>
            <input class="form-control" type="text" name="employee_id" value="<?php echo $data_epms->employee_id ?>">
        </td>
        <td>
            <input class="form-control" type="text" name="department" id="department" value="<?php echo $data_epms->department; ?>">
        </td>
        <td>
            <input class="form-control" type="text" id="designation" name="designation" value="<?php echo $data_epms->designation; ?>">
            <input class="form-control" type="text" id="section" name="section" value="<?php echo $data_epms->section; ?>">
        </td>
      </tr>
    </tbody>
    <thead style="background-color: #f2f2f2">
      <tr>
        <th>Direct Leader Name <br> (Nama Pimpinan Langsung)*</th>
        <th>Employee Status <br> (Status Pegawai)*</th>
        <th>Working Location <br> (Lokasi Kerja)*</th>
        <th>Period Covered <br> (Periode yang dicover)*</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <input class="form-control" rows="1" id="direct_leader" name="direct_leader" value="<?php echo $data_epms->direct_leader; ?>">
        </td>
        
        <td>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="status" id="speak" type="radio" class="custom-control-input" value="Permanent" <?= $data_epms->status == "Permanent" ? 'checked' : '' ?>>
                <label for="speak" class="custom-control-label">Permanent</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="status" id="speakin" type="radio" class="custom-control-input" value="Contract" <?= $data_epms->status == "Contract" ? 'checked' : '' ?>>
                <label  for="speakin" class="custom-control-label">Contract</label>
            </div>
        </td>
        <td>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="location" id="loc1" type="radio" class="custom-control-input" value="Yard 1" <?= $data_epms->location == "Yard 1" ? 'checked' : '' ?>>
                <label for="loc1" class="custom-control-label">Yard 1</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="location" id="loc2" type="radio" class="custom-control-input" value="Yard 2" <?= $data_epms->location == "Yard 2" ? 'checked' : '' ?>>
                <label  for="loc2" class="custom-control-label">Yard 2</label>
            </div>
        </td>
        <td>From: 
          <input type="date" class="form-control" name="period_from" value="<?php echo $data_epms->period_from ?>"><br> 
          To: 
          <input type="date" class="form-control" name="period_to" value="<?php echo $data_epms->period_to ?>">
        </td>
      </tr>
    </tbody>
  </table>

  <!-- PART 2 -->
  <table class="table table-bordered" style="color: black">
    <thead>
        <tr>
            <th colspan="4" style="background-color: #99c2ce; color: white; color: white">Part 2 : Summary of department objectives as related to your role (Tujuan departemen berdasarkan tugas anda)</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <textarea class="form-control" id="summary" name="summary" rows="3"><?php 
        echo $data_epms->summary 
        ?></textarea>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- PART 3 -->
  <table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4" style="background-color: #99c2ce; color: white; color: white">Part 3 : Agreement/Commitment (Persetujuan/Komitmen)</th>
        </tr>
    </thead>
    <thead>
      <tr>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">3A. Performance (Kinerja)</th>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">Results (Hasil)*</th>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">Rating<br>Weight<br>(Bobot)<br>50%</th>
      </tr>
    </thead>
    <tbody>

    <!-- 3A.1 -->
    <tr>
        <td colspan="3" style="background-color: #f2f2f2">3A.1. Safety and Compliance (Keselamatan dan Kepatuhan)</td>
      </tr>
      <tr>
        <td>
            <ul>
                <li>0 Working Incident (Insiden kerja).</li>
                <li>0 Day Away From Work (DAFW) (Jumlah hari tidak masuk karena kecelakaan kerja).</li>
                <li>0 Motor Vehicle Crash (MVC) on the way and return from work (Kecelakaan dalam berkendara saat pergi dan pulang kerja).</li>
                <li>0 Covid-19 Protocol Violation (pelanggaran protocol Covid-19).</li>
                <li>Safety violation (Pelanggaran keselamatan).</li>
            </ul>
        </td>

        <td>
            <ul>
                <li>
                    <div class="row">
                        <div class="col-2">
                            <textarea class="form-control" id="incident" name="incident" rows="1"><?php 
                            echo $data_epms->incident 
                            ?></textarea>
                        </div>
                        <div class="col-8">Working Incident (Insiden kerja).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-2">
                            <textarea class="form-control" id="dafw" name="dafw"  rows="1"><?php echo $data_epms->dafw ?></textarea>
                        </div>
                        <div class="col-10">Day Away From Work (DAFW) (Jumlah hari tidak masuk karena kecelakaan kerja).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-2">
                            <textarea class="form-control" id="mvc" name="mvc" rows="1"><?php echo $data_epms->mvc ?></textarea>
                        </div>
                        <div class="col-10">Motor Vehicle Crash (MVC) on the way and return from work (Kecelakaan dalam berkendara saat pergi dan pulang kerja).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-2">
                            <textarea class="form-control" id="covid" name="covid" rows="1"><?php echo $data_epms->covid ?></textarea>
                        </div>
                        <div class="col-10">Covid-19 Protocol Violation (pelanggaran protocol Covid-19).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-2">
                            <textarea class="form-control" id="safety" name="safety" rows="1"><?php echo $data_epms->safety ?></textarea>
                        </div>
                        <div class="col-10">Safety violation (Pelanggaran keselamatan).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-2">
                            <textarea class="form-control" id="hse" name="hse" rows="1"><?php echo $data_epms->hse ?></textarea>
                        </div>
                        <div class="col-10">HSE Observation Submission
                        </div>
                    </div>
                </li>
            </ul>
        </td>

        <td class="col-md-2">
        <select class="custom-select"  name="rating3A_1">
        <?php
        if ($data_epms->rating3A_1 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_1 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_1 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_1 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_1 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    } else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
            </select>
        </td>
      </tr>

      <!-- 3A.2 -->
      <tr>
          <td colspan="3" style="background-color: #f2f2f2">
          3A.2. Routine and Primary Job (Pekerjaan rutin dan utama)
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="routine1" name="routine1" rows="3"><?php 
              echo $data_epms->routine1 
              ?></textarea>
          </td>
          <td>
              <textarea class="form-control" id="routine1_result" name="routine1_result" rows="3"><?php echo $data_epms->routine1_result ?></textarea>
          </td>

          <td class="col-md-2">
            <select class="custom-select form-control" name="rating3A_2">
            <?php
        if ($data_epms->rating3A_2 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_2 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_2 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_2 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_2 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    } else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
        </td>
      </tr>

      <tr>
          <td>
              <textarea class="form-control" id="routine2" name="routine2" rows="3"><?php echo $data_epms->routine2 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" id="routine2_result" name="routine2_result" rows="3"><?php echo $data_epms->routine2_result ?></textarea>
          </td>
          <td>
            <select class="custom-select form-control" name="rating3A_3">
    <?php
        if ($data_epms->rating3A_3 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_3 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_3 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_3 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_3 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    } else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr>
          <td>
              <textarea class="form-control" id="routine3" name="routine3" rows="3"><?php echo $data_epms->routine3 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" id="routine3_result" name="routine3_result" rows="3"><?php echo $data_epms->routine3_result ?></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_4">
              <?php
        if ($data_epms->rating3A_4 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_4 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_4 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_4 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_4 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    } else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="routine4" name="routine4" rows="3"><?php echo $data_epms->routine4 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" id="routine4_result" name="routine4_result" rows="3"><?php echo $data_epms->routine4_result ?></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_5">
              <?php
        if ($data_epms->rating3A_5 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_5 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_5 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_5 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_5 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    } else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="routine5" name="routine5" rows="3"><?php echo $data_epms->routine5 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" id="routine5_result" name="routine5_result" rows="3"><?php echo $data_epms->routine5_result ?></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_6" >
              <?php
        if ($data_epms->rating3A_6 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_6 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_6 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_6 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_6 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    } else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
            </select>
          </td>
      </tr>

      <!-- 3A.3 -->
      <tr>
          <td colspan="3" style="background-color: #f2f2f2">
          3A.3. Non Routine: Initiative, Improvement, beyond-primary-scope-job (Pekerjaan tidak rutin, inisiatif, perubahan positif, dan aktifitas di luar tugas utama)
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="non_routine1" name="non_routine1" rows="3"><?php echo $data_epms->non_routine1 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" id="non_routine1_result" name="non_routine1_result" rows="3"><?php echo $data_epms->non_routine1_result ?></textarea>
          </td>
          <td>
            <select class="custom-select form-control" name="rating3A_7">
    <?php
        if ($data_epms->rating3A_7 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_7 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_7 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_7 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_7 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="non_routine2" name="non_routine2" rows="3"><?php echo $data_epms->non_routine2 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" id="non_routine2_result" name="non_routine2_result" rows="3"><?php echo $data_epms->non_routine2_result ?></textarea>
          </td>
          <td>
            <select class="custom-select form-control" name="rating3A_8">
    <?php
        if ($data_epms->rating3A_8 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_8 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_8 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_8 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_8 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr>
          <td>
              <textarea class="form-control" rows="3" id="non_routine3" name="non_routine3"><?php echo $data_epms->non_routine3 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine3_result" name="non_routine3_result"><?php echo $data_epms->non_routine3_result ?></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_9">
              <?php
        if ($data_epms->rating3A_9 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_9 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_9 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_9 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_9 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="non_routine4" name="non_routine4"><?php echo $data_epms->non_routine4 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine4_result" name="non_routine4_result"><?php echo $data_epms->non_routine4_result ?></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_10">
              <?php
        if ($data_epms->rating3A_10 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_10 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_10 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_10 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_10 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="non_routine5" name="non_routine5"><?php echo $data_epms->non_routine5 ?></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine5_result" name="non_routine5_result"><?php echo $data_epms->non_routine5_result ?></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_11">
              <?php
        if ($data_epms->rating3A_11 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3A_11 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_11 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_11 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3A_11 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
            </select>
          </td>
      </tr>

      <tr style="background-color: ivory">
    <td colspan="2">Total Rating Part 3A</td>
    <td>
        <input class="txt form-control" type="text" id="sum1" name="sum1" onkeyup="sum();" />
    </td>
    </tr>
</tbody>

      <!-- 3B -->
      <thead>
      <tr>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">3B. Competency Development  (Perjanjian Pengembangan)</th>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">Results (Hasil)*</th>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">Rating<br>Weight<br>(Bobot)<br>20%</th>
      </tr>
      <tr>
            <td colspan="3" style="background-color: #f2f2f2">Fill with your development activities: Participate in training (offline or online), Perform as trainer/instructor, or Mentor working partner/member/new employee/interns or apprentice. <br> (Diisi dengan aktivitas pengembangan. Sebagai contoh: Menghadiri training (offline atau online), bertindak sebagai pengajar/instruktur, atau menjadi mentor rekan kerja/bawahan/pegawai baru/peserta magang.)
            </td>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td>
              <textarea class="form-control" id="competency_development1" name="competency_development1" rows="3"><?php echo $data_epms->competency_development1 ?></textarea>
            </td>
            <td>
              <textarea class="form-control" id="competency_development_result1" name="competency_development_result1" rows="3"><?php echo $data_epms->competency_development_result1 ?></textarea>
            </td>
            <td>
                <select class="custom-select form-control" name="rating3B_1">
    <?php
        if ($data_epms->rating3B_1 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3B_1 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_1 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_1 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_1 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="competency_development2" name="competency_development2" rows="3"><?php echo $data_epms->competency_development2 ?></textarea>
            </td>
            <td>
              <textarea class="form-control" id="competency_development_result2" name="competency_development_result2" rows="3"><?php echo $data_epms->competency_development_result2 ?></textarea>
            </td>
            <td>
                <select class="custom-select form-control" name="rating3B_2">
    <?php
        if ($data_epms->rating3B_2 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3B_2 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_2 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_2 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_2 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="competency_development3" name="competency_development3" rows="3"><?php echo $data_epms->competency_development3 ?></textarea>
            </td>
            <td>
              <textarea class="form-control" id="competency_development_result3" name="competency_development_result3" rows="3"><?php echo $data_epms->competency_development_result3 ?></textarea>
            </td>
            <td>
                <select class="custom-select form-control" name="rating3B_3">
    <?php
        if ($data_epms->rating3B_3 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3B_3 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_3 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_3 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_3 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td> 
      </tr>
      <tr>
          <td>
              <textarea class="form-control" id="competency_development4" name="competency_development4" rows="3"><?php echo $data_epms->competency_development4 ?></textarea>
            </td>
            <td>
              <textarea class="form-control" id="competency_development4" name="competency_development_result4" rows="3"><?php echo $data_epms->competency_development_result4 ?></textarea>
            </td>
            <td>
                <select class="custom-select form-control" name="rating3B_4">
    <?php
        if ($data_epms->rating3B_4 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3B_4 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_4 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_4 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3B_4 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td>
      </tr>

      <tr style="background-color: ivory">
    <td colspan="2">Total Rating Part 3B</td>
    <td>
        <input id="sum2" name="sum2" class="txt form-control" type="text" onkeyup="sum();"/>
    </td>
    </tr>
    </tbody>

    <!-- 3C -->
    <thead>
      <tr>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">3C. Behavior and Leadership (Perilaku dan Kepemimpinan)</th>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">Results (Hasil)*</th>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">Rating<br>Weight<br>(Bobot)<br>30%</th>
      </tr>
      <tr>
            <td colspan="3" style="background-color: #f2f2f2">All Employee (Semua Pegawai)
            </td>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td>
              Team work and Communication <br> (Kerja tim dan komunikasi)
          </td>
          <td>
              <textarea class="form-control" id="teamwork_result" name="teamwork_result" rows="3"><?php echo $data_epms->teamwork_result ?></textarea>
          </td>
          <td>
                <select class="custom-select form-control" name="rating3C_1">
    <?php
        if ($data_epms->rating3C_1 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_1 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_1 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_1 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_1 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td>
      </tr>
      <tr>
          <td>
              Flexibility (Fleksibilitas)
          </td>
          <td>
              <textarea class="form-control" id="flexibility_result" name="flexibility_result" rows="3"><?php echo $data_epms->flexibility_result ?></textarea>
          </td>
          <td>
                <select class="custom-select form-control" name="rating3C_2">
    <?php
        if ($data_epms->rating3C_2 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_2 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_2 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_2 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_2 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td>
      </tr>
      <tr>
          <td>
                 Discipline (disiplin): Data Provided by HR for Leadership.
          </td>
          <td>
                <table>
                    <tr>
                        <td>Attendance Rate (Tingkat kehadiran)</td>
                        <td>
                            <input class="form-control" type="text" id="attendance_rate" name="attendance_rate" value="<?php echo $data_epms->attendance_rate ?>">
                    </td>
                    </tr>
                    <tr>
                        <td>Attendance Violation (Pelanggaran kehadiran): Gate Looping, Lateness, Over break time, ABS.</td>
                        <td>
                            <input class="form-control" type="text" id="attendance_violation" name="attendance_violation" value="<?php echo $data_epms->attendance_violation ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>MC Case (Kasus Medis): Long Sickness, Regular MC Cases.</td>
                        <td>
                            <input class="form-control" type="text" id="mc_case" name="mc_case" value="<?php echo $data_epms->mc_case ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Warning 1 (peringatan 1)</td>
                        <td>
                            <input class="form-control" type="text" id="warning1" name="warning1" value="<?php echo $data_epms->warning1 ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Warning 2 (peringatan 2)</td>
                        <td>
                            <input class="form-control" type="text" id="warning2" name="warning2" value="<?php echo $data_epms->warning2 ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Warning 3 (peringatan 3)</td>
                        <td>
                            <input class="form-control" type="text" id="warning3" name="warning3" value="<?php echo $data_epms->warning3 ?>">
                        </td>
                    </tr>
                </table>
          </td>

          <td>
                <select class="custom-select form-control" name="rating3C_3">
    <?php
        if ($data_epms->rating3C_3 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_3 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_3 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_3 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_3 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr>
          <td colspan="3" style="background-color: #f2f2f2">
          Leader Only (Pimpinan Saja)
          </td>
      </tr>

      <tr>
          <td colspan="3" style="background-color: #f2f2f2">
          Value Based Competency for Leadership Position Only (Kompetensi berbasis nilai hanya untuk posisi pimpinan) *
          </td>
      </tr>

      <tr>
          <td>
              Building Inclusive Relationship <br> (Membangun hubungan yang positif)
          </td>
          <td>
              <textarea class="form-control" id="building_result" name="building_result" rows="3"><?php echo $data_epms->building_result ?></textarea>
          </td>
          <td>
                <select class="custom-select form-control" name="rating3C_4">
    <?php
        if ($data_epms->rating3C_4 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_4 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_4 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_4 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_4 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr>
          <td>
              Planning and Organization Skill <br> (Ketrampilan dalam perencanaan dan organisasi)
          </td>
          <td>
              <textarea class="form-control" id="planning_result" name="planning_result" rows="3"><?php echo $data_epms->planning_result ?></textarea>
          </td>
          <td>
                <select class="custom-select form-control" name="rating3C_5">
    <?php
        if ($data_epms->rating3C_5 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_5 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_5 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_5 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_5 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr>
          <td>
              Leadership <br> (kepemimpinan)
          </td>
          <td>
              <textarea class="form-control" id="leadership_result" name="leadership_result" rows="3"><?php echo $data_epms->leadership_result ?></textarea>
          </td>
          <td>
                <select class="custom-select form-control" name="rating3C_6">
    <?php
        if ($data_epms->rating3C_6 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_6 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_6 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_6 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_6 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr>
          <td>
              Costumer Focus <br> (Orientasi pelanggan)

          </td>
          <td>
              <textarea class="form-control" id="costumer_result" name="costumer_result" rows="3"><?php echo $data_epms->costumer_result ?></textarea>
          </td>
          <td>
                <select class="custom-select form-control" name="rating3C_7">
    <?php
        if ($data_epms->rating3C_7 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_7 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_7 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_7 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_7 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr>
          <td>
              Integrity and Trust <br> (Integritas dan Kepercayaan)
          </td>
          <td>
              <textarea class="form-control" id="integrity_result" name="integrity_result" rows="3"><?php echo $data_epms->integrity_result ?></textarea>
          </td>
          <td>
                <select class="custom-select form-control" name="rating3C_8">
    <?php
        if ($data_epms->rating3C_8 == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->rating3C_8 == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_8 == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_8 == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->rating3C_8 == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
          </td>
      </tr>

      <tr style="background-color: ivory">
    <td colspan="2">Total Rating Part 3C</td>
    <td>
        <input id="sum3" name="sum3" class="txt form-control" type="text" onkeyup="sum();"/>
    </td>
    </tr>
    </tbody>
  </table>

  <!-- PART 4 -->
  <table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="6" style="background-color: #99c2ce; color: white; color: white">Part 4: Rating & Ranking (Rating & Ranking)</th>
        </tr>

        <tr>
            <td colspan="6" style="background-color: gray; color: white">Legend (Keterangan):   5: Outstanding  |  4: Exceed  |  3: Meet  |  2: Need Improvement   |   1: Unsatisfactory</td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td colspan="5" style="background-color: #f2f2f2">First Rating from Leader</td>
            <td>
                <!--
            <input id="sum" class="form-control" type="text"/>
-->
                <select class="custom-select form-control" name="first_rating">
    <?php
        if ($data_epms->first_rating == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->first_rating == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->first_rating == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->first_rating == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->first_rating == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td>
        </tr>
      
        <tr>
            <td colspan="5" style="background-color: #f2f2f2">Final Rating (after Leadership Team Discussion)</td>
            <td>
                <select class="custom-select form-control" name="final_rating">
    <?php
        if ($data_epms->final_rating == '5') {

        echo "<option value='5' selected>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    }if ($data_epms->final_rating == '4') {

        echo "<option value='5'>5</option>";
        echo "<option value='4' selected>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->final_rating == '3') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3' selected>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->final_rating == '2') {

        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2' selected>2</option>";
        echo "<option value='1'>1</option>";

    } if ($data_epms->final_rating == '1') {
        echo "<option value='5'>5</option>";
        echo "<option value='4'>4</option>";
        echo "<option value='3'>3</option>";
        echo "<option value='2'>2</option>";
        echo "<option value='1' selected>1</option>";
    }else{
        echo "
                <option value='rating'>rating</option>
                <option value='5'>5</option>
                <option value='4'>4</option>
                <option value='3'>3</option>
                <option value='2'>2</option>
                <option value='1'>1</option>
            </select>";
    }
    ?>
</select>
            </td>
        </tr>
      
        <tr>
            <td colspan="6">Note from Leader (Catatan dari Pimpinan)
                <textarea class="form-control" id="part_4_note" name="part_4_note" rows="2"><?php echo $data_epms->part_4_note ?></textarea>
            </td>
        </tr>

        <tr>
        
            <td><b>Employee Name & Signature</b> <br> Nama Pegawai & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="part_4_emp_name" name="part_4_emp_name" value="<?= $data_epms->full_name ?>">
              <input type="file" class="form-control" rows="1" id="part_4_emp_sign" name="part_4_emp_sign">
              <br>

                <div class="custom-control custom-checkbox">
                  <input name="emp_submit" id="emp_submit" type="checkbox" class="custom-control-input" value="Submit" <?= $data_epms->emp_submit == "Submit" ? 'checked' : '' ?>>
                  <label class="custom-control-label" for="emp_submit">Submit</label>
                </div>

            </td>
            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date1" name="part_4_date1" value="<?php echo $data_epms->part_4_date1 ?>">
            </td>

            <?php if (@$_SESSION['level_id'] == '2' && '3') { ?>
            <td><b>Direct Leader Name</b> <br> Pimpinan Langsung & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="part_4_dirleader_name" name="part_4_dirleader_name" value="<?= $data_epms->direct_leader ?>">
              <input type="file" class="form-control" rows="1" id="part_4_dirleader_sign" name="part_4_dirleader_sign">
              <br>
              <div class="custom-control custom-checkbox">
              <input name="dirleader_approve" id="dirleader_approve" type="checkbox" class="custom-control-input" value="Approve" <?= $data_epms->dirleader_approve == "Approve" ? 'checked' : '' ?>>
                <!--
              <input name="selected" id="dirleader_approve" type="checkbox" class="custom-control-input selected" value="Approve" <?= $data_epms->dirleader_approve == "Approve" ? 'checked' : '' ?>>
-->
                  <label class="custom-control-label" for="dirleader_approve">Approve</label>
                </div>
            </td>
            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date2" name="part_4_date2" value="<?php echo $data_epms->part_4_date2 ?>">
            </td>
            <?php } ?>

            <?php if (@$_SESSION['level_id'] != '2' && '3') { ?>

            <td><b>Direct Leader Name</b> <br> Pimpinan Langsung & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="part_4_dirleader_name" name="part_4_dirleader_name" value="<?= $data_epms->direct_leader ?>" readonly>
              <input type="file" class="form-control" rows="1" id="part_4_dirleader_sign" name="part_4_dirleader_sign" readonly>
              <br>
              <div class="custom-control custom-checkbox">
              <input name="dirleader_approve" id="dirleader_approve" type="checkbox" class="custom-control-input" value="Approve" <?= $data_epms->dirleader_approve == "Approve" ? 'checked' : '' ?> readonly>
                <!--
              <input name="selected" id="dirleader_approve" type="checkbox" class="custom-control-input selected" value="Approve" <?= $data_epms->dirleader_approve == "Approve" ? 'checked' : '' ?>>
-->
                  <label class="custom-control-label" for="dirleader_approve">Approve</label>
                </div>
            </td>
            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date2" name="part_4_date2"  value="<?php echo $data_epms->part_4_date2 ?>"disabled>
            </td>
            <?php } ?>

            <?php if (@$_SESSION['level_id'] == '3') { ?>
            

            <td><b>Next Higher Leader Name</b> <br> Pimpinan lebih tinggi & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="manager" name="manager" value="<?= $data_epms->manager ?>">

              <input type="file" class="form-control" rows="1" id="part_4_nextleader_sign" name="part_4_nextleader_sign">

              <div class="custom-control custom-checkbox">
              <input name="nextleader_approve" id="nextleader_approve" type="checkbox" class="custom-control-input" value="Approve" <?= $data_epms->nextleader_approve == "Approve" ? 'checked' : '' ?>>
                <!--
                  <input type="checkbox" class="custom-control-input nextleader_approve" id="nextleader_approve" name="selected" value="Approved" <?= $data_epms->nextleader_approve == "Approve" ? 'checked' : '' ?>>
-->
                  <label class="custom-control-label" for="nextleader_approve" value="Approved">Approve</label>
                </div>
            </td>
            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date3" name="part_4_date3" value="<?php echo $data_epms->part_4_date3 ?>">
            </td>

            <?php } ?>

            <?php if (@$_SESSION['level_id'] != '3') { ?>

            <td><b>Next Higher Leader Name</b> <br> Pimpinan lebih tinggi & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="manager" name="manager" value="<?= $data_epms->manager ?>" readonly>

              <input type="file" class="form-control" rows="1" id="part_4_nextleader_sign" name="part_4_nextleader_sign" readonly>

              <div class="custom-control custom-checkbox">
              <input name="nextleader_approve" id="nextleader_approve" type="checkbox" class="custom-control-input" value="Approve" <?= $data_epms->nextleader_approve == "Approve" ? 'checked' : '' ?> readonly>
                <!--
                  <input type="checkbox" class="custom-control-input nextleader_approve" id="nextleader_approve" name="selected" value="Approved" <?= $data_epms->nextleader_approve == "Approve" ? 'checked' : '' ?>>
-->
                  <label class="custom-control-label" for="nextleader_approve" value="Approved">Approve</label>
                </div>
            </td>
            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date3" name="part_4_date3"  value="<?php echo $data_epms->part_4_date3 ?>"readonly>
            </td>

            <?php } ?>
        </tr>
        
       
</table>
  
  <!-- PART 5 -->
  <table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="3" style="background-color: #99c2ce; color: white; color: white">Part 5: Follow Up Action (Tindak lanjut)</th>
        </tr>

        <tr>
            <td colspan="3"><b>To be filled by Leader/Head of Department.</b> Upon submission of the Review Form, following are recommendation from the Head of Department. <br> Diisi oleh pimpinan/kepala departemen. Berikut adalah rekomendasi dari kepala departemen yang perlu ditindak lanjuti oleh Departemen Human Resources
            </td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><b>To be filled by Leader </b><br> (Diisi oleh Leader)</td>
            <td><b>Proposal/Recommendation </b><br> (Proposal/Rekomendasi)</td>
            <td><b>Remarks </b><br> (Keterangan)</td>
        </tr>

        <tr>
            <td>1. Technical competency to improve?
              <textarea class="form-control" id="part_5_competency1" name="part_5_competency1" rows="2"><?php echo $data_epms->part_5_competency1 ?></textarea>
            </td>

            <td>Technical Training 1:
                <textarea class="form-control" id="part_5_competency2" name="part_5_competency2" rows="2"><?php echo $data_epms->part_5_competency2 ?></textarea>
                <br>

              Technical Training 2:
              <textarea class="form-control" id="part_5_competency3" name="part_5_competency3" rows="2"><?php echo $data_epms->part_5_competency3 ?></textarea>
        </td>

            <td>
              <textarea class="form-control" id="part_5_competency_remarks" name="part_5_competency_remarks" rows="2"><?php echo $data_epms->part_5_competency_remarks ?></textarea>
            </td>
        </tr>

        <tr>
            <td>2. Behavior/Soft Skill to improve?
              <textarea class="form-control" id="part_5_skill1" name="part_5_skill1" rows="2"><?php echo $data_epms->part_5_skill1 ?></textarea>
            </td>
            <td>Behavior/Soft skill 1: 
                <textarea class="form-control" id="part_5_skill2" name="part_5_skill2" rows="2"><?php echo $data_epms->part_5_skill2 ?></textarea>
                <br>

              Behavior/Soft skill 2:
              <textarea class="form-control" id="part_5_skill3" name="part_5_skill3" rows="2"><?php echo $data_epms->part_5_skill3 ?></textarea>
            </td>
            <td>
              <textarea class="form-control" id="part_5_skill_remarks" name="part_5_skill_remarks" rows="2"><?php echo $data_epms->part_5_skill_remarks ?></textarea>
            </td>
        </tr>

        <tr>
            <td>3. Recommend for Future Leader/Next Higher Leader Position?
              <textarea class="form-control" id="part_5_recposition1" name="part_5_recposition1" rows="2"><?php echo $data_epms->part_5_recposition1 ?></textarea>
            </td>

            <td>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="part_5_recposition2" id="yes_part_5_recposition2" type="radio" class="custom-control-input" value="Yes" <?= $data_epms->part_5_recposition2 == "Yes" ? 'checked' : '' ?>>
                <label for="yes_part_5_recposition2" class="custom-control-label">Yes</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="part_5_recposition2" id="no_part_5_recposition2" type="radio" class="custom-control-input" value="No" <?= $data_epms->part_5_recposition2 == "No" ? 'checked' : '' ?>>
                <label  for="no_part_5_recposition2" class="custom-control-label">No</label>
            </div>
        </td>
            <td>
              <textarea class="form-control" id="part_5_recposition_remarks" name="part_5_recposition_remarks" rows="2"><?php echo $data_epms->part_5_recposition_remarks ?></textarea>
            </td>
        </tr>

        <tr>
            <td>4. Other Recommendation:<br>A. Rotate to other position <br>B. Transfer to other department   
            </td>
            <td>
            <br>
              <textarea class="form-control" id="part_5_rotateposition" name="part_5_rotateposition" rows="2"><?php echo $data_epms->part_5_rotateposition ?></textarea>
              <br>

              <textarea class="form-control" id="part_5_transferposition" name="part_5_transferposition" rows="2"><?php echo $data_epms->part_5_transferposition ?></textarea>
            </td>

            <td>
              <textarea class="form-control" id="part_5_otherposition_remarks" name="part_5_otherposition_remarks" rows="2"><?php echo $data_epms->part_5_otherposition_remarks ?></textarea>
            </td>
        </tr>

        <tr>
            <td>5. Other Note 
            </td>
            <td>
              <textarea class="form-control" id="part_5_note" name="part_5_note" rows="2"><?php echo $data_epms->part_5_note ?></textarea>
            </td>
            <td>
              <textarea class="form-control" id="part_5_note_remarks" name="part_5_note_remarks" rows="2"><?php echo $data_epms->part_5_note_remarks ?></textarea>
            </td>
        </tr>
</table>

<div class="mb-2 mt-1">
        <input type="submit" class="btn btn-info text-white w-100" value="update" style="font-family: 'ITC Avant Garde Pro Md', sans-serif; background-color: #00acd6; font-weight: bold" />
        </div>
</div>
</form>

<script>
$(document).ready(function() {
  $('.nextleader_approve').attr('disabled', true);

  $('.selected').change(function() {
    //find only the paid in the same row as the selected checkbox
    $(this).closest('tr').find('.nextleader_approve').attr('disabled', !this.checked);
  });
});

</script>
</body>

</html>


	<script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js' ?>'></script>
	<script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-ui.min.js' ?>'></script>
	<script>
$(document).ready(function() {
  $('.nextleader_approve').attr('disabled', true);

  $('.selected').change(function() {
    //find only the paid in the same row as the selected checkbox
    $(this).closest('tr').find('.nextleader_approve').attr('disabled', !this.checked);
  });
});

</script>

<!--
<script>
    $("select[name^='rating']").change(function() {
  var s = $('select[name^="rating"] option:selected').map(function() {
    return this.value
  }).get()

  var sum = s.reduce((pv, cv) => {
    return pv + (parseFloat(cv) || 0);
  }, 0);

  $("#sum").val(sum)
})
</script>
-->

<script>
    $(document).ready(function(){

//iterate through each textboxes and add keyup
//handler to trigger sum event
$(".txt").each(function() {

    $(this).keyup(function(){
        calculateSum();
    });
});
});

function calculateSum() {
var sum = 0;
//iterate through each textboxes and add the values
$(".txt").each(function() {

    //add only if the value is number
    if(!isNaN(this.value) && this.value.length!=0) {
        sum += parseFloat(this.value);
    }

});
//.toFixed() method will roundoff the final sum to 2 decimal places
$("#sum").html(sum.toFixed(2));
</script>

<script>
    $("select[name^='rating3A']").change(function() {
  var s = $('select[name^="rating3A"] option:selected').map(function() {
    return this.value
  }).get()

  var sum1 = s.reduce((pv, cv) => {
    return pv + (parseFloat(cv) || 0);
  }, 0)*0.5;

  $("#sum1").val(sum1)
})
</script>

<script>
    $("select[name^='rating3B']").change(function() {
  var s = $('select[name^="rating3B"] option:selected').map(function() {
    return this.value
  }).get()

  var sum2 = s.reduce((pv, cv) => {
    return pv + (parseFloat(cv) || 0);
  }, 0)*0.2;

  $("#sum2").val(sum2)
})
</script>

<script>
    $("select[name^='rating3C']").change(function() {
  var s = $('select[name^="rating3C"] option:selected').map(function() {
    return this.value
  }).get()

  var sum3 = s.reduce((pv, cv) => {
    return pv + (parseFloat(cv) || 0);
  }, 0)*0.3;

  $("#sum3").val(sum3)
})
</script>

</body>

</html>