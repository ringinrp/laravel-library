import { cn } from '@/lib/utils'; // atau: import clsx from 'clsx';
import { Link, usePage } from '@inertiajs/react';

export default function NavLink({ href = '#', title, icon: Icon, exact = false, ...props }) {
    const { url: current } = usePage(); // URL saat ini
    // jika exact: match full URL, kalau tidak: match prefix
    const isActive = exact ? current === href : current.startsWith(href);

    return (
        <Link
            {...props}
            href={href}
            className={cn(
                isActive
                    ? 'bg-gradient-to-r from-orange-400 via-orange-600 to-orange-500 font-semibold text-white hover:text-white'
                    : 'text-muted-foreground hover:text-orange-500',
                'flex items-center gap-3 rounded-lg font-medium transition-all p-3',
            )}
        >
            {Icon && <Icon className="h-4 w-4" />}
            {title}
        </Link>
    );
}
