<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MessageType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use App\Traits\HasFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Response;
use Throwable;

class CategoryController extends Controller
{
    use HasFile;

    public function index(): Response
    {
        $categories = Category::query()
            // ->select(['id', 'name', 'slug', 'cover', 'created_at'])
            // ->when(request()->search, function ($query, $value) {
            //     $query->whereAny([
            //         'name',
            //         'slug'
            //     ], 'REGEXP', $value);
            // })
            // ->when(request()->field && request()->direction, fn($query) => $query->orderBy(request()->field, request()->direction))
            // ->paginate(request()->load ?? 10)
            // ->filter(request()->only(['search']))
            // ->sorting(request()->only(['field', 'direction']))
            // ->withQueryString();
            ->select(['id', 'name', 'slug', 'cover', 'created_at'])
            ->filter(request()->only(['search']))
            ->sorting(request()->only(['field', 'direction']))
            ->paginate(request()->load ?? 10)
            ->withQueryString();

        return inertia('Admin/Categories/Index', [
            'categories' => CategoryResource::collection($categories)->additional([
                'meta' => [
                    'has_pages' => $categories->hasPages(),
                ],
            ]),
            'page_settings' => [
                'title' => 'Kategori',
                'subtitle' => 'Menampilkan semua data kategori yang tersedia pada platform ini',
            ],
            'state' => [
                'page' => request()->page ?? 1,
                'search' => request()->search ?? '',
                'load' => 10,
            ]
        ]);
    }

    public function create(): Response
    {
        return inertia('Admin/Categories/Create', [
            'page_settings' => [
                'title' => 'Tambah Kategori',
                'subtitle' => 'Buat Kategori baru di sini. Klik simpan setelah selesai',
                'method' => 'POST',
                'action' => route('admin.categories.store'),
            ],
        ]);
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        try {
            Category::create([
                'name' => $name = $request->name,
                'slug' => str()->lower(str()->slug($name) . str()->random(4)),
                'description' => $request->description,
                'cover' => $this->upload_file($request, 'cover', 'categories')
            ]);

            // Use session()->flash() to store success message
            session()->flash('message', MessageType::CREATED->message('Kategori'));
            session()->flash('message_type', 'success');  // Optionally, define the message type

            return to_route('admin.categories.index');
        } catch (Throwable $err) {
            // Use session()->flash() to store error message
            session()->flash('message', MessageType::ERROR->message('Gagal membuat kategori: ' . $err->getMessage()));
            session()->flash('message_type', 'error');

            return to_route('admin.categories.index');
        }
    }

    public function edit(Category $category): Response
    {
        return inertia('Admin/Categories/Edit', [
            'page_settings' => [
                'title' => 'Edit Kategori',
                'subtitle' => 'Edit Kategori disini. Klik simpan setelah selesain',
                'method' => 'PUT',
                'action' => route('admin.categories.update', $category)
            ],
            'category' => $category,
        ]);
    }

    public function update(Category $category, CategoryRequest $request): RedirectResponse
    {
        try {
            $category->update([
                'name' => $name = $request->name,
                'slug' => $name !== $category->name ? str()->lower(str()->slug($name) . str()->random(4)) : $category->slug,
                'description' => $request->description,
                'cover' => $this->update_file($request, $category, 'cover', 'categories')
            ]);

            session()->flash('message', MessageType::UPDATED->message('Kategori'));
            return to_route('admin.categories.index');
        } catch (Throwable $err) {
            session()->flash('message', MessageType::ERROR->message(error: $err->getMessage()), 'error');
            return to_route('admin.categories.index');
        }
    }

    public function destroy(Category $category): RedirectResponse
    {
        try {
            $this->delete_file($category, 'cover');

            $category->delete();
            session()->flash('message', MessageType::DELETED->message('Kategori'));
            return to_route('admin.categories.index');
        } catch (Throwable $err) {
            session()->flash('message', MessageType::ERROR->message(error: $err->getMessage()), 'error');
            return to_route('admin.categories.index');
        }
    }
}
