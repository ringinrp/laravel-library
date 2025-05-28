import ApplicationLogo from '@/Components/ApplicationLogo';
import NavLinkResponsive from '@/Components/NavLinkResponsive';
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

export default function SidebarResponsive({url,auth}) {
    return (
        <nav className="grid gap-6 text-lg font-medium">
            <ApplicationLogo />

            <nav className="grid items-start text-sm font-semibold lg:px-4">
                <div className="px-3 py-2 text-sm font-semibold text-foreground">Dashboard</div>

                <NavLinkResponsive href="/dashboard" active={url.startsWith('/dashboard')} title="Dashboard" icon={IconDashboard} />
                <div className="px-3 py-2 text-sm font-semibold text-foreground">Statistik</div>

                <NavLinkResponsive href="#" title="Statistik Peminjaman" icon={IconChartDots2} />
                <NavLinkResponsive href="#" title="Laporan Denda" icon={IconMoneybag} />
                <NavLinkResponsive href="#" title="Laporan Stok Buku" icon={IconStack3} />

                <div className="px-3 py-2 text-sm font-semibold text-foreground">Master</div>
                <NavLinkResponsive href="#" title="Kategori" icon={IconCategory} />
                <NavLinkResponsive href="#" title="Penerbit" icon={IconBuildingCommunity} />
                <NavLinkResponsive href="#" title="Buku" icon={IconBooks} />
                <NavLinkResponsive href="#" title="Pengguna" icon={IconUsersGroup} />
                <NavLinkResponsive href="#" title="Pengaturan Denda" icon={IconSettingsExclamation} />

                <div className="px-3 py-2 text-sm font-semibold text-foreground">Peran dan Izin</div>
                <NavLinkResponsive href="#" title="Peran" icon={IconCircleKey} />
                <NavLinkResponsive href="#" title="Izin" icon={IconVersions} />
                <NavLinkResponsive href="#" title="Tetapkan Izin" icon={IconKeyframe} />
                <NavLinkResponsive href="#" title="Tetapkan Peran" icon={IconLayoutKanban} />
                <NavLinkResponsive href="#" title="Akses Rute" icon={IconRoute} />

                <div className="px-3 py-2 text-sm font-semibold text-foreground">Transaksi</div>
                <NavLinkResponsive href="#" title="Peminjaman" icon={IconCreditCardPay} />
                <NavLinkResponsive href="#" title="Pengembalian" icon={IconCreditCardRefund} />

                <div className="px-3 py-2 text-sm font-semibold text-foreground">Lainnya</div>
                <NavLinkResponsive href="#" title="Pengumuman" icon={IconAlertCircle} />
                <NavLinkResponsive href={route('profile.edit')} title="Profile" icon={IconUser} />
                <NavLinkResponsive href={route('logout')} title="Logout" icon={IconLogout} method='post' as='button' className="w-full" />
            </nav>
        </nav>
    );
}
