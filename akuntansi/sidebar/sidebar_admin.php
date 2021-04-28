<div id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <a href="index_admin.php" class="sidebar-brand">
                <i class="gi gi-calculator"></i><span class="sidebar-nav-mini-hide"><strong>UMKM </strong>Web</span>
            </a>
        <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
            <div class="sidebar-user-avatar">
                <a><img src="img/admin.png" alt="avatar"></a>
            </div>
        <?php
            $query = "select * from admin where username = '".$_SESSION['username']."'";
            $result = mysqli_query($connect, $query);
            if($result) {
                while ($row = mysqli_fetch_row($result)){
                    $username = $row[0];
                    $nama = $row[2];
        ?>
            <div class="sidebar-user-name"> <?php echo $username ?></div>
            <div class="sidebar-user-links">
                <?php echo $nama ?> <a href="admin_profil.php?id=<?php echo $username ?>" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
            </div>
        </div>
			<?php
			}
			}
			?>

<ul class="sidebar-nav">
    <li>
        <a href="index_admin.php" ><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
    </li>		
    <li>
        <a href="admin_data_user.php" ><i class="gi gi-user_add  sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">User</span></a>
    </li>						
    <li class="sidebar-header">
        <span class="sidebar-header-options clearfix"></i></a><a  data-toggle="tooltip" title="LIHAT DATA LAPORAN"><i class="gi gi-notes_2"></i></a></span>
        <span class="sidebar-header-title">LAPORAN</span>
    </li>                               
    <li>
        <a href="admin_data_jurnal_umum.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Jurnal Umum<span></a>
    </li>
    <li>
        <a href="admin_data_jurnal_penyesuaian.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Jurnal Penyesuaian<span></a>
    </li>
    <li>
        <a href="admin_data_buku_besar.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Buku Besar<span></a>
    </li>
     <li>
        <a href="admin_data_neraca.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Neraca Lajur<span></a>
    </li>
    <li>
   <!--  <li>
        <a href="admin_data_neraca_saldo.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Neraca Saldo<span></a>
    </li> -->
    <li>
        <a href="admin_data_labarugi.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Laba Rugi<span></a>
    </li>
    <!-- <li>
        <a href="admin_data_laporan_perubahan_ekuitas.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Perubahan Ekuitas<span></a>
    </li> -->
    <li>
        <a href="admin_data_neraca.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Neraca Penjelasan<span></a>
    </li>
    <li>
        <a href="admin_data_neraca.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Neraca<span></a>
    </li>
    <li>
        <a href="admin_data_aruskas.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Arus Kas<span></a>
    </li>
    </li>
</ul>
</div>
</div>
</div>