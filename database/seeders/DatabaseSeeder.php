<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin Account
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Developer',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Profile (Clean, professional placeholder)
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'user_id' => $admin->id,
                'full_name' => 'Developer Portfolio',
                'headline' => 'Full-Stack Developer & Software Architect',
                'bio_short' => 'Passionate in building scalable web applications with clean code, robust architecture, and modern UX design.',
                'about_me' => "Saya adalah Software Engineer dengan dedikasi pada pengembangan solusi digital berkualitas tinggi.\n\nFokus utama meliputi perancangan sistem modern menggunakan Laravel, arsitektur database relasional MySQL yang terstruktur, integrasi frontend responsif, serta penerapan standar keamanan dan performa aplikasi web yang handal.",
                'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'resume_url' => '#',
                'email' => 'contact@example.com',
                'phone' => '+62 812 3456 7890',
                'location' => 'Jakarta, Indonesia',
                'github_url' => 'https://github.com',
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
            ]
        );

        // 3. Skills categorized
        $skillData = [
            ['Frontend', 'Tailwind CSS'],
            ['Frontend', 'JavaScript (ES6+)'],
            ['Frontend', 'HTML5 & Semantic Markup'],
            ['Frontend', 'Blade Templates'],
            ['Backend', 'PHP 8+'],
            ['Backend', 'Laravel Framework'],
            ['Backend', 'RESTful API Design'],
            ['Backend', 'MVC Architecture'],
            ['Database', 'MySQL'],
            ['Database', 'Database Indexing & Optimization'],
            ['Database', 'Eloquent ORM'],
            ['Tools', 'Git & GitHub'],
            ['Tools', 'Vite & Composer'],
            ['Tools', 'Postman'],
            ['Other', 'Software Security & CSRF Protection'],
            ['Other', 'SEO & Web Accessibility'],
        ];

        $skills = [];
        foreach ($skillData as $idx => [$cat, $name]) {
            $skills[$name] = Skill::updateOrCreate(
                ['name' => $name],
                ['category' => $cat, 'order_index' => $idx]
            );
        }

        // 4. Experiences
        Experience::updateOrCreate(
            ['company' => 'Tech Solutions Inc.'],
            [
                'role' => 'Full-Stack Software Engineer',
                'location' => 'Jakarta, Indonesia',
                'type' => 'Full-time',
                'start_date' => '2023-01-01',
                'end_date' => null,
                'is_current' => true,
                'description' => 'Mengembangkan backend modular Laravel, merancang skema database performa tinggi, dan membangun antarmuka web modern dengan Tailwind CSS.',
                'order_index' => 1,
            ]
        );

        Experience::updateOrCreate(
            ['company' => 'Digital Creative Studio'],
            [
                'role' => 'Web Developer',
                'location' => 'Bandung, Indonesia',
                'type' => 'Full-time',
                'start_date' => '2021-06-01',
                'end_date' => '2022-12-31',
                'is_current' => false,
                'description' => 'Membangun aplikasi website interaktif, integrasi API pihak ketiga, dan implementasi automated tests untuk memastikan stabilitas kode.',
                'order_index' => 2,
            ]
        );

        // 5. Projects
        $p1 = Project::updateOrCreate(
            ['slug' => 'enterprise-resource-planner'],
            [
                'title' => 'Enterprise Resource Management Platform',
                'description' => 'Aplikasi web pengelolaan inventaris, reporting keuangan, dan role-based access control berskala besar.',
                'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
                'demo_url' => 'https://example.com/demo1',
                'github_url' => 'https://github.com/example/erp',
                'category' => 'Web App',
                'is_featured' => true,
                'order_index' => 1,
            ]
        );
        $p1->skills()->sync([
            $skills['Laravel Framework']->id,
            $skills['MySQL']->id,
            $skills['Tailwind CSS']->id,
        ]);

        $p2 = Project::updateOrCreate(
            ['slug' => 'modern-e-commerce-portal'],
            [
                'title' => 'Modern E-Commerce Portal',
                'description' => 'Sistem e-commerce dengan integrasi payment gateway, sistem cart real-time, dan manajemen pesanan komprehensif.',
                'thumbnail' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                'demo_url' => 'https://example.com/demo2',
                'github_url' => 'https://github.com/example/ecommerce',
                'category' => 'Web App',
                'is_featured' => true,
                'order_index' => 2,
            ]
        );
        $p2->skills()->sync([
            $skills['PHP 8+']->id,
            $skills['Laravel Framework']->id,
            $skills['RESTful API Design']->id,
        ]);

        $p3 = Project::updateOrCreate(
            ['slug' => 'analytics-dashboard-suite'],
            [
                'title' => 'Analytics & Insights Dashboard',
                'description' => 'Platform visualisasi data metrik bisnis, audit logs, dan pelaporan otomatis secara berkala.',
                'thumbnail' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=800&q=80',
                'demo_url' => 'https://example.com/demo3',
                'github_url' => 'https://github.com/example/analytics',
                'category' => 'Web App',
                'is_featured' => false,
                'order_index' => 3,
            ]
        );
        $p3->skills()->sync([
            $skills['Blade Templates']->id,
            $skills['Tailwind CSS']->id,
            $skills['JavaScript (ES6+)']->id,
        ]);
    }
}
