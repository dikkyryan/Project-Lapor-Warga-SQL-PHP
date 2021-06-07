<?php
if(!isset($_SESSION['level'])) {
?>
            <ul class="nav">
                <li class="">
                    <a href="index.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="menu-bottom">
                    <a href="login.php">
                        <i class="pe-7s-power"></i>
                        <p>Login</p>
                    </a>
                </li>
            </ul>
<?php
}elseif($_SESSION['level'] == "user") {
?>
            <ul class="nav">
                <li class="">
                    <a href="index.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="">
                    <a href="lapor.php">
                        <i class="pe-7s-note"></i>
                        <p>Lapor</p>
                    </a>
                </li>

                <li class="">
                    <a href="loglaporan.php">
                        <i class="pe-7s-note2"></i>
                        <p>Log Laporan</p>
                    </a>
                </li>

                <li class="">
                    <a href="pengumuman.php">
                        <i class="pe-7s-bell"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                <li class="acc-bottom">
                    <a><i class="pe-7s-user"></i>
                        <p><?php echo $_SESSION['nama_user'] ?></p>
                    </a>
                </li>
                <li class="menu-bottom">
                    <a href="logout.php">
                        <i class="pe-7s-power"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
<?php
}elseif($_SESSION['level'] == "admin1") {
?>
            <ul class="nav">
                <li class="">
                    <a href="index.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="">
                    <a href="admin/laporan.php">
                        <i class="pe-7s-note2"></i>
                        <p>Laporan Masuk</p>
                    </a>
                </li>

                <li class="">
                    <a href="admin/laporanvalid.php">
                        <i class="pe-7s-next-2"></i>
                        <p>Laporan Valid</p>
                    </a>
                </li>

                <li class="">
                    <a href="pengumuman.php">
                        <i class="pe-7s-bell"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                <li class="">
                    <a href="admin/kirimpengumuman.php">
                        <i class="pe-7s-speaker"></i>
                        <p>Kirim Pengumuman</p>
                    </a>
                </li>

                <li class="acc-bottom">
                    <a><i class="pe-7s-user"></i>
                        <p><?php echo $_SESSION['nama_admin'] ?></p>
                    </a>
                </li>
                <li class="menu-bottom">
                    <a href="logout.php">
                        <i class="pe-7s-power"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
<?php
}elseif($_SESSION['level'] == "admin2") {
?>
            <ul class="nav">
                <li class="">
                    <a href="index.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="">
                    <a href="admin/periksalaporan.php">
                        <i class="pe-7s-note2"></i>
                        <p>Periksa Laporan</p>
                    </a>
                </li>

                <li class="">
                    <a href="pengumuman.php">
                        <i class="pe-7s-bell"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                <li class="">
                    <a href="admin/kirimpengumuman.php">
                        <i class="pe-7s-speaker"></i>
                        <p>Kirim Pengumuman</p>
                    </a>
                </li>

                <li class="acc-bottom">
                    <a><i class="pe-7s-user"></i>
                        <p><?php echo $_SESSION['nama_admin'] ?></p>
                    </a>
                </li>
                <li class="menu-bottom">
                    <a href="logout.php">
                        <i class="pe-7s-power"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
<?php
}elseif($_SESSION['level'] == "admin3") {
?>
            <ul class="nav">
                <li class="">
                    <a href="index.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="">
                    <a href="pengumuman.php">
                        <i class="pe-7s-bell"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                <li class="">
                    <a href="admin/kirimpengumuman.php">
                        <i class="pe-7s-speaker"></i>
                        <p>Kirim Pengumuman</p>
                    </a>
                </li>

                <li class="acc-bottom">
                    <a><i class="pe-7s-user"></i>
                        <p><?php echo $_SESSION['nama_admin'] ?></p>
                    </a>
                </li>
                <li class="menu-bottom">
                    <a href="logout.php">
                        <i class="pe-7s-power"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
<?php
}
?>