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

<div class="container">
<a href="<?= base_url(); ?>manager"><img src="<?php echo base_url()?>images/logo-cladtek.png" alt="Logo-Cladtek" style="width: 10%; height: auto"></a>
  <h2 class="text-right">Performance Management System (PMS)</h2>
  <h4 class="text-right">Filling Instruction (Instruksi Pengisian)</h4>

  <div style="background-color: #daeef3">
    <h5 style="background-color: #99c2ce; color: white"><b>Part 1: Employee Information</b> (Bagian 1 : Informasi Pegawai)</h5>
    <ul>
      <li><b>Write down your full name</b> (Tuliskan nama lengkap)</li>
      <li><b>Write down your employee ID</b> (Tuliskan nomor pegawai)</li>
      <li><b>Write down your department</b> (Tuliskan nama departemen. Tuliskan 2 atau lebih, bila pernah bekerja pada 2 departemen yang berbeda dalam rentang waktu dari Januari tahun berjalan hingga saat ini)</li>
      <li><b>Write down your Position. If you hold 2 or more different positions in a year, please write down all the positions.</b> (Tuliskan nama posisi. Tuliskan 2 atau lebih, bila pernah bekerja pada 2 posisi yang berbeda dalam rentang waktu dari Januari tahun berjalan hingga saat ini)</li>
      <li><b>Pick one employee status options </b> (Pilih salah satu status pegawai)</li>
      <li><b>Write down your direct leader name </b> (Tuliskan nama pimpinan langsung)</li>
      <li><b>Pick one working location: Yard 1 Office/Yard 1 shop floor/Yard 2  </b> (Pilih salah satu lokasi kerja)</li>
      <li><b>Period Cover: Since 1 January to 31 December, except if you start working with Cladtek from particular month. Contract break/rehire after one month is included</b> (Periode yang di cover. Sejak 1 Januari hingga 31 Desember, kecuali mulai bekerja di Cladtek sejak bulan tertentu. Contract break selama 1 bulan termasuk didalamnya.)</li>
    </ul>
  </div>

  <div style="background-color: #daeef3">
    <h5 style="background-color: #99c2ce; color: white"><b>Part 2: Summary of department objectives as related to your role </b>(Bagian 2: Kesimpulan dari target departemen yang berhubungan dengan posisi/peran/tanggung jawabmu).</h5>
    <ul>
      <li><b>Write down your annual general role based on your job description and department target this year that support KPI. </b>(Tuliskan kesimpulan dari target pekerjaan tahunan saudara berdasarkan tujuan department dan peran/posisi/tanggung jawab saudara.)</li>
    </ul>
  </div>

  <div style="background-color: #daeef3">
    <h5 style="background-color: #99c2ce; color: white"><b>Part 3: Agreement/Commitment </b>(Bagian 3: Persetujuan/Komitmen)</h5>
    <h6><b>3A. Performance</b> (Kinerja)</h6>
    <p class="text-primary"><b>3A.1. Safety and Compliance</b> (Keselamatan dan Kepatuhan)</p>
    <p><b>In result column, write down your safety and compliance status. You can also add any safety and compliance activities or initiative during performance year. Example:</b> (Dalam kolom hasil, tuliskan hasil dari pencapaian target individu berdasarkan tujuan safety dan kepatuhan. Contoh:)</p>
    <ul>
      <li><b>0 Working Incident </b>(0 Insiden kerja)</li>
      <li><b>2 Days Away From Work (DAFW) </b>(2 hari tidak masuk karena kecelakaan kerja)</li>
      <li><b>0 Motor Vehicle Crash (MVC) on the way and return from work </b>(0 Kecelakaan dalam berkendara saat pergi dan pulang kantor)</li>
      <li><b>0 Covid-19 Protocol Violation </b>(0 pelanggaran protocol Covid-19)</li>
      <li><b>0 Safety violation </b>(0 Pelanggaran keselamatan).</li>
      <p><b>+ You can also add other safety related performance</b> (Dapat menambahkan pencapaian/usaha safety lainnya)  </p>
      <li><b>Created and facilitated 3 safety review meetings within section/department on date …</b>(Membuat dan menfasilitasi 3 pertemuan untuk mengulas keselamatan bersama seksi … /departemen … pada tanggal …..)</li>
      <li><b>Shared/presented safety awareness topic 4 times within section/department on date … </b><br>Membagi/mempresentasikan topik keselamatan sebanyak 4 kali di seksi/departemen pada tanggal …)</li>
      <li><b>Initiated helmet safety campaign in coordination with HSE team starting from date … </b>(Menginisiasi kampanye penggunaan helm berkoordinasi dengan HSE team mulai dari tanggal …)</li>
    </ul>

    <p class="text-primary"><b>3A.2. Routine and Primary Job </b>(Pekerjaan rutin dan utama)</p>
    <p><b>In result column, write down your performance result based on your primary task (routine and primary job) during performance year. Example: </b>(Dalam kolom hasil, tuliskan hasil dari pencapaian target berdasarkan tugas-tugas utama selama tahun kinerja. Contoh:)</p>
    <ul>
      <li><b>Operated QH machines with 30 WOL projects from January to June with arc on time rate …. And defect rate …..  Continue operate MLP machine with 21 MLP Projects from April to October 2020 with quality rate …..  </b>(Mengoperasikan mesin QH untuk menyelesaikan 30 projek WOL dari Januari hingga Juni 2020 dengan target arc on time …. dan defect rate … . Selanjutnya mengoperasikan mesin MLP untuk menyelesaikan 21 project lainnya dari April ke Oktober dengan tingkat kualitas …..)</li>
      <li><b>Successfully developed and created 5 applications programs to improve MLP & WOL working activities and reporting by August 2020 with agreed scope. + Successfully developed 2 other applications program for SCM purchasing approval system from June to August 2020. </b>(Berhasil mengembangkan dan menciptakan 5 program aplikasi untuk meningkatkan kinerja mesin MLP & WOL serta sistem pelaporannnya. + Juga berhasil mengembangkan 2 aplikasi lainnya untuk sistem pembelian dan persetujuan bagi SCM dari bulan Juni hingga Agustus 2020).</li>
      <li><b>Implemented 110 training plan with achievement 94%, increased production multi skill rate to 95%, and executed 80 unplanned trainings. </b>(Mengimplementasi 110 rencana training dengan tingkat keberhasilan 94%, meningkatkan jumlah multi skill di production menjadi 95%, serta mengimplemetasikan 80 training mandatori yang tidak direncanakan)</li>
      <li><b>Successfully Reduced 30% of downtime case in 2020 and improve machine reliability in coordination with Optimization Department</b> (Berhasil menurunkan kasus downtime sebesar 30% di 2020 dengan cara meningkatkan reliabilitas mesin dan berkolaborasi dengan departemen Optimization)</li>
    </ul>

    <p class="text-primary"><b>3A.3. Non Routine: Initiative, Improvement, beyond-primary-scope-job.</b> (Pekerjaan tidak rutin, inisiatif, perubahan positif, dan aktifitas di luar tugas utama).</p>
    <p><b>In result column, write down your performance result. Example: </b>(Pada kolom hasil, tuliskan hasil kinerja yang berhubungan dengan bagian ini. Contoh:)</p>
    <ul>
      <li><b>Worked as Internal Auditor from 20 Sept. - 30 Oct. 2020 to audit 52 Business processes from 7 departments within CBM. </b>(Bekerja sebagai internal auditor dari tanggal 20 September hingga 30 Oktober dan berhasil menyelesaikan audit terhadap 52 proses bisnis dari 7 departemen di CBM).</li>
      <li><b>Successfully improved 150 JDs from 15 Departments by December 2020 </b>(Berhasil memperbaiki dan mengkoreksi 150 JD dari 15 Departemen pada bulan Desember 2020).</li>
      <li><b>Successfully reduce shop floor house load to 15% with cost efficiency to USD … by July 2020. </b>(Berhasil mengurangi jumlah pengunaan listrik hingga 15% dengan target penghematan biaya hingga USD … pada bulan Juli 2020).</li>
      <li><b>Participate as committee in Cladtek Vaccination Program. </b>(Berpartisipasi sebagai panitia program vaksin).</li>
      <li><b>Participate as committee in Cladtek Company Gift Program. </b>(Berpartisipasi sebagai panitia program company gift).</li>
    </ul>

    <h6><b>Part 3B: Competency Development </b>(Pengembangan Kompetensi)</h6>
    <p><b>In result column, write down your development plan result. Example:  </b>(Pada kolom hasil, tuliskan penyelesaian program dan aktivitas pengembangan yang dilakukan. Contoh:)</p>
    <ul>
      <li><b>Attended 2 Trainings: QH Multi skill Training in October 2020 with score 90 & Production Optimization Training in November 2020 with score 95. </b>(Menghadiri 2 Training, yaitu: QH Multi skill Training pada bulan Oktober 2020 dengan skor 90, & Menghadiri training Production Optimization pada bulan November 2020 dengan skor 95).</li>
      <li><b>Learning TH and SHV Work Instruction with Supervisor on July 2020 </b>(Mempelajari TH dan SHV Work Instruction bersama Supervisor pada bulan July 2020)</li>
      <li><b>Joined Webinar Class on Qualification Test and Methodology Class conducted by ITB in August 2020. </b>(Menghadiri Online Webinar Class dengan topik Tes dan Metode Kualifikasi yang diselenggarakan oleh ITB pada bulan Agustus 2020)</li>
      <li><b>Mentored 2 new employees in Maintenance from March to June 2020 </b>(Mentor 2 pegawai baru di Maintenance sejak bulan Maret hingga Juni 2020).</li>
    </ul>

    <h6><b>Part 3C: Behavior & Leadership</b> (Perilaku dan Kepemimpinan)</h6>
    <p class="text-primary"><b>Team work and communication </b>(Kerja tim dan Komunikasi)</p>
    <p><b>In result column, write down your team work and communication result. Example:  </b>(Pada kolom hasil, tuliskan hal-hal yang telah dilakukan untuk menguatkan kerja tim dan komuikasi. Contoh:)</p>
    <ul>
      <li><b>Faciliate/mediate co-worker to find resolution when facing a …………. Problem </b>(Menfasilitasi/memediasi komunikasi antar rekan kerja saat mencari solusi untuk masalah/tantangan terkait …….. Dengan …….).</li>
      <li><b>Create standard daily update/report to leader starting from June 2020 for easy communication process. </b>(Menciptakan standar perlaporan harian/mingguan kepada leader sejak Juni 2020 sehingga mempermudah proses komunikasi kerja).</li>
      <li><b>Successfully resolving 24 issues from March to August 2020 with new recommendation options approach that drive good effective decision making. </b>(Berhasil menyelesaikan 24 isu dari Maret hingga Agustus 2020 dengan menggunakan pendekatan rekomendasi opsi yang mempercepat pengambilan keputusan oleh pimpinan).</li>
    </ul>

    <p class="text-primary"><b>Flexibility </b>(Fleksibilitas)</p>
    <p><b>In result column, write down your flexibility result. Example: </b>In result column, write down your flexibility result. Example: </p>
    <ul>
      <li><b>Back up and replace 1 employee who take maternity leave from August to November 2020 while still doing primary job. </b>(Menggantikan 1 pegawai yang sedang mengambil cuti melahirkan dari bulan Agustus hingga November 2020, sementara masih tetap melakukan pekerjaan utama sebagai …)</li>
      <li><b>Support MLP as WOL operator. </b>(Mendukung pekerjaan di MLP sementara masih aktif sebagai WOL Operator).</li>
      <li><b>Conducted regular housekeeping activity in SHV area and gained positive feedback and reward from HoD and HSE </b>(Melakukan aktivitas untuk menjaga kerapian dan keberhasilan area SHV secara rutin, dan mendapatkan penilaian positif/penghargaan dari HoD dan HSE).</li>
    </ul>

    <p class="text-primary"><b>Discipline </b>(Disiplin)</p>
    <ul>
      <li><b>Data will be provided by HR</b>(Data akan disediakan oleh HR)</li>
    </ul>

    <p class="text-primary"><b>Value Based Competency: for Leadership Position Only.</b> (Kompetensi Berbasis Nilai: Untuk Pimpinan)</p>
    <ul>
      <li><b>Focus on result column, describe how you implement the value within your department/section. </b>(Fokus pada kolom hasil, gambarkan bagaimana anda mengimplementasikan nilai-nilai tersebut dalam departemen/seksi anda).</li>
    </ul>
  </div>

  <div style="background-color: #daeef3">
    <h5 style="background-color: #99c2ce; color: white"><b>Part 4: Rating & Ranking </b>(Bagian 4: Rating & Ranking).</h5>
    <p><b>Rating & Ranking value provided in Legend, with the following level:</b> (Nilai Rating & Ranking disediakan dengan urutan berikut:)</p>
    <p><b>5: Outstanding </b>(luar biasa)<br>
      <b>4: Exceed </b>(di atas rata-rata)<br>
      <b>3: Meet </b>(sesuai harapan)<br>
      <b>2: Need Improvement </b>(membutuhkan peningkatan)<br>
      <b>1: Below Expectation</b> (dibawah harapan)<br>
    </p>
    <ul>
      <li><b>First Rating from Leader. To be completed by direct leader by calculating the average of the ratings in each result column. </b>(Rating Pertama, diisi oleh pimpinan langsung dengan cara menghitung rata-rata rating yang ada pada kolom diatasnya)</li>
      <li><b>Final Rating (after Leadership Team Discussion). To be completed by HoD after departmental level meeting with GM and HR. </b>(Rating Final, diisi oleh kepala departemen setelah meeting dengan GM dan HR pada tingkat departemen selesai dilakukan).</li>
      <li><b>HoD/Leader to provide specific note as a reference for employee’s direct leader to communicate the ranking to his/her member later. </b>(Kepala departemen/pimpinan dapat menuliskan catatan khusus sebagai referensi bagi pimpinan langsung pada saat mengkomunikasikan ranking kepada anggotanya nanti). </li>
      <li><b>Signature column to be filled when ranking has finally decided and approved by management. </b>(Tanda tangan baru dibubuhkan saat ranking sudah diputuskan final dan disetujui oleh management)</li>
    </ul>
  </div>

  <div style="background-color: #daeef3">
    <h5 style="background-color: #99c2ce; color: white"><b>Part 5: Follow Up Action</b> (Bagian 5: Rating & Ranking).</h5>
    <p><b>Leader to provide information for Next Year Follow Up Action  </b>(Pimpinan menyediakan informasi untuk ditindak lanjuti tahun berikutnya):</p>
    <ol>
      <li><b>Technical competency to improve? </b> (Kompetensi Teknis yang masih harus dikembangkan)</li>
      <li><b>Behavior/Soft Skill to improve? </b>(Perilaku/Kemampuan soft skill yang masih harus diperbaiki/dikembangkan)</li>
      <li><b>Recommed for Future Leader/Next Higher Leader Position? (YES/NO) </b>(Direkomendasi untuk posisi pimpinan? [YA/TIDAK])</li>
      <li><b>4. Other Recommendation: </b>(Rekomendasi Lain)<br>
        <b>A. Rotate to other position</b> (Diputar ke posisi lain)<br>
        <b>B. Transfer to other department </b>(Ditransfer ke departement lain)
      <li><b>Other Note </b>(Catatan lainnya)</li>
</li>
    </ol>
  </div>
</div>