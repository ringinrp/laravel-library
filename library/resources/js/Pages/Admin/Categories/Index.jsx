import React from 'react';
import AppLayout from '@/Layouts/AppLayout';  // Adjust the path as needed


export default function Index(props){
    return (
        <div className="flex flex-col w-full pb-32">
            Halaman Kategori
        </div>
    );
}

Index.layout = (page) => <AppLayout children={page} title={page.props.page_settings.title} />
