 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"></h1>
   </div>
   <div class="alert alert-info" >
  <h4><center><strong>-- Performance Management System --</strong></h4></center>
  <div class="px-2 bg-light "><marquee class="py-3">Welcome To Cladtek Performance Management System</marquee></div>

<br>
   <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                   Year</div>
                   <div class="h3 mb-0 font-weight-bold text-gray-800"><?php $today= date("d-m-Y"); echo $today; ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-calendar fa-5x text-gray-300"></i>
               </div>
             </div>
           </div>
         </div>
       </div>
       
       

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                   Manage Data</div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $manage_data ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-table fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>epms/index" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>
     

     <!-- Earnings (Annual) Card Example -->
     <?php if (@$_SESSION['level_id'] == '2') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                   Direct Leader</div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $direct_leader ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>Home/direct_leader" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>

       <!--  -->

     <?php } ?>

     <!-- Tasks Card Example -->
     <?php if (@$_SESSION['level_id'] == '3') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dept Manager / HOD
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $manager ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>Home/hod" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <!-- Tasks Card Example -->
     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Human Resources
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hrd ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>Home/hrd" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>

       <!-- Pending Requests Card Example -->
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Business Development
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_businessdev ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>business/hrd_business" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>

     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Cladtek
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_cladtek ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>cladtek/hrd_cladtek" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Design
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_design ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>design/hrd_design" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Finance & Accounting
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_finance ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>finance/hrd_finance" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Health, Safety, & Environment
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_hse ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>hse/hrd_hse" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Human Resource
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_hr ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>hr/hrd_hr" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. IT & EPICOR
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_it ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>it/hrd_it" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Maintanance & Engineering
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_me ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>me/hrd_me" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Process Improvement
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_pi ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>pi/hrd_pi" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Production
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_production ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>production/hrd_production" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Production Automation
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_prodauto ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>prodauto/hrd_prodauto" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Project (Others)
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_project ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>project/hrd_project" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Project Operations
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_projectop ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>projectop/hrd_projectop" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Quality Assurance
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_qa ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>qa/hrd_qa" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Quality Control
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_qc ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>qc/hrd_qc" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Supply Chain Management
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_scm ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>scm/hrd_scm" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Technical
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_technical ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>technical/hrd_technical" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

   </div>

 </div>
 <!-- /.container-fluid -->
 </div>
 </div>

 <!-- End of Main Content -->