<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduDB | Academic Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; scroll-behavior: smooth; }
        .sidebar-item:hover { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .sql-pre { background: #0f172a !important; color: #38bdf8 !important; border-radius: 12px; }
        .table-card { transition: transform 0.2s; border: 1px solid #e2e8f0; }
        .table-card:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .badge-pk { background: #fef3c7; color: #92400e; padding: 2px 6px; border-radius: 4px; font-size: 14px; font-weight: 700; }
        .badge-fk { background: #dbeafe; color: #1e40af; padding: 2px 6px; border-radius: 4px; font-size: 14px; font-weight: 700; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="flex">

<aside class="w-72 bg-white h-screen sticky top-0 border-r border-slate-200 hidden lg:flex flex-col">
    <div class="p-6 border-b border-slate-100">
        <div class="flex items-center gap-3">
            <div class="bg-blue-600 p-2 rounded-xl text-white shadow-lg shadow-blue-200">
                <i class="fas fa-university text-xl"></i>
            </div>
            <span class="text-xl font-bold text-slate-800">EduSystem <span class="text-blue-600 text-xs block">DB ARCHITECT</span></span>
        </div>
    </div>

    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <p class="px-4 text-[14px] font-bold text-slate-400 uppercase tracking-widest mb-2">Schema Components</p>
        <a href="#sessions" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-clock w-5"></i> 1. Sessions
        </a>
        <a href="#classes" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-layer-group w-5"></i> 2. Classes
        </a>
        <a href="#sections" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-columns w-5"></i> 3. Sections
        </a>
        <a href="#students" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-user-graduate w-5"></i> 4. Students
        </a>
        <a href="#subjects" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-book w-5"></i> 5. Subjects
        </a>
        <a href="#exams" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-file-signature w-5"></i> 6. Exams
        </a>
        <a href="#marks" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-award w-5"></i> 7. Marks
        </a>
        <a href="relationship.php" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-award w-5"></i> 8. Relationship Flow
        </a>

        <p class="px-4 text-[14px] font-bold text-slate-400 uppercase tracking-widest mt-6 mb-2">Implementation</p>
        <a href="#sql-init" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all">
            <i class="fas fa-database w-5"></i> DB Setup & Seed
        </a>
        <a href="#sql-queries" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 font-medium transition-all text-orange-600">
            <i class="fas fa-bolt w-5"></i> Practice Queries
        </a>
    </nav>
</aside>

<main class="flex-1 p-6 md:p-12">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-12">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Academic Database Design</h1>
            <p class="text-slate-500 mt-1">Full Entity Relationship Model & Implementation Scripts</p>
        </div>
        <div class="flex gap-2">
            <span class="bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-xs font-bold border border-emerald-200">MySQL 8.0</span>
            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-bold border border-blue-200">Laravel Ready</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div id="sessions" class="table-card bg-white p-6 rounded-2xl shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-blue-50 p-2 rounded-lg text-blue-600"><i class="fas fa-clock"></i></div>
                <h2 class="font-bold text-slate-800">1. Sessions Table</h2>
            </div>
            <table class="w-full text-sm">
                <tr class="border-b"><th class="py-2 text-left text-slate-400 font-medium">Field</th><th class="py-2 text-right text-slate-400 font-medium">Type</th></tr>
                <tr><td class="py-2 font-bold">id</td><td class="py-2 text-right"><span class="badge-pk">INT PK</span></td></tr>
                <tr><td class="py-2">name</td><td class="py-2 text-right text-slate-500">VARCHAR(50)</td></tr>
                <tr><td class="py-2">status</td><td class="py-2 text-right text-slate-500">ENUM</td></tr>
            </table>
        </div>

        <div id="classes" class="table-card bg-white p-6 rounded-2xl shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-purple-50 p-2 rounded-lg text-purple-600"><i class="fas fa-layer-group"></i></div>
                <h2 class="font-bold text-slate-800">2. Classes Table</h2>
            </div>
            <table class="w-full text-sm">
                <tr class="border-b"><th class="py-2 text-left text-slate-400 font-medium">Field</th><th class="py-2 text-right text-slate-400 font-medium">Type</th></tr>
                <tr><td class="py-2 font-bold">id</td><td class="py-2 text-right"><span class="badge-pk">INT PK</span></td></tr>
                <tr><td class="py-2">name</td><td class="py-2 text-right text-slate-500">VARCHAR(50)</td></tr>
            </table>
        </div>

        <div id="sections" class="table-card bg-white p-6 rounded-2xl shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-amber-50 p-2 rounded-lg text-amber-600"><i class="fas fa-columns"></i></div>
                <h2 class="font-bold text-slate-800">3. Sections Table</h2>
            </div>
            <table class="w-full text-sm">
                <tr class="border-b"><th class="py-2 text-left text-slate-400 font-medium">Field</th><th class="py-2 text-right text-slate-400 font-medium">Type</th></tr>
                <tr><td class="py-2 font-bold">id</td><td class="py-2 text-right"><span class="badge-pk">INT PK</span></td></tr>
                <tr><td class="py-2">class_id</td><td class="py-2 text-right"><span class="badge-fk">INT FK</span></td></tr>
                <tr><td class="py-2">name</td><td class="py-2 text-right text-slate-500">VARCHAR(20)</td></tr>
            </table>
        </div>
    </div>

    <div id="students" class="table-card bg-white rounded-2xl shadow-sm overflow-hidden mb-12 border-t-4 border-t-blue-500">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-blue-100 p-3 rounded-xl text-blue-600"><i class="fas fa-user-graduate"></i></div>
                <h2 class="text-xl font-bold text-slate-800">4. Students Master Table</h2>
            </div>
            <span class="text-[14px] font-bold text-slate-400 uppercase">Primary Entity</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                <tr class="text-left">
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Column Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Data Type</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Reference / Key</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                <tr><td class="px-6 py-4 font-bold text-slate-800">id</td><td class="px-6 py-4 text-slate-600">INT (11)</td><td class="px-6 py-4"><span class="badge-pk">PRIMARY KEY</span></td></tr>
                <tr><td class="px-6 py-4 font-bold text-slate-800">roll</td><td class="px-6 py-4 text-slate-600">VARCHAR (20)</td><td class="px-6 py-4">-</td></tr>
                <tr><td class="px-6 py-4 font-bold text-slate-800">session_id</td><td class="px-6 py-4 text-slate-600">INT (11)</td><td class="px-6 py-4"><span class="badge-fk">FK: sessions.id</span></td></tr>
                <tr><td class="px-6 py-4 font-bold text-slate-800">class_id</td><td class="px-6 py-4 text-slate-600">INT (11)</td><td class="px-6 py-4"><span class="badge-fk">FK: classes.id</span></td></tr>
                <tr><td class="px-6 py-4 font-bold text-slate-800">status</td><td class="px-6 py-4 text-slate-600">ENUM ('active','inactive')</td><td class="px-6 py-4 text-xs text-blue-500">Default: active</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <div class="space-y-8">
            <div id="subjects" class="table-card bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2"><i class="fas fa-book text-emerald-500"></i> 5. Subjects Table</h3>
                <table class="w-full text-sm">
                    <tr class="border-b">
                        <td class="py-2 font-bold">name</td>
                        <td class="py-2 text-right text-slate-500">VARCHAR(100)</td>
                    </tr>
                </table>
            </div>
            <div id="exams" class="table-card bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2"><i class="fas fa-file-signature text-orange-500"></i> 6. Exams Table</h3>
                <table class="w-full text-sm">
                    <tr class="border-b"><td class="py-2 font-bold">session_id</td><td class="py-2 text-right"><span class="badge-fk">sessions.id</span></td></tr>
                    <tr class="border-b"><td class="py-2 font-bold">exam_date</td><td class="py-2 text-right text-slate-500">DATE</td></tr>
                </table>
            </div>
        </div>

        <div id="marks" class="table-card bg-white p-6 rounded-2xl shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2 text-xl"><i class="fas fa-award text-yellow-500"></i> 7. Marks Table</h3>
                <p class="text-sm text-slate-500 mb-4">Relational table linking students to their specific scores.</p>
            </div>
            <table class="w-full text-sm">
                <tr class="border-b"><td class="py-3 font-bold">student_id</td><td class="py-3 text-right"><span class="badge-fk">students.id</span></td></tr>
                <tr class="border-b"><td class="py-3 font-bold">exam_id</td><td class="py-3 text-right"><span class="badge-fk">exams.id</span></td></tr>
                <tr class="border-b"><td class="py-3 font-bold">subject_id</td><td class="py-3 text-right"><span class="badge-fk">subjects.id</span></td></tr>
                <tr class="border-b"><td class="py-3 font-bold">marks</td><td class="py-3 text-right font-mono text-emerald-600 font-bold italic">DECIMAL(5,2)</td></tr>
            </table>
        </div>
    </div>

    <div id="sql-init" class="mb-12">
        <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
            <i class="fas fa-terminal text-slate-400"></i> SQL Setup & Seeding
        </h2>
        <div class="space-y-6">
            <div class="group relative">
                <div class="absolute right-4 top-4 text-xs font-mono text-slate-500">SQL SCRIPT</div>
                <pre class="sql-pre p-6 overflow-x-auto shadow-xl">
-- DATABASE INITIALIZATION
CREATE DATABASE school_management;
USE school_management;

-- 1. SESSIONS
CREATE TABLE sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    start_date DATE,
    end_date DATE,
    status ENUM('active','inactive') DEFAULT 'active'
);

INSERT INTO sessions (name, start_date, end_date, status) VALUES
('2024-2025', '2024-01-01', '2024-12-31', 'active');

-- 2. CLASSES & 3. SECTIONS
CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT,
    name VARCHAR(20),
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE
);

INSERT INTO classes (name) VALUES ('Class 6'), ('Class 7');
INSERT INTO sections (class_id, name) VALUES (1,'A'),(1,'B');</pre>
            </div>

            <div class="group relative">
                    <pre class="sql-pre p-6 overflow-x-auto shadow-xl">
-- 4. STUDENTS MASTER
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    roll VARCHAR(20) NOT NULL,
    name VARCHAR(150) NOT NULL,
    session_id INT,
    class_id INT,
    section_id INT,
    FOREIGN KEY (session_id) REFERENCES sessions(id),
    FOREIGN KEY (class_id) REFERENCES classes(id),
    FOREIGN KEY (section_id) REFERENCES sections(id)
);

-- 7. MARKS IMPLEMENTATION
CREATE TABLE marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    exam_id INT,
    subject_id INT,
    marks DECIMAL(5,2),
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (exam_id) REFERENCES exams(id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

INSERT INTO marks (student_id, exam_id, subject_id, marks) VALUES
(1,2,1,85.00), (1,2,2,78.50), (1,2,3,90.00);</pre>
            </div>
        </div>
    </div>

    <div id="sql-queries" class="mb-20">
        <h2 class="text-2xl font-bold text-orange-600 mb-6 flex items-center gap-3">
            <i class="fas fa-rocket"></i> Optimized Practice Queries
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-orange-100 shadow-sm">
                <h4 class="font-bold text-slate-800 mb-3 text-sm">Show All Students with Class & Section</h4>
                <pre class="sql-pre p-4 text-[14px]">
SELECT s.name, s.roll, c.name AS class, sec.name AS section
FROM students s
JOIN classes c ON s.class_id = c.id
JOIN sections sec ON s.section_id = sec.id;</pre>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-orange-100 shadow-sm">
                <h4 class="font-bold text-slate-800 mb-3 text-sm">Class-wise Average Performance</h4>
                <pre class="sql-pre p-4 text-[14px]">
SELECT c.name AS class, AVG(m.marks) AS avg_marks
FROM marks m
JOIN students s ON m.student_id = s.id
JOIN classes c ON s.class_id = c.id
GROUP BY c.id;</pre>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-orange-100 shadow-sm">
                <h4 class="font-bold text-slate-800 mb-3 text-sm">Top 5 Students by Total Marks</h4>
                <pre class="sql-pre p-4 text-[14px]">
SELECT st.name, SUM(m.marks) AS total_marks
FROM marks m
JOIN students st ON m.student_id = st.id
GROUP BY st.id
ORDER BY total_marks DESC
LIMIT 5;</pre>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-orange-100 shadow-sm">
                <h4 class="font-bold text-slate-800 mb-3 text-sm">Final Exam Rank List</h4>
                <pre class="sql-pre p-4 text-[14px]">
SELECT st.name, SUM(m.marks) AS total_marks
FROM marks m
JOIN students st ON m.student_id = st.id
JOIN exams e ON m.exam_id = e.id
WHERE e.name = 'Final'
GROUP BY st.id;</pre>
            </div>
        </div>
    </div>

    <footer class="text-center py-12 border-t border-slate-200">
        <p class="text-slate-400 text-sm font-medium">© 2026 Academic Schema Documentation. Structured for PHP/Laravel.</p>
    </footer>
</main>

<script>
    // Simple sidebar active link toggle
    const links = document.querySelectorAll('.sidebar-item');
    links.forEach(link => {
        link.addEventListener('click', () => {
            links.forEach(l => l.classList.remove('bg-blue-50', 'text-blue-600'));
            link.classList.add('bg-blue-50', 'text-blue-600');
        });
    });
</script>
</body>
</html>