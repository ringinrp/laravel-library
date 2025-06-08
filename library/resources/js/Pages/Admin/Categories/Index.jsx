import React from 'react';
import AppLayout from '@/Layouts/AppLayout';  // Adjust the path as needed
import HeaderTitle from '@/Components/HeaderTitle';
import { IconCategory, IconPencil, IconPlus, IconTrash } from '@tabler/icons-react';
import { Button } from '@/Components/ui/button';
import { Link } from '@inertiajs/react';
import { Card, CardContent } from '@/Components/ui/card';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/Components/ui/table';
import { Avatar, AvatarFallback, AvatarImage } from '@/Components/ui/avatar';
import { AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle, AlertDialogTrigger } from '@/Components/ui/alert-dialog';


export default function Index(props){
    return (
        <div className="flex flex-col w-full pb-32">
            <div className='flex flex-col items-center justify-between mb-8 gap-y-4 lg:flex-row lg:items-center'>
            <HeaderTitle 
                title={props.page_settings.title}
                subtitle={props.page_settings.subtitle}
                icon={IconCategory}
            />
            <Button
                variant="orange"
                size="lg"
                asChild
             >
                <Link href={route('admin.categories.create')}>
                    <IconPlus className='size-4' /> Tambah
                </Link>
             </Button>
            </div>

            <Card className="px-0 py-0 [&-td]:whitespace-nowrap [&_td]:px-6 [&_th]:px-6">
                <CardContent>
                    <Table className="w-full">
                        <TableHeader>
                            <TableRow>
                                <TableHead>#</TableHead>
                                <TableHead>Nama</TableHead>
                                <TableHead>Slug</TableHead>
                                <TableHead>Cover</TableHead>
                                <TableHead>Dibuat pada</TableHead>
                                <TableHead>Aksi</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {props.categories.map((category, index) => (
                                <TableRow key={index}>
                                    <TableCell>{index + 1}</TableCell>
                                    <TableCell>{category.name}</TableCell>
                                    <TableCell>{category.slug}</TableCell>
                                    <TableCell>
                                        <Avatar>
                                            <AvatarImage src={category.avatar} />
                                            <AvatarFallback>{category.name.substring(0,1)}</AvatarFallback>
                                        </Avatar>
                                    </TableCell>
                                    <TableCell>{category.created_at}</TableCell>
                                    <TableCell>
                                        <div className='flex items-center gap-x-1'>
                                            <Button variant="blue" size="sm" asChild>
                                                <Link href={route('admin.categories.edit', [category.id])}>
                                                    <IconPencil className='size-4'/>
                                                </Link>
                                            </Button>
                                            <AlertDialog>
                                                <AlertDialogTrigger asChild>
                                                    <Button variant="red" size="sm">
                                                        <IconTrash className='size-4' />
                                                    </Button>
                                                </AlertDialogTrigger>
                                                <AlertDialogContent>
                                                    <AlertDialogHeader>
                                                        <AlertDialogTitle>
                                                            Apakah anda yakin ingin menghapus kategori ini?
                                                        </AlertDialogTitle>
                                                        <AlertDialogDescription>
                                                            Penghapusan ini akan menghapus kategori secara permanen dari Server/Database. Tidak dapat dibatalkan.
                                                        </AlertDialogDescription>
                                                    </AlertDialogHeader>
                                                    <AlertDialogFooter>
                                                        <AlertDialogCancel>Cancel</AlertDialogCancel>
                                                        <AlertDialogAction onClick={()=>console.log('Hapus Kategori')}>
                                                            Continue
                                                        </AlertDialogAction>
                                                    </AlertDialogFooter>
                                                </AlertDialogContent>
                                            </AlertDialog>
                                        </div>
                                    </TableCell>
                                </TableRow>
                            ))}
                        </TableBody>
                    </Table>
                </CardContent>
            </Card>
        </div>
    );
}

Index.layout = (page) => <AppLayout children={page} title={page.props.page_settings.title} />
