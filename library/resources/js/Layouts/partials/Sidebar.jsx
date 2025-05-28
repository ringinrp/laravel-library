import NavLink from '@/Components/NavLink';
import {
    IconAlertCircle,
    IconBooks,
    IconBuildingCommunity,
    IconCategory,
    IconChartDots2,
    IconCircleKey,
    IconCreditCardPay,
    IconCreditCardRefund,
    IconDashboard,
    IconKeyframe,
    IconLayoutKanban,
    IconLogout,
    IconMoneybag,
    IconRoute,
    IconSettingsExclamation,
    IconStack3,
    IconUser,
    IconUsersGroup,
    IconVersions,
} from '@tabler/icons-react';

export default function Sidebar({url, auth}) {
    return (
        <nav className="grid items-start px-2 text-sm font-semibold lg:px-4">
            <div className="px-3 py-2 text-sm font-semibold text-foreground">Dashboard</div>

            <NavLink href="/dashboard" active={url.startsWith('/dashboard')} title="Dashboard" icon={IconDashboard} />
            <div className="px-3 py-2 text-sm font-semibold text-foreground">Statistik</div>

            <NavLink href="#" title="Statistik Peminjaman" icon={IconChartDots2} />
            <NavLink href="#" title="Laporan Denda" icon={IconMoneybag} />
            <NavLink href="#" title="Laporan Stok Buku" icon={IconStack3} />

            <div className="px-3 py-2 text-sm font-semibold text-foreground">Master</div>
            <NavLink href="#" title="Kategori" icon={IconCategory} />
            <NavLink href="#" title="Penerbit" icon={IconBuildingCommunity} />
            <NavLink href="#" title="Buku" icon={IconBooks} />
            <NavLink href="#" title="Pengguna" icon={IconUsersGroup} />
            <NavLink href="#" title="Pengaturan Denda" icon={IconSettingsExclamation} />

            <div className="px-3 py-2 text-sm font-semibold text-foreground">Peran dan Izin</div>
            <NavLink href="#" title="Peran" icon={IconCircleKey} />
            <NavLink href="#" title="Izin" icon={IconVersions} />
            <NavLink href="#" title="Tetapkan Izin" icon={IconKeyframe} />
            <NavLink href="#" title="Tetapkan Peran" icon={IconLayoutKanban} />
            <NavLink href="#" title="Akses Rute" icon={IconRoute} />

            <div className="px-3 py-2 text-sm font-semibold text-foreground">Transaksi</div>
            <NavLink href="#" title="Peminjaman" icon={IconCreditCardPay} />
            <NavLink href="#" title="Pengembalian" icon={IconCreditCardRefund} />
s
            <div className="px-3 py-2 text-sm font-semibold text-foreground">Lainnya</div>
            <NavLink href="#" title="Pengumuman" icon={IconAlertCircle} />
            <NavLink href={route('profile.edit')} title="Profile" icon={IconUser} />
            <NavLink href={route('logout')} title="Logout" icon={IconLogout} method='post' as='button' className="w-full" />
        </nav>
    );
}
