<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Nampilin halaman login, ambil username dari query kalau ada
    public function login(Request $request)
    {
        $username = $request->query('username', '');
        return view('login', compact('username'));
    }

    // Proses submit login, validasi input, terus redirect ke dashboard bawa username
    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:4',
        ]);

        $username = $request->input('username');

        // Lempar ke dashboard sambil nyertain username lewat query param
        return redirect()->route('dashboard', ['username' => $username]);
    }

    // Nampilin dashboard, ambil username dari query (default ke 'Praktikan PWEB')
    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Praktikan PWEB');

        $stats = [
            'total_tasks'      => 12,
            'completed_tasks'  => 5,
            'in_progress_tasks'=> 4,
            'pending_tasks'    => 3,
        ];

        $recentTasks = [
            [
                'id' => 'TASK-101',
                'title' => 'Slicing Landing Page & Navbar UTS',
                'category' => 'Frontend',
                'deadline' => '12 Nov 2026',
                'status' => 'Selesai',
                'priority' => 'Tinggi',
            ],
            [
                'id' => 'TASK-102',
                'title' => 'Integrasi Controller & Route Model Binding',
                'category' => 'Backend',
                'deadline' => '14 Nov 2026',
                'status' => 'Dalam Proses',
                'priority' => 'Tinggi',
            ],
            [
                'id' => 'TASK-103',
                'title' => 'Pengujian Validasi Form Login & Parameter Request',
                'category' => 'Testing',
                'deadline' => '16 Nov 2026',
                'status' => 'Belum Dimulai',
                'priority' => 'Sedang',
            ],
        ];

        return view('dashboard', compact('username', 'stats', 'recentTasks'));
    }

    // Nampilin halaman pengelolaan tugas, data array dikirim ke view buat di-loop @foreach
    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Praktikan PWEB');

        // Data array dinamis buat di-loop pakai @foreach di view
        $tasks = [
            [
                'code'        => 'PRJ-001',
                'name'        => 'Pengembangan Layout Blade Responsive',
                'project'     => 'Portal Praktikum PWEB',
                'category'    => 'UI/UX & Frontend',
                'assignee'    => $username,
                'deadline'    => '11 Nov 2026',
                'priority'    => 'Tinggi',
                'status'      => 'Selesai',
                'progress'    => 100,
            ],
            [
                'code'        => 'PRJ-002',
                'name'        => 'Pembuatan Component Navbar & Footer',
                'project'     => 'Portal Praktikum PWEB',
                'category'    => 'Blade Component',
                'assignee'    => 'Adya Handika',
                'deadline'    => '13 Nov 2026',
                'priority'    => 'Tinggi',
                'status'      => 'Selesai',
                'progress'    => 100,
            ],
            [
                'code'        => 'PRJ-003',
                'name'        => 'Setup Data Flow Controller ke View',
                'project'     => 'Sistem Task Manager',
                'category'    => 'Laravel Controller',
                'assignee'    => $username,
                'deadline'    => '15 Nov 2026',
                'priority'    => 'Tinggi',
                'status'      => 'Dalam Proses',
                'progress'    => 65,
            ],
            [
                'code'        => 'PRJ-004',
                'name'        => 'Optimasi Templating @extends dan @yield',
                'project'     => 'Sistem Task Manager',
                'category'    => 'Blade Engine',
                'assignee'    => 'Budi Santoso',
                'deadline'    => '17 Nov 2026',
                'priority'    => 'Sedang',
                'status'      => 'Dalam Proses',
                'progress'    => 40,
            ],
            [
                'code'        => 'PRJ-005',
                'name'        => 'Penyusunan Dokumentasi API & Video Demo',
                'project'     => 'Media Pembelajaran UTS',
                'category'    => 'Dokumentasi',
                'assignee'    => $username,
                'deadline'    => '19 Nov 2026',
                'priority'    => 'Rendah',
                'status'      => 'Belum Dimulai',
                'progress'    => 0,
            ],
        ];

        return view('pengelolaan', compact('username', 'tasks'));
    }

    // Nampilin halaman profil, data dikirim dari controller (bukan hardcode di view)
    public function profile(Request $request)
    {
        $username = $request->query('username', 'Praktikan PWEB');

        $profileData = [
            'username'     => $username,
            'fullname'     => 'Mahasiswa Praktikum Pemrograman Batak',
            'nim'          => '252410103027',
            'class'        => 'Pemrograman Web - Kelas D',
            'email'        => strtolower(str_replace(' ', '', $username)) . '@mail.unej.ac.id',
            'role'         => 'Mahasiswa',
            'bio'          => 'Mahasiswa Fakultas Ilmu Furry UNIGA 2077.',
            'skills'       => ['Laravel 13', 'PHP Native', 'Blade Template Engine', 'Tailwind CSS', 'JavaScript DOM'],
            'total_project'=> 4,
            'completed'    => 18,
        ];

        return view('profile', compact('username', 'profileData'));
    }
}
