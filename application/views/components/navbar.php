<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#navbar-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="beranda">InventoryApp</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li><a href="daftarasset">
                        <span class="glyphicon glyphicon-th-list"></span>
                        Daftar Asset <span class="sr-only"></span></a>
                    </li>

                    <li>
                        <a href="jadwalperawatan">
                        <span class="glyphicon glyphicon-tasks"></span>
                        Jadwal Perawatan <span class="sr-only"></span></a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown" role="button" >
                        <span class="glyphicon glyphicon-list-alt"></span>
                        Pengaduan & Perbaikan <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="daftarpengaduan">Daftar Pengaduan</a></li>
                            <li><a href="daftarperbaikan">Daftar Perbaikan</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown" role="button" >
                        <span class="glyphicon glyphicon-print"></span>
                        Laporan <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="laporan/daftarasset" target="_blank">Lap.DaftarAsset</a></li>
                            <li><a href="laporan/jenisdaftarasset" target="_blank">Lap.Jenis DaftarAsset</a></li>
                            <li><a href="laporan/perbaikan" target="_blank">Lap.Perbaikan</a></li>
                            <li><a href="laporan/perawatan" target="_blank">Lap.Perawatan</a></li>
                            <li><a href="laporan/pengaduan" target="_blank">Lap.Pengaduan</a></li>
                            <li><a href="laporan/user" target="_blank">Lap.User</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                            data-toggle="dropdown" role="button" >
                            <span class="glyphicon glyphicon-user"></span>
                            <?= $this->session->userdata("nama"); ?> <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li><a href="user">User</a></li>
                                <li><a href="user/gantipass">Rubah Password</a></li>
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>