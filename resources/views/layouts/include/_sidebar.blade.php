<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">E-PERPUSTAKAAN</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role=='admin')
            <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/dashboard"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
            <li class="nav-item dropdown {{ (request()->is('admin/user','admin/buku')) ? 'active' : '' }}">
                <a href="/admin/keloladata" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Kelola Data</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('admin/user')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/user">Data User</a></li>
                    <li class="{{ (request()->is('admin/buku')) ? 'active' : '' }}"><a class="nav-link" href="/admin/buku">Data Buku</a></li>
                </ul>
            </li>

            <li class="{{ (request()->is('admin/transaksi')) ? 'active' : '' }}" ><a class="nav-link" href="/admin/transaksi"><i class="far fa-square"></i> <span>Kelola Peminjaman</span></a></li>
            {{-- <li class="{{ (request()->is('admin/kategori')) ? 'active' : '' }}" ><a class="nav-link" href="/admin/kategori"><i class="far fa-square"></i> <span>Kategori</span></a></li> --}}
            <li class="nav-item dropdown {{ (request()->is('admin/peminjaman','admin/pengembalian')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('admin/laporananggota')) ? 'active' : '' }}" ><a class="nav-link" href="/admin/laporananggota">Laporan Anggota</a></li>
                    <li class="{{ (request()->is('admin/laporanbuku')) ? 'active' : '' }}"><a class="nav-link" href="/admin/laporanbuku">Laporan Buku</a></li>
                    <li class="{{ (request()->is('admin/laporantransaksi')) ? 'active' : '' }}"><a class="nav-link" href="/admin/laporantransaksi">Laporan Kelola Peminjaman</a></li>
                </ul>
            </li>
            @elseif (auth()->user()->role=='kaperpus')
            <li class="{{ (request()->is('kaperpus/dashboard')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/dashboard"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
            <li class="{{ (request()->is('kaperpus/buku')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/buku"><i class="far fa-square"></i> <span>Data Buku</span></a></li>
            

            <li class="{{ (request()->is('kaperpus/transaksi')) ? 'active' : '' }}" ><a class="nav-link" href="/kaperpus/transaksi"><i class="far fa-square"></i> <span>Kelola Peminjaman</span></a></li>
            {{-- <li class="{{ (request()->is('kaperpus/kategori')) ? 'active' : '' }}" ><a class="nav-link" href="/kaperpus/kategori"><i class="far fa-square"></i> <span>Kategori</span></a></li> --}}
            <li class="nav-item dropdown {{ (request()->is('kaperpus/peminjaman','kaperpus/pengembalian')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    {{--  <li class="{{ (request()->is('kaperpus/laporananggota')) ? 'active' : '' }}" ><a class="nav-link" href="/kaperpus/laporananggota">Laporan Anggota</a></li>  --}}
                    <li class="{{ (request()->is('kaperpus/laporanbuku')) ? 'active' : '' }}"><a class="nav-link" href="/kaperpus/laporanbuku">Laporan Buku</a></li>
                    <li class="{{ (request()->is('kaperpus/laporantransaksi')) ? 'active' : '' }}"><a class="nav-link" href="/kaperpus/laporantransaksi">Laporan Kelola Peminjaman</a></li>
                </ul>
            </li>

            @elseif (auth()->user()->role=='siswa'||auth()->user()->role=='guru')
            <li class="{{ (request()->is('user/dashboard')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/dashboard"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
            <li class="{{ (request()->is('user/buku')) ? 'active' : '' }}"><a class="nav-link" href="/{{ auth()->user()->role }}/buku"><i class="far fa-square"></i> <span>Data Buku</span></a></li>

            <li class="{{ (request()->is('user/transaksi')) ? 'active' : '' }}" ><a class="nav-link" href="/{{ auth()->user()->role }}/transaksi"><i class="far fa-square"></i> <span>Kelola Peminjaman</span></a></li>

            {{-- <li class="nav-item dropdown {{ (request()->is('user/peminjaman','user/pengembalian')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('user/laporananggota')) ? 'active' : '' }}" ><a class="nav-link" href="/user/laporananggota">Laporan Anggota</a></li>
                    <li class="{{ (request()->is('user/laporanbuku')) ? 'active' : '' }}"><a class="nav-link" href="/user/laporanbuku">Laporan Buku</a></li>
                    <li class="{{ (request()->is('user/laporantransaksi')) ? 'active' : '' }}"><a class="nav-link" href="/user/laporantransaksi">Laporan Transaksi</a></li>
                </ul>
            </li> --}}
            @endif
        </ul>
    </aside>
</div>
