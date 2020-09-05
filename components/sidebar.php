<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li>
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
            </li>
            <?php if ($_SESSION['user']['status'] == "admin") { ?>
                <li>
                    <a href="?p=module/user/index">
                        <i class="fa fa-user-plus"></i> <span>User</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Data Sekolah</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?p=module/guru/index"><i class="fa fa-circle-o"></i>Data Guru</a></li>
                        <li><a href="?p=module/kelas/index"><i class="fa fa-circle-o"></i>Data Kelas</a></li>
                        <li><a href="?p=module/siswa/index"><i class="fa fa-circle-o"></i>Data Siswa</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Data Pelajaran</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?p=module/mataPelajaran/index"><i class="fa fa-circle-o"></i>Daftar Mata Pelajaran</a></li>
                        <li><a href="?p=module/mataPelajaran/setMapel"><i class="fa fa-circle-o"></i>Atur Guru Mata Pelajaran</a></li>
                        <li><a href="?p=module/jadwalPelajaran/index"><i class="fa fa-circle-o"></i>Atur Jadwal Pelajaran</a></li>
                    </ul>
                </li>
                <li>
                    <a href="?p=module/finger/cekAbsen">
                        <i class="fa fa-files-o"></i> <span>Data Finger</span>
                    </a>
                </li>
            <?php } else { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i>
                        <span>Absensi</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?p=module/jadwal/index"><i class="fa fa-circle-o"></i>Jadwal Mengajar</a></li>
                        <!-- <li><a href="?p=module/jadwal/absensi"><i class="fa fa-circle-o"></i>Proses Absensi</a></li> -->
                        <li><a href="?p=module/finger/cekAbsen"><i class="fa fa-circle-o"></i>Proses Absen</a></li>
                        <li><a href="?p=module/jadwal/absenFinger"><i class="fa fa-circle-o"></i>Lihat Absen</a></li>
                    </ul>
                </li>
            <?php } ?>
            <!-- <li>
                <a href="?p=module/jadwal/absenFinger">
                    <i class="fa fa-database"></i> <span>Absensi</span>
                </a>
            </li> -->
            <li>
                <a href="?p=module/rekap/print">
                    <i class="fa fa-database"></i> <span>Rekap Absensi</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>