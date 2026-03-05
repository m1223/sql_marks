<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduDB | Pro Academic Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #4f46e5; --sidebar: #0f172a; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f1f5f9; scroll-behavior: smooth; }

        /* Sidebar Styling */
        .sidebar-item { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border-left: 4px solid transparent; }
        .sidebar-item:hover { background: #f8fafc; border-left-color: var(--primary); color: var(--primary); transform: translateX(5px); }
        .sidebar-item.active { background: #eef2ff; border-left-color: var(--primary); color: var(--primary); font-weight: 700; }

        /* Card Styling */
        .table-card {
            background: white;
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
            transition: all 0.3s ease;
        }
        .table-card:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05); border-color: #cbd5e1; }

        /* SQL Editor Style */
        .sql-pre {
            background: #1e293b !important;
            color: #94a3b8 !important;
            border-radius: 16px;
            border: 1px solid #334155;
            position: relative;
        }
        .sql-pre code { color: #e2e8f0; }
        .sql-keyword { color: #818cf8; font-weight: bold; }

        /* Badge Enhancements */
        .badge-pk { background: #fef3c7; color: #92400e; padding: 4px 10px; border-radius: 8px; font-size: 11px; font-weight: 800; border: 1px solid #fde68a; }
        .badge-fk { background: #e0e7ff; color: #3730a3; padding: 4px 10px; border-radius: 8px; font-size: 11px; font-weight: 800; border: 1px solid #c7d2fe; }

        /* Layout Fixes */
        .main-gradient { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="flex main-gradient">

<aside class="w-80 bg-white h-screen sticky top-0 border-r border-slate-200 hidden lg:flex flex-col shadow-xl z-50">
    <div class="p-8">
        <div class="flex items-center gap-4">
            <div class="bg-indigo-600 w-12 h-12 rounded-2xl text-white shadow-lg shadow-indigo-200 flex items-center justify-center">
                <i class="fas fa-database text-xl"></i>
            </div>
            <div>
                <span class="text-xl font-extrabold text-slate-800 tracking-tight">EduDB <span class="text-indigo-600">Pro</span></span>
                <span class="text-slate-400 text-[10px] block font-bold uppercase tracking-tighter">Database Architect v2.0</span>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-4 space-y-1 overflow-y-auto">
        <p class="px-4 text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em] mb-4">Core Schema</p>
        <a href="#sessions" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
            <i class="fas fa-calendar-check w-5 text-indigo-500"></i> Sessions
        </a>
        <a href="#classes" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
            <i class="fas fa-layer-group w-5 text-purple-500"></i> Classes
        </a>
        <a href="#sections" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
            <i class="fas fa-grip-vertical w-5 text-amber-500"></i> Sections
        </a>
        <a href="#subjects" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
            <i class="fas fa-book-open w-5 text-emerald-500"></i> Subjects
        </a>
        <a href="#students" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
            <i class="fas fa-user-graduate w-5 text-blue-500"></i> Students
        </a>
        <a href="#exams" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
            <i class="fas fa-file-invoice w-5 text-rose-500"></i> Exams
        </a>
        <a href="#marks" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
            <i class="fas fa-trophy w-5 text-yellow-500"></i> Marks
        </a>

        <div class="pt-8 pb-4">
            <p class="px-4 text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.2em] mb-4">Development</p>

            <a href="#sql-init" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
                <i class="fas fa-code w-5"></i> Setup Scripts
            </a>
            <a href="#data-seeding" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-slate-500 font-semibold">
                <i class="fas fa-file-import w-5 text-blue-500"></i> Insert Queries
            </a>
            <a href="#sql-queries" class="sidebar-item flex items-center gap-3 px-4 py-3.5 rounded-xl text-orange-600 font-bold bg-orange-50/50">
                <i class="fas fa-bolt w-5"></i> Analytics Queries
            </a>
        </div>
    </nav>

    <div class="p-6 border-t border-slate-100 bg-slate-50">
        <div class="flex items-center gap-3">
            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
            <span class="text-xs font-bold text-slate-600 uppercase">System Ready</span>
        </div>
    </div>
</aside>

<main class="flex-1 p-8 lg:p-16">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
        <div>
            <div class="inline-flex items-center gap-2 bg-indigo-50 text-indigo-700 px-3 py-1 rounded-lg text-xs font-bold mb-4 border border-indigo-100 uppercase tracking-widest">
                <i class="fas fa-shield-alt"></i> Production Schema
            </div>
            <h1 class="text-5xl font-extrabold text-slate-900 tracking-tight mb-2">Academic Database</h1>
            <p class="text-slate-500 text-lg max-w-2xl font-medium">Modern relational architecture designed for scale, high-performance reporting, and seamless PHP/Laravel integration.</p>
        </div>
        <div class="flex gap-3 h-fit">
            <div class="px-5 py-3 bg-white rounded-2xl shadow-sm border border-slate-200 text-center">
                <span class="block text-[10px] font-black text-slate-400 uppercase">Engine</span>
                <span class="text-sm font-bold text-slate-800 italic">InnoDB</span>
            </div>
            <div class="px-5 py-3 bg-white rounded-2xl shadow-sm border border-slate-200 text-center">
                <span class="block text-[10px] font-black text-slate-400 uppercase">Tables</span>
                <span class="text-sm font-bold text-slate-800">07 Total</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div id="sessions" class="table-card p-8">
            <div class="flex items-center justify-between mb-6">
                <div class="bg-blue-600/10 p-3 rounded-2xl text-blue-600"><i class="fas fa-clock text-xl"></i></div>
                <span class="text-[10px] font-bold text-slate-300 uppercase">ID: 01</span>
            </div>
            <h2 class="text-xl font-bold text-slate-800 mb-6">1. Sessions</h2>
            <table class="w-full">
                <tr class="border-b border-slate-50"><th class="py-3 text-left text-[10px] text-slate-400 uppercase font-black tracking-widest">Field</th><th class="py-3 text-right text-[10px] text-slate-400 uppercase font-black tracking-widest">Type</th></tr>
                <tr><td class="py-3 font-bold text-slate-700">id</td><td class="py-3 text-right"><span class="badge-pk">INT PK</span></td></tr>
                <tr><td class="py-3 font-medium text-slate-600">name</td><td class="py-3 text-right text-slate-400 font-mono">VARCHAR(50)</td></tr>
                <tr><td class="py-3 font-medium text-slate-600">status</td><td class="py-3 text-right text-slate-400 font-mono">ENUM</td></tr>
            </table>
        </div>

        <div id="classes" class="table-card p-8">
            <div class="flex items-center justify-between mb-6">
                <div class="bg-purple-600/10 p-3 rounded-2xl text-purple-600"><i class="fas fa-layer-group text-xl"></i></div>
                <span class="text-[10px] font-bold text-slate-300 uppercase">ID: 02</span>
            </div>
            <h2 class="text-xl font-bold text-slate-800 mb-6">2. Classes</h2>
            <table class="w-full">
                <tr class="border-b border-slate-50"><th class="py-3 text-left text-[10px] text-slate-400 uppercase font-black tracking-widest">Field</th><th class="py-3 text-right text-[10px] text-slate-400 uppercase font-black tracking-widest">Type</th></tr>
                <tr><td class="py-3 font-bold text-slate-700">id</td><td class="py-3 text-right"><span class="badge-pk">INT PK</span></td></tr>
                <tr><td class="py-3 font-medium text-slate-600">name</td><td class="py-3 text-right text-slate-400 font-mono">VARCHAR(50)</td></tr>
            </table>
        </div>

        <div id="sections" class="table-card p-8">
            <div class="flex items-center justify-between mb-6">
                <div class="bg-amber-600/10 p-3 rounded-2xl text-amber-600"><i class="fas fa-columns text-xl"></i></div>
                <span class="text-[10px] font-bold text-slate-300 uppercase">ID: 03</span>
            </div>
            <h2 class="text-xl font-bold text-slate-800 mb-6">3. Sections</h2>
            <table class="w-full text-sm">
                <tr class="border-b border-slate-50"><th class="py-3 text-left text-[10px] text-slate-400 uppercase font-black tracking-widest">Field</th><th class="py-3 text-right text-[10px] text-slate-400 uppercase font-black tracking-widest">Type</th></tr>
                <tr><td class="py-3 font-bold text-slate-700">id</td><td class="py-3 text-right"><span class="badge-pk">INT PK</span></td></tr>
                <tr><td class="py-3 font-medium text-slate-600">class_id</td><td class="py-3 text-right"><span class="badge-fk">INT FK</span></td></tr>
                <tr><td class="py-3 font-medium text-slate-600">name</td><td class="py-3 text-right text-slate-400 font-mono">VARCHAR(20)</td></tr>
            </table>
        </div>
    </div>

    <div id="subjects" class="table-card p-8 mb-12">
        <div class="flex items-center gap-4 mb-8">
            <div class="bg-emerald-100 p-4 rounded-2xl text-emerald-600"><i class="fas fa-book-open text-2xl"></i></div>
            <div>
                <h3 class="text-2xl font-bold text-slate-800">5. Subjects Master</h3>
                <p class="text-sm text-slate-400">Class-based subject registration</p>
            </div>
        </div>
        <table class="w-full">
            <thead>
            <tr class="bg-slate-50">
                <th class="px-6 py-4 text-left text-[11px] text-slate-400 uppercase font-black tracking-widest rounded-l-xl">Field Name</th>
                <th class="px-6 py-4 text-left text-[11px] text-slate-400 uppercase font-black tracking-widest">Data Type</th>
                <th class="px-6 py-4 text-right text-[11px] text-slate-400 uppercase font-black tracking-widest rounded-r-xl">Constraint</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
            <tr><td class="px-6 py-4 font-bold text-slate-700">id</td><td class="px-6 py-4 font-mono text-slate-400">INT(11)</td><td class="px-6 py-4 text-right"><span class="badge-pk">PRIMARY KEY</span></td></tr>
            <tr><td class="px-6 py-4 font-bold text-slate-700">class_id</td><td class="px-6 py-4 font-mono text-slate-400">INT(11)</td><td class="px-6 py-4 text-right"><span class="badge-fk">FOREIGN KEY</span></td></tr>
            <tr><td class="px-6 py-4 font-bold text-slate-700">name</td><td class="px-6 py-4 font-mono text-slate-400">VARCHAR(50)</td><td class="px-6 py-4 text-right text-slate-300">—</td></tr>
            </tbody>
        </table>
    </div>

    <div id="students" class="table-card overflow-hidden mb-12 border-t-[6px] border-t-indigo-600">
        <div class="p-10 border-b border-slate-100 flex justify-between items-center bg-white">
            <div class="flex items-center gap-5">
                <div class="bg-indigo-600 w-16 h-16 rounded-3xl text-white shadow-xl shadow-indigo-100 flex items-center justify-center">
                    <i class="fas fa-user-graduate text-3xl"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">4. Student Records</h2>
                    <p class="text-slate-400 font-medium">Core entity with multi-table relationships</p>
                </div>
            </div>
            <div class="hidden md:block">
                <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-xs font-black uppercase tracking-widest border border-indigo-100">Primary Hub</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50/80">
                <tr class="text-left">
                    <th class="px-10 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest">Column Name</th>
                    <th class="px-10 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest">Data Type</th>
                    <th class="px-10 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest text-right">Reference / Key</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50 transition-colors"><td class="px-10 py-5 font-bold text-slate-800">id</td><td class="px-10 py-5 font-mono text-slate-500">INT (11)</td><td class="px-10 py-5 text-right"><span class="badge-pk">PRIMARY KEY</span></td></tr>
                <tr class="hover:bg-slate-50 transition-colors"><td class="px-10 py-5 font-bold text-slate-800">roll</td><td class="px-10 py-5 font-mono text-slate-500">VARCHAR (20)</td><td class="px-10 py-5 text-right text-slate-300">—</td></tr>
                <tr class="hover:bg-slate-50 transition-colors"><td class="px-10 py-5 font-bold text-slate-800">session_id</td><td class="px-10 py-5 font-mono text-slate-500">INT (11)</td><td class="px-10 py-5 text-right"><span class="badge-fk">FK: sessions.id</span></td></tr>
                <tr class="hover:bg-slate-50 transition-colors"><td class="px-10 py-5 font-bold text-slate-800">class_id</td><td class="px-10 py-5 font-mono text-slate-500">INT (11)</td><td class="px-10 py-5 text-right"><span class="badge-fk">FK: classes.id</span></td></tr>
                <tr class="hover:bg-slate-50 transition-colors"><td class="px-10 py-5 font-bold text-slate-800">section_id</td><td class="px-10 py-5 font-mono text-slate-500">INT (11) NULL</td><td class="px-10 py-5 text-right"><span class="badge-fk">FK: sections.id</span></td></tr>
                <tr class="hover:bg-slate-50 transition-colors"><td class="px-10 py-5 font-bold text-slate-800">status</td><td class="px-10 py-5 font-mono text-slate-500">ENUM</td><td class="px-10 py-5 text-right"><span class="text-xs font-bold text-emerald-500 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-100 italic">Default: active</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
        <div id="exams" class="table-card p-10">
            <div class="flex items-center gap-4 mb-10">
                <div class="bg-rose-100 p-4 rounded-2xl text-rose-600"><i class="fas fa-file-signature text-2xl"></i></div>
                <h3 class="text-2xl font-bold text-slate-800 tracking-tight">6. Exams Definition</h3>
            </div>
            <table class="w-full text-sm">
                <tr class="border-b border-slate-50"><td class="py-4 font-bold text-slate-700">name</td><td class="py-4 text-right font-mono text-slate-400">VARCHAR(20)</td></tr>
                <tr class="border-b border-slate-50"><td class="py-4 font-bold text-slate-700">session_id</td><td class="py-4 text-right"><span class="badge-fk">sessions.id</span></td></tr>
                <tr class="border-b border-slate-50"><td class="py-4 font-bold text-slate-700">class_id</td><td class="py-4 text-right"><span class="badge-fk">classes.id</span></td></tr>
                <tr class="border-b border-slate-50"><td class="py-4 font-bold text-slate-700">section_id</td><td class="py-4 text-right"><span class="badge-fk">sections.id</span></td></tr>
                <tr class="border-b border-slate-50"><td class="py-4 font-bold text-slate-700">exam_date</td><td class="py-4 text-right font-mono text-slate-400">DATE</td></tr>
            </table>
        </div>

        <div id="marks" class="table-card p-10 bg-slate-900 text-white border-none shadow-2xl shadow-slate-300">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-yellow-500 p-4 rounded-2xl text-slate-900"><i class="fas fa-award text-2xl"></i></div>
                <div>
                    <h3 class="text-2xl font-bold tracking-tight">7. Performance Marks</h3>
                    <p class="text-slate-400 text-sm">The final data bridge</p>
                </div>
            </div>
            <p class="text-sm text-slate-500 mb-8 leading-relaxed">Cross-relational table connecting student identities with exam scores and specific subjects.</p>
            <table class="w-full text-sm">
                <tr class="border-b border-slate-800"><td class="py-4 font-bold text-slate-300">student_id</td><td class="py-4 text-right"><span class="px-3 py-1 bg-slate-800 text-indigo-400 rounded-lg text-[11px] font-black border border-slate-700">FK: students.id</span></td></tr>
                <tr class="border-b border-slate-800"><td class="py-4 font-bold text-slate-300">exam_id</td><td class="py-4 text-right"><span class="px-3 py-1 bg-slate-800 text-indigo-400 rounded-lg text-[11px] font-black border border-slate-700">FK: exams.id</span></td></tr>
                <tr class="border-b border-slate-800"><td class="py-4 font-bold text-slate-300">subject_id</td><td class="py-4 text-right"><span class="px-3 py-1 bg-slate-800 text-indigo-400 rounded-lg text-[11px] font-black border border-slate-700">FK: subjects.id</span></td></tr>
                <tr><td class="py-4 font-bold text-slate-300">marks</td><td class="py-4 text-right font-black text-emerald-400 italic text-lg">DECIMAL(5,2)</td></tr>
            </table>
        </div>
    </div>

    <div id="sql-init" class="mb-20">
        <div class="flex items-center gap-4 mb-10">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Implementation Guide</h2>
            <div class="h-px flex-1 bg-slate-200"></div>
        </div>

        <div class="space-y-10">
            <div class="group relative">
                <div class="absolute -left-4 top-0 bottom-0 w-1 bg-indigo-600 rounded-full"></div>
                <h4 class="text-sm font-black text-slate-400 uppercase tracking-[0.3em] mb-4 ml-2">Database Initialization & Core</h4>
                <pre class="sql-pre p-10 overflow-x-auto shadow-2xl"><code><span class="sql-keyword">CREATE DATABASE</span> school_management;
<span class="sql-keyword">USE</span> school_management;

<span class="sql-keyword">CREATE TABLE</span> sessions (
    id INT AUTO_INCREMENT <span class="sql-keyword">PRIMARY KEY</span>,
    name VARCHAR(50) NOT NULL,
    status ENUM('active','inactive') <span class="sql-keyword">DEFAULT</span> 'active'
);

<span class="sql-keyword">INSERT INTO</span> sessions (name, status) <span class="sql-keyword">VALUES</span>
('2024-2025', 'active'),('2025-2026','active');

<span class="sql-keyword">CREATE TABLE</span> classes (
    id INT AUTO_INCREMENT <span class="sql-keyword">PRIMARY KEY</span>,
    name VARCHAR(50) NOT NULL
);

<span class="sql-keyword">CREATE TABLE</span> sections (
    id INT AUTO_INCREMENT <span class="sql-keyword">PRIMARY KEY</span>,
    class_id INT,
    name VARCHAR(20),
    <span class="sql-keyword">FOREIGN KEY</span> (class_id) <span class="sql-keyword">REFERENCES</span> classes(id) <span class="sql-keyword">ON DELETE CASCADE</span>
);</code></pre>
            </div>

            <div class="group relative">
                <div class="absolute -left-4 top-0 bottom-0 w-1 bg-emerald-500 rounded-full"></div>
                <h4 class="text-sm font-black text-slate-400 uppercase tracking-[0.3em] mb-4 ml-2">Student & Performance Layer</h4>
                <pre class="sql-pre p-10 overflow-x-auto shadow-2xl"><code><span class="sql-keyword">CREATE TABLE</span> students (
    id INT AUTO_INCREMENT <span class="sql-keyword">PRIMARY KEY</span>,
    roll VARCHAR(20) NOT NULL,
    name VARCHAR(150) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    session_id INT,
    class_id INT,
    section_id INT,
    <span class="sql-keyword">FOREIGN KEY</span> (session_id) <span class="sql-keyword">REFERENCES</span> sessions(id),
    <span class="sql-keyword">FOREIGN KEY</span> (class_id) <span class="sql-keyword">REFERENCES</span> classes(id),
    <span class="sql-keyword">FOREIGN KEY</span> (section_id) <span class="sql-keyword">REFERENCES</span> sections(id)
);

<span class="sql-keyword">CREATE TABLE</span> marks (
    id INT AUTO_INCREMENT <span class="sql-keyword">PRIMARY KEY</span>,
    student_id INT,
    exam_id INT,
    subject_id INT,
    marks DECIMAL(5,2),
    <span class="sql-keyword">FOREIGN KEY</span> (student_id) <span class="sql-keyword">REFERENCES</span> students(id) <span class="sql-keyword">ON DELETE CASCADE</span>
);</code></pre>
            </div>
        </div>
    </div>
    <div id="data-seeding" class="mb-20">
        <div class="flex items-center gap-4 mb-10">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Data Seeding (Insertions)</h2>
            <div class="h-px flex-1 bg-slate-200"></div>
        </div>

        <div class="grid grid-cols-1 gap-8">
            <div class="table-card p-8 border-l-[6px] border-l-blue-500">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm text-white">1</span>
                    <h3 class="text-xl font-bold text-slate-800 uppercase tracking-wide">Core Configuration Setup</h3>
                </div>
                <pre class="sql-pre p-8 overflow-x-auto shadow-inner"><code><span class="sql-keyword">-- Populate Sessions</span>
<span class="sql-keyword">INSERT INTO</span> sessions (name, status) <span class="sql-keyword">VALUES</span>
('2024-2025', 'active'),
('2025-2026', 'inactive');

<span class="sql-keyword">-- Populate Classes</span>
<span class="sql-keyword">INSERT INTO</span> classes (name) <span class="sql-keyword">VALUES</span>
('Class 6'), ('Class 7'), ('Class 8'), ('Class 9'), ('Class 10');

<span class="sql-keyword">-- Populate Sections for Class 6 (ID 1) and Class 7 (ID 2)</span>
<span class="sql-keyword">INSERT INTO</span> sections (class_id, name) <span class="sql-keyword">VALUES</span>
(1, 'Section A'), (1, 'Section B'),
(2, 'Section A'), (3, 'Section C');</code></pre>
            </div>

            <div class="table-card p-8 border-l-[6px] border-l-emerald-500">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-emerald-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm text-white">2</span>
                    <h3 class="text-xl font-bold text-slate-800 uppercase tracking-wide">Academic & Student Data</h3>
                </div>
                <pre class="sql-pre p-8 overflow-x-auto shadow-inner"><code><span class="sql-keyword">-- Register Subjects per Class</span>
<span class="sql-keyword">INSERT INTO</span> subjects (class_id, name) <span class="sql-keyword">VALUES</span>
(1, 'Mathematics'), (1, 'English'), (1, 'Bangla'),
(2, 'Physics'), (2, 'Chemistry'), (2, 'Higher Math');

<span class="sql-keyword">-- Insert Students (linked to Session 1, Class 1, Section 1)</span>
<span class="sql-keyword">INSERT INTO</span> students (roll, name, phone, email, session_id, class_id, section_id) <span class="sql-keyword">VALUES</span>
('101', 'Arif Hossain', '01700000001', 'arif@edu.com', 1, 1, 1),
('102', 'Mehedi Hasan', '01700000002', 'mehedi@edu.com', 1, 1, 1),
('201', 'Jannatun Noor', '01800000001', 'jannat@edu.com', 1, 2, 3);</code></pre>
            </div>

            <div class="table-card p-8 border-l-[6px] border-l-amber-500 bg-slate-50/30">
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-amber-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm text-white">3</span>
                    <h3 class="text-xl font-bold text-slate-800 uppercase tracking-wide">Examinations & Result Entry</h3>
                </div>
                <pre class="sql-pre p-8 overflow-x-auto shadow-inner"><code><span class="sql-keyword">-- Create Exams</span>
<span class="sql-keyword">INSERT INTO</span> exams (name, session_id, class_id, section_id, exam_date) <span class="sql-keyword">VALUES</span>
('First Term 2024', 1, 1, 1, '2024-04-10'),
('Final Exam 2024', 1, 1, 1, '2024-11-20');

<span class="sql-keyword">-- Input Marks (Student ID, Exam ID, Subject ID, Score)</span>
<span class="sql-keyword">INSERT INTO</span> marks (student_id, exam_id, subject_id, marks) <span class="sql-keyword">VALUES</span>
(1, 1, 1, 85.50), <span class="sql-keyword">-- Arif, First Term, Math</span>
(1, 1, 2, 78.00), <span class="sql-keyword">-- Arif, First Term, English</span>
(2, 1, 1, 92.00), <span class="sql-keyword">-- Mehedi, First Term, Math</span>
(3, 1, 4, 88.25); <span class="sql-keyword">-- Jannat, First Term, Physics</span></code></pre>
            </div>
        </div>
    </div>
    <div id="sql-queries" class="mb-20">
        <div class="bg-indigo-600 rounded-[2.5rem] p-12 text-white relative overflow-hidden shadow-2xl shadow-indigo-200">
            <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-500 rounded-full -mr-48 -mt-48 opacity-20"></div>
            <div class="relative z-10">
                <h2 class="text-4xl font-black mb-10 flex items-center gap-4">
                    <i class="fas fa-chart-pie"></i> Performance Analytics
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="bg-indigo-900/40 backdrop-blur-md p-8 rounded-3xl border border-indigo-400/30">
                        <h4 class="font-black text-indigo-200 text-xs uppercase tracking-widest mb-4">Student Identity Query</h4>
                        <pre class="text-[13px] font-mono leading-relaxed text-indigo-50">SELECT s.name, s.roll, c.name AS class
FROM students s
JOIN classes c ON s.class_id = c.id
JOIN sections sec ON s.section_id = sec.id;</pre>
                    </div>

                    <div class="bg-indigo-900/40 backdrop-blur-md p-8 rounded-3xl border border-indigo-400/30">
                        <h4 class="font-black text-indigo-200 text-xs uppercase tracking-widest mb-4">Average Performance</h4>
                        <pre class="text-[13px] font-mono leading-relaxed text-indigo-50">SELECT c.name AS class, AVG(m.marks)
FROM marks m
JOIN students s ON m.student_id = s.id
JOIN classes c ON s.class_id = c.id
GROUP BY c.id;</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-20 border-t border-slate-200">
        <div class="flex justify-center gap-6 mb-8 text-slate-300">
            <i class="fab fa-laravel text-3xl hover:text-rose-500 transition-colors"></i>
            <i class="fab fa-vuejs text-3xl hover:text-emerald-500 transition-colors"></i>
            <i class="fab fa-php text-3xl hover:text-indigo-500 transition-colors"></i>
        </div>
        <p class="text-slate-400 text-sm font-bold tracking-widest uppercase">© 2026 EduSystem DB Architect &bull; Built for Performance</p>
    </footer>
</main>

<script>
    // Smooth scrolling and active state logic
    const sections = document.querySelectorAll('div[id], table[id]');
    const navItems = document.querySelectorAll('.sidebar-item');

    window.addEventListener('scroll', () => {
        let current = "";
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 150) {
                current = section.getAttribute('id');
            }
        });

        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('href').includes(current)) {
                item.classList.add('active');
            }
        });
    });

    // Manual click toggle
    navItems.forEach(link => {
        link.addEventListener('click', function() {
            navItems.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
</body>
</html>