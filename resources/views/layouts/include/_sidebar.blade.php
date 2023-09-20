<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">E-PERPUSTAKAAN</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role=='admin')
            <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ (request()->is('admin/user','admin/buku')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-folder"></i><span>Kelola Data</span></a>

                <ul class="dropdown-menu">
                    {{--  <li class="{{ (request()->is('admin/admin')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/admin">Data Admin</a></li>  --}}
                    {{--  <li class="{{ (request()->is('admin/kaperpus')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/kaperpus">Data Kepala Perpustakaan </a></li>
                    <li class="{{ (request()->is('admin/guru')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/guru">Data Guru</a></li>
                    <li class="{{ (request()->is('admin/siswa')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/siswa">Data Siswa</a></li>  --}}
                    <li class="{{ (request()->is('admin/user')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/user">Data User</a></li>
                    {{-- <li class="{{ (request()->is('admin/anggota')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/anggota">Data Anggota</a></li> --}}
                    <li class="{{ (request()->is('admin/buku')) ? 'active' : '' }}"><a class="nav-link" href="/admin/buku">Data Buku</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ (request()->is('admin/siswa','admin/guru')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-folder"></i><span>Kelola Anggota</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('admin/siswa')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/siswa">Data Siswa</a></li>
                    <li class="{{ (request()->is('admin/guru')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/guru">Data Guru</a></li>
                </ul>
            </li>

            <li class="{{ (request()->is('admin/transaksi')) ? 'active' : '' }}"><a class="nav-link" href="/admin/transaksi"><i class="fa fa-heart"></i> <span>Kelola Peminjaman</span></a></li>




            {{-- <li class="{{ (request()->is('admin/kategori')) ? 'active' : '' }}" ><a class="nav-link" href="/admin/kategori"><i class="far fa-square"></i> <span>Kategori</span></a></li> --}}
            <li class="nav-item dropdown {{ (request()->is('admin/peminjaman','admin/pengembalian')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-print"></i><span>Laporan</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('admin/laporananggota')) ? 'active' : '' }}" ><a class="nav-link" href="/admin/laporananggota">Laporan Anggota</a></li>
                    <li class="{{ (request()->is('admin/laporanpendaftaran')) ? 'active' : '' }}"><a class="nav-link" href="/admin/laporanpendaftaran">Laporan Pendaftaran</a></li>
                    <li class="{{ (request()->is('admin/laporantransaksi')) ? 'active' : '' }}"><a class="nav-link" href="/admin/laporantransaksi">Laporan Peminjaman</a></li>
                    <li class="{{ (request()->is('admin/laporandenda')) ? 'active' : '' }}"><a class="nav-link" href="/admin/laporandenda">Laporan Denda</a></li>
                    <li class="{{ (request()->is('admin/laporanbuku')) ? 'active' : '' }}"><a class="nav-link" href="/admin/laporanbuku">Laporan Buku</a></li>
                </ul>
            </li>
            @elseif (auth()->user()->role=='kaperpus')
            <li class="{{ (request()->is('kaperpus/dashboard')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ (request()->is('kaperpus/buku')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/buku"><i class="fa fa-folder"></i> <span>Data Buku</span></a></li>



            <li class="{{ (request()->is('kaperpus/anggota')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/anggota"><i class="fa fa-folder"></i> <span>Kelola Anggota</span></a></li>


            <li class="{{ (request()->is('kaperpus/transaksi')) ? 'active' : '' }}"><a class="nav-link" href="/kaperpus/transaksi"><i class="fa fa-heart"></i> <span>Kelola Peminjaman</span></a></li>



            {{-- <li class="{{ (request()->is('kaperpus/kategori')) ? 'active' : '' }}" ><a class="nav-link" href="/kaperpus/kategori"><i class="far fa-square"></i> <span>Kategori</span></a></li> --}}
            <li class="nav-item dropdown {{ (request()->is('kaperpus/peminjaman','kaperpus/pengembalian')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-print"></i><span>Laporan</span></a>

                <ul class="dropdown-menu">
                    {{--  <li class="{{ (request()->is('kaperpus/laporananggota')) ? 'active' : '' }}" ><a class="nav-link" href="/kaperpus/laporananggota">Laporan Anggota</a></li>  --}}
                    <li class="{{ (request()->is('kaperpus/laporanbuku')) ? 'active' : '' }}"><a class="nav-link" href="/kaperpus/laporanbuku">Laporan Buku</a></li>
                    <li class="{{ (request()->is('kaperpus/laporantransaksi')) ? 'active' : '' }}"><a class="nav-link" href="/kaperpus/laporantransaksi">Laporan Peminjaman</a></li>
                </ul>
            </li>

            @elseif (auth()->user()->role=='siswa')
            <li class="{{ (request()->is('user/dashboard')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="{{ (request()->is('user/buku')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/buku"><i class="fa fa-folder"></i> <span>Data Buku</span></a></li>
            <li class="{{ (request()->is('user/transaksi')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/transaksi"><i class="fa fa-heart"></i> <span>Lihat Peminjaman</span></a></li>
            @elseif (auth()->user()->role=='guru')
            <li class="{{ (request()->is('user/dashboard')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="{{ (request()->is('user/buku')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/buku"><i class="fa fa-folder"></i> <span>Data Buku</span></a></li>
            <li class="{{ (request()->is('user/transaksi')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/transaksi"><i class="fa fa-heart"></i> <span>Kelola Peminjaman</span></a></li>
            @endif
        </ul>
    </aside>
</div>
