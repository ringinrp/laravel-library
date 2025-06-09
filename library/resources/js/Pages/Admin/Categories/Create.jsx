import React from 'react';
import AppLayout from '@/Layouts/AppLayout';
import HeaderTitle from '@/Components/HeaderTitle';
import { Button } from '@/Components/ui/button';
import { Link } from '@inertiajs/react';
import { IconArrowLeft, IconCategory } from '@tabler/icons-react';

export default function Create(props) {
        return (
            <div className='flex flex-col w-full pb-32'>
                <div className='flex flex-col items-start mb-8 justify-between gap-y-4 lg:flex-row lg:items-center'>
                    <HeaderTitle title={props.page_settings.title} subtitle={props.page_settings.subtitle} icon={IconCategory} />
                    <Button variant="orange" size="lg" asChild>
                        <Link href={route('admin.categories.index')}><IconArrowLeft className='size-4' />Kembali</Link>
                    </Button>
                </div>
            </div>
        )
}

Create.layout = (page) => <AppLayout children={page} title={page.props.page_settings.title} />;
