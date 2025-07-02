<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Response;

class AnnouncementController extends Controller
{
    public function index(): Response
    {
        $announcements = Announcement::query()
            ->select(['id', 'message', 'is_active', 'url', 'created_at'])
            ->paginate(10)
            ->withQueryString();

        return inertia('Admin/Annoucment/Index', [
            'page_settings' => [
                'title' => 'Pengumuman',
                'subtitle' => 'Menampilkan semua data pengumuman yang tersedia pada platform ini.'
            ],
            'announcements' => Announcement::collection($announcements)->additional([
                'meta' => [
                    'has_pages' => $announcements->hasPages(),
                ]
            ]),
        ]);
    }
}
