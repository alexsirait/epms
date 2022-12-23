<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cladtek EPMS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link href="http://fonts.cdnfonts.com/css/itc-avant-garde-pro-md" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>

<div class="container bg-white">
<button type="button" id="cmd" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
          <section class="content">
<a href="<?= base_url(); ?>manager"><img src="<?php echo base_url()?>images/logo-cladtek.png" alt="Logo-Cladtek" style="width: 10%; height: auto"></a>
  <h2 class="text-right">Performance Management System (PMS)</h2>
  <h4 class="text-right">Form</h4> 

  <a href="<?= base_url(); ?>epms/rating_criteria"> Rating Criteria (Kriteria Penilaian) </a>
  <br>
  <a href="<?= base_url(); ?>epms/filling_instruction"> Filling Instruction (Instruksi Pengisian)</a>
  

  <?php echo form_open_multipart('epms/submit');?>
  <form action="<?php echo site_url('epms/submit')?>" method="post" role="form">
  <!-- PART 1 -->
  <table class="table table-bordered" style="color: black">
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
            <input type="text" class="form-control" rows="1" id="full_name" name="full_name" value="<?= $fix_epms['full_name'] ?>" readonly>
            <input type="text" class="form-control" rows="1" id="email" name="email" value="<?= $fix_epms['email'] ?>" hidden>
            <input type="text" class="form-control" rows="1" id="level_id" name="level_id" value="<?= $fix_epms['level_id'] ?>" hidden>
        </td>
        <td>
            <input type="text" class="form-control" rows="1" id="employee_id" name="employee_id" value="<?= $fix_epms['employee_id'] ?>"readonly>
        </td>
        <td>
            <input type="text" class="form-control" rows="1" id="department" name="department" value="<?= $fix_epms['department'] ?>"readonly>
        </td>
        <td>
            <input type="text" class="form-control" rows="1" id="designation" name="designation" value="<?= $fix_epms['designation'] ?>"readonly>
            <input type="text" class="form-control" rows="1" id="section" name="section" value="<?= $fix_epms['section'] ?>"readonly>
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
            <input class="form-control" rows="1" id="direct_leader" name="direct_leader" value="<?= $fix_epms['direct_leader'] ?>">
            <input type="text" class="form-control" rows="1" id="direct_leader_email" name="direct_leader_email" value="<?= $fix_epms['direct_leader_email'] ?>" hidden>
        </td>
        <td>
            <div >
                <div class="form-check-inline custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="Permanent" name="status" value="Permanent">
                    <label class="custom-control-label" for="Permanent">Permanent</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="Contract" name="status" value="Contract">
                    <label class="custom-control-label" for="Contract">Contract</label>
                </div>
            </div>
        </td>
        <td>
            <div>
                <div class="form-check-inline custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="Yard 1" name="location" value="Yard 1">
                    <label class="custom-control-label" for="Yard 1">Yard 1</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="Yard 2" name="location" value="Yard 2">
                    <label class="custom-control-label" for="Yard 2">Yard 2</label>
                </div>
            </div>
        </td>
        <td>From: 
          <input type="date" class="form-control" name="period_from"><br> 
          To: 
          <input type="date" class="form-control" name="period_to">
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
            <textarea class="form-control" id="summary" name="summary" rows="2"></textarea>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- PART 3 -->
  <table class="table table-bordered" style="color: black">
    <thead>
        <tr>
            <th colspan="4" style="background-color: #99c2ce; color: white; color: white">Part 3 : Agreement/Commitment (Persetujuan/Komitmen)</th>
        </tr>
    </thead>
    <thead>
      <tr>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">3A. Performance (Kinerja)</th>
        <th class="text-center" style="vertical-align: middle; background-color: #daeef3">Results (Hasil)* <br> <i style="font-size: 70%">Please put number</i></th>
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
                        <div class="col-1">
                            <textarea class="form-control" rows="1" id="incident" name="incident" style="width:1.5cm"></textarea>
                        </div>
                        <div class="col-8 ml-4">Working Incident (Insiden kerja).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-1">
                            <textarea class="form-control" rows="1" id="dafw" name="dafw" style="width:1.5cm"></textarea>
                        </div>
                        <div class="col-10 ml-4">Day Away From Work (DAFW) (Jumlah hari tidak masuk karena kecelakaan kerja).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-1">
                            <textarea class="form-control" rows="1" id="mvc" name="mvc" style="width:1.5cm"></textarea>
                        </div>
                        <div class="col-10 ml-4">Motor Vehicle Crash (MVC) on the way and return from work (Kecelakaan dalam berkendara saat pergi dan pulang kerja).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-1">
                            <textarea class="form-control" rows="1" id="covid" name="covid" style="width:1.5cm"></textarea>
                        </div>
                        <div class="col-10 ml-4">Covid-19 Protocol Violation (pelanggaran protocol Covid-19).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-1">
                            <textarea class="form-control" rows="1" id="safety" name="safety" style="width:1.5cm"></textarea>
                        </div>
                        <div class="col-10 ml-4">Safety violation (Pelanggaran keselamatan).
                        </div>
                    </div>
                </li>
                <li class="mt-1">
                <div class="row">
                        <div class="col-1">
                            <textarea class="form-control" rows="1" id="hse" name="hse" style="width:1.5cm"></textarea>
                        </div>
                        <div class="col-10 ml-4">HSE Observation Submission
                        </div>
                    </div>
                </li>
            </ul>
        </td>

        <td class="col-md-2">
            <select class="custom-select"  name="rating3A_1" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
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
              <textarea class="form-control" rows="3" id="routine1" name="routine1"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="routine1_result" name="routine1_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_2" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="routine2" name="routine2"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="routine2_result" name="routine2_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_3" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="routine3" name="routine3"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="routine3_result" name="routine3_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_4" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="routine4" name="routine4"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="routine4_result" name="routine4_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_5" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="routine5" name="routine5"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="routine5_result" name="routine5_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_6" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
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
              <textarea class="form-control" rows="3" id="non_routine1" name="non_routine1"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine1_result" name="non_routine1_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_7" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="non_routine2" name="non_routine2"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine2_result" name="non_routine2_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_8" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="non_routine3" name="non_routine3"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine3_result" name="non_routine3_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_9" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="non_routine4" name="non_routine4"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine4_result" name="non_routine4_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_10" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
          </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="non_routine5" name="non_routine5"></textarea>
          </td>
          <td>
              <textarea class="form-control" rows="3" id="non_routine5_result" name="non_routine5_result"></textarea>
          </td>
          <td>
              <select class="custom-select"  name="rating3A_11" disabled>
                <option value="rating">rating</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
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
              <textarea class="form-control" rows="3" id="competency_development1" name="competency_development1"></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="3" id="competency_development_result1" name="competency_development_result1"></textarea>
            </td>
            <td>
                <!-- <textarea class="form-control" rows="1" id="rating3B_1" name="rating3B_1"></textarea> -->
                <select class="custom-select"  name="rating3B_1" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="competency_development2" name="competency_development2"></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="3" id="competency_development_result2" name="competency_development_result2"></textarea>
            </td>
            <td>
                <!-- <textarea class="form-control" rows="1" id="rating3B_2" name="rating3B_2"></textarea> -->
                <select class="custom-select"  name="rating3B_2" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </td>
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="competency_development3" name="competency_development3"></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="3" id="competency_development_result3" name="competency_development_result3"></textarea>
            </td>
            <td>
                <!-- <textarea class="form-control" rows="1" id="rating3B_3" name="rating3B_3"></textarea> -->
                <select class="custom-select"  name="rating3B_3" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </td> 
      </tr>
      <tr>
          <td>
              <textarea class="form-control" rows="3" id="competency_development4" name="competency_development4"></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="3" id="competency_development_result4" name="competency_development_result4"></textarea>
            </td>
            <td>
                <!-- <textarea class="form-control" rows="1" id="rating3B_4" name="rating3B_4"></textarea> -->
                <select class="custom-select"  name="rating3B_4" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
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
              <textarea class="form-control" rows="3" id="teamwork_result" name="teamwork_result"></textarea>
          </td>
          <td>
                <!-- <textarea class="form-control" rows="1" id="rating3C_1" name="rating3C_1"></textarea> -->
                <select class="custom-select"  name="rating3C_1" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </td>
      </tr>
      <tr>
          <td>
              Flexibility (Fleksibilitas)
          </td>
          <td>
              <textarea class="form-control" rows="3" id="flexibility_result" name="flexibility_result"></textarea>
          </td>
          <td>
                <!-- <textarea class="form-control" rows="1" id="rating3C_2" name="rating3C_2"></textarea> -->
                <select class="custom-select"  name="rating3C_2" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </td>
      </tr>
      <tr>
          <td>
                 Discipline (disiplin): Data Provided by HR for Leadership.
          </td>
          <td>
                <table style="color: black">
                    <tr>
                        <td>Attendance Rate (Tingkat kehadiran)</td>
                        <td><textarea class="form-control" rows="1" id="attendance_rate" name="attendance_rate" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td>Attendance Violation (Pelanggaran kehadiran): Gate Looping, Lateness, Over break time, ABS.</td>
                        <td><textarea class="form-control" rows="1" id="attendance_violation" name="attendance_violation" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td>MC Case (Kasus Medis): Long Sickness, Regular MC Cases.</td>
                        <td><textarea class="form-control" rows="1" id="mc_case" name="mc_case" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td>Warning 1 (peringatan 1)</td>
                        <td><textarea class="form-control" rows="1" id="warning1" name="warning1" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td>Warning 2 (peringatan 2)</td>
                        <td><textarea class="form-control" rows="1" id="warning2" name="warning2" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td>Warning 3 (peringatan 3)</td>
                        <td><textarea class="form-control" rows="1" id="warning3" name="warning3" disabled></textarea></td>
                    </tr>
                </table>
          </td>

          <td>
              <select class="custom-select"  name="rating3C_3" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
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
              <textarea class="form-control" rows="2" id="building_result" name="building_result" disabled></textarea>
          </td>
          <td>
              <!-- <textarea class="form-control" rows="2" id="rating3C_4" name="rating3C_4"></textarea> -->
              <select class="custom-select"  name="rating3C_4" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
          </td>
      </tr>

      <tr>
          <td>
              Planning and Organization Skill <br> (Ketrampilan dalam perencanaan dan organisasi)
          </td>
          <td>
              <textarea class="form-control" rows="2" id="planning_result" name="planning_result" disabled></textarea>
          </td>
          <td>
              <!--<textarea class="form-control" rows="1" id="rating3C_5" name="rating3C_5"></textarea> -->
              <select class="custom-select"  name="rating3C_5" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
          </td>
      </tr>

      <tr>
          <td>
              Leadership <br> (kepemimpinan)
          </td>
          <td>
              <textarea class="form-control" rows="2" id="leadership_result" name="leadership_result" disabled></textarea>
          </td>
          <td>
              <!-- <textarea class="form-control" rows="1" id="rating3C_6" name="rating3C_6"></textarea> -->
              <select class="custom-select"  name="rating3C_6" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
          </td>
      </tr>

      <tr>
          <td>
              Costumer Focus <br> (Orientasi pelanggan)

          </td>
          <td>
              <textarea class="form-control" rows="2" id="costumer_result" name="costumer_result" disabled></textarea>
          </td>
          <td>
              <!-- <textarea class="form-control" rows="1" id="rating3C_7" name="rating3C_7"></textarea> -->
              <select class="custom-select"  name="rating3C_7" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
          </td>
      </tr>

      <tr>
          <td>
              Integrity and Trust <br> (Integritas dan Kepercayaan)
          </td>
          <td>
              <textarea class="form-control" rows="2" id="integrity_result" name="integrity_result" disabled></textarea>
          </td>
          <td>
              <!-- <textarea class="form-control" rows="1" id="rating3C_8" name="rating3C_8"></textarea> -->
              <select class="custom-select"  name="rating3C_8" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
          </td>
      </tr>
    </tbody>
  </table>

  <!-- PART 4 -->
  <table class="table table-bordered" style="color: black">
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
                <textarea class="form-control" rows="1" id="first_rating" name="first_rating" disabled></textarea> 
                <!-- <select class="custom-select"  name="first_rating" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>-->
            </td>
        </tr>
      
        <tr>
            <td colspan="5" style="background-color: #f2f2f2">Final Rating (after Leadership Team Discussion)</td>
            <td>
                <textarea class="form-control" rows="1" id="final_rating" name="final_rating" disabled></textarea>
                <!-- <select class="custom-select"  name="final_rating" disabled>
                    <option value="rating">rating</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select> -->
            </td>
        </tr>
      
        <tr>
            <td colspan="6">Note from Leader (Catatan dari Pimpinan)
                <textarea class="form-control" rows="2" id="part_4_note" name="part_4_note" disabled></textarea>
            </td>
        </tr>

        <tr>
            <td><b>Employee Name & Signature</b> <br> Nama Pegawai & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="part_4_emp_name" name="part_4_emp_name" value="<?= $fix_epms['full_name'] ?>">
              <input type="file" class="form-control" rows="1" id="part_4_emp_sign" name="part_4_emp_sign">
              <br>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="emp_submit" name="emp_submit" value="Submit">
                  <label class="custom-control-label" for="emp_submit">Submit</label>
                </div>
            </td>
            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date1" name="part_4_date1" >
            </td>

            <td><b>Direct Leader Name</b> <br> Pimpinan Langsung & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="part_4_dirleader_name" name="part_4_dirleader_name" value="<?= $fix_epms['direct_leader'] ?>" disabled>
              <input type="file" class="form-control" rows="1" id="part_4_dirleader_sign" name="part_4_dirleader_sign" readonly>
              <br>
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="dirleader_approve" name="dirleader_approve" value="Approved" disabled>
                  <label class="custom-control-label" for="dirleader_approve" value="Approved">Approve</label>
                </div>
            </td>

            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date2" name="part_4_date2" disabled>
            </td>

            <td><b>Next Higher Leader Name</b> <br> Pimpinan lebih tinggi & Tanda Tangan
              <input type="text" class="form-control" rows="1" id="manager" name="manager" value="<?= $fix_epms['manager'] ?>" readonly>
              <input type="text" class="form-control" rows="1" id="manager_email" name="manager_email" value="<?= $fix_epms['manager_email'] ?>" hidden>
              <input type="file" class="form-control" rows="1" id="part_4_nextleader_sign" name="part_4_nextleader_sign" readonly>
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="nextleader_approve" name="nextleader_approve" value="Approved" disabled>
                  <label class="custom-control-label" for="nextleader_approve" value="Approved">Approve</label>
                </div>
            </td>
            <td>Date
              <input type="date" class="form-control" rows="1" id="part_4_date3" name="part_4_date3" disabled>
            </td>
        </tr>
</table>
  
  <!-- PART 5 -->
  <table class="table table-bordered" style="color: black">
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
              <textarea class="form-control" rows="2" id="part_5_competency1" name="part_5_competency1" disabled></textarea>
            </td>
            <td>Technical Training 1: <textarea class="form-control" rows="1" id="part_5_competency2" name="part_5_competency2" disabled></textarea>
              Technical Training 2:
              <textarea class="form-control" rows="1" id="part_5_competency3" name="part_5_competency3" disabled></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="1" id="part_5_competency_remarks" name="part_5_competency_remarks" disabled></textarea>
            </td>
        </tr>

        <tr>
            <td>2. Behavior/Soft Skill to improve?
              <textarea class="form-control" rows="2" id="part_5_skill1" name="part_5_skill1" disabled></textarea>
            </td>
            <td>Behavior/Soft skill 1: <textarea class="form-control" rows="1" id="part_5_skill2" name="part_5_skill2" disabled></textarea> <br>
              Behavior/Soft skill 2:
              <textarea class="form-control" rows="1" id="part_5_skill3" name="part_5_skill3" disabled></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="1" id="part_5_skill_remarks" name="part_5_skill_remarks" disabled></textarea>
            </td>
        </tr>

        <tr>
            <td>3. Recommend for Future Leader/Next Higher Leader Position? 
              <textarea class="form-control" rows="2" id="part_5_recposition1" name="part_5_recposition1" disabled></textarea>
            </td>
            <td>
                <div>
                    <div class="form-check-inline custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="yes_part_5_recposition2" name="part_5_recposition2" value="yes" disabled>
                        <label class="custom-control-label" for="yes_part_5_recposition2">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="no_part_5_recposition2" name="part_5_recposition2" value="no"disabled>
                        <label class="custom-control-label" for="no_part_5_recposition2">No</label>
                    </div>
                </div>
            </td>
            <td>
              <textarea class="form-control" rows="1" id="part_5_recposition_remarks" name="part_5_recposition_remarks" disabled></textarea>
            </td>
        </tr>

        <tr>
            <td>4. Other Recommendation:<br>A. Rotate to other position <br>B. Transfer to other department   
            </td>
            <td>
              <textarea class="form-control" rows="1" id="part_5_rotateposition" name="part_5_rotateposition" disabled></textarea>
              <textarea class="form-control" rows="1" id="part_5_transferposition" name="part_5_transferposition" disabled></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="1" id="part_5_otherposition_remarks" name="part_5_otherposition_remarks" disabled></textarea>
            </td>
        </tr>

        <tr>
            <td>5. Other Note 
            </td>
            <td>
              <textarea class="form-control" rows="2" id="part_5_note" name="part_5_note" disabled></textarea>
            </td>
            <td>
              <textarea class="form-control" rows="1" id="part_5_note_remarks" name="part_5_note_remarks" disabled></textarea>
            </td>
        </tr>
</table>

<div class="mb-2 mt-1">
        <input type="submit" class="btn btn-info text-white w-100" value="submit" style="font-family: 'ITC Avant Garde Pro Md', sans-serif; background-color: #00acd6; font-weight: bold" />
        </div>
</div>
</form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
                    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(document).ready(function() {
      var doc = new jsPDF("20", "pt", "letter");
      $('#cmd').click(function () {
        let doc = new jsPDF('20','pt','letter');
        doc.viewerPreferences({'FitWindow': true}, true)
        doc.addHTML($('#content'),function() {
            doc.autoPrint({variant: 'non-conform'});
            doc.save('epms.pdf');
        }); 
      });
  });

</script>    
</body>

</html>
