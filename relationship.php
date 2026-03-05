<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduDB | Projector-Ready Relationship Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc; /* Light Slate Gray */
            color: #1e293b; /* Deep Navy for maximum readability */
        }

        /* Projector-Friendly Node Styling */
        .table-box {
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .table-box:hover {
            border-color: #2563eb;
            transform: scale(1.03);
            box-shadow: 0 20px 25px -5px rgba(37, 99, 235, 0.1);
        }

        /* Animation for Data Flow */
        @keyframes flow {
            0% { border-left-color: #e2e8f0; }
            50% { border-left-color: #2563eb; }
            100% { border-left-color: #e2e8f0; }
        }
        .active-flow {
            border-left: 6px solid #2563eb;
            animation: flow 3s infinite;
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .float-node { animation: float 5s ease-in-out infinite; }

        .pk-tag { background: #fef3c7; color: #92400e; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 6px; border: 1px solid #fde68a; }
        .fk-tag { background: #dbeafe; color: #1e40af; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 6px; border: 1px solid #bfdbfe; }
    </style>
</head>
<body class="p-8 md:p-16">

<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 border-b-4 border-blue-600 pb-8">
        <div>
            <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest mb-4 inline-block">Database Mapping</span>
            <h1 class="text-5xl font-extrabold tracking-tight text-slate-900">Relational <span class="text-blue-600">Schema Flow</span></h1>
            <p class="text-slate-500 text-lg font-medium mt-2 italic">Optimized for Projector & Large Screen Presentation</p>
        </div>
        <a href="school.php" class="bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold flex items-center gap-3 hover:bg-blue-600 transition-all shadow-lg">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">

        <div class="space-y-10">
            <div class="text-center font-black text-slate-400 uppercase tracking-widest text-sm mb-4">Foundation</div>

            <div class="table-box p-8 float-node active-flow">
                <h3 class="text-blue-600 font-extrabold flex items-center gap-3 mb-6 text-xl">
                    <i class="fas fa-clock"></i> Sessions
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between font-bold border-b pb-2"><span>id</span> <span class="pk-tag">PK</span></div>
                    <div class="flex justify-between text-slate-600"><span>name</span> <span class="text-xs font-mono uppercase">Varchar</span></div>
                </div>
            </div>

            <div class="table-box p-8 float-node active-flow" style="animation-delay: 1s;">
                <h3 class="text-purple-600 font-extrabold flex items-center gap-3 mb-6 text-xl">
                    <i class="fas fa-university"></i> Classes
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between font-bold border-b pb-2"><span>id</span> <span class="pk-tag">PK</span></div>
                    <div class="flex justify-between text-slate-600"><span>name</span> <span class="text-xs font-mono uppercase">Varchar</span></div>
                </div>
            </div>
        </div>

        <div class="space-y-10">
            <div class="text-center font-black text-slate-400 uppercase tracking-widest text-sm mb-4">Structure</div>

            <div class="table-box p-8 border-l-8 border-l-amber-500">
                <h3 class="text-amber-600 font-extrabold mb-6 text-xl">Sections & Subjects</h3>
                <div class="space-y-6">
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <span class="block font-bold text-slate-800 mb-2 underline">Sections</span>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-blue-700">class_id</span>
                            <span class="fk-tag">FK (classes.id)</span>
                        </div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <span class="block font-bold text-slate-800 mb-2 underline">Subjects</span>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-blue-700">class_id</span>
                            <span class="fk-tag">FK (classes.id)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-box p-8 border-l-8 border-l-rose-500">
                <h3 class="text-rose-600 font-extrabold mb-6 text-xl">Exams</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center text-sm font-bold">
                        <span>session_id</span> <span class="fk-tag">FK</span>
                    </div>
                    <div class="flex justify-between items-center text-sm font-bold">
                        <span>class_id</span> <span class="fk-tag">FK</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-10">
            <div class="text-center font-black text-slate-400 uppercase tracking-widest text-sm mb-4">Data Hub</div>

            <div class="table-box p-8 border-4 border-blue-600 shadow-2xl">
                <h2 class="text-2xl font-black text-slate-900 mb-6 flex items-center gap-3">
                    <i class="fas fa-graduation-cap text-blue-600"></i> Students
                </h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                        <span class="font-bold">session_id</span>
                        <span class="fk-tag">FK</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                        <span class="font-bold">class_id</span>
                        <span class="fk-tag">FK</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                        <span class="font-bold">section_id</span>
                        <span class="fk-tag">FK</span>
                    </div>
                </div>
            </div>

            <div class="table-box p-8 bg-blue-600 text-white border-none shadow-xl">
                <h3 class="text-white font-black mb-6 text-xl uppercase tracking-tighter italic">Result Processing</h3>
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-xs font-bold border-b border-blue-400 pb-2">
                        <span>student_id</span> <span>FK</span>
                    </div>
                    <div class="flex justify-between text-xs font-bold border-b border-blue-400 pb-2">
                        <span>exam_id</span> <span>FK</span>
                    </div>
                    <div class="flex justify-between text-xs font-bold border-b border-blue-400 pb-2">
                        <span>subject_id</span> <span>FK</span>
                    </div>
                </div>
                <div class="text-center py-4 bg-white/10 rounded-xl">
                    <span class="text-4xl font-black tracking-tighter">MARKS %</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-20 p-8 bg-white border-2 border-slate-200 rounded-3xl flex flex-wrap justify-around gap-8">
        <div class="flex items-center gap-3">
            <div class="w-6 h-6 bg-blue-600 rounded-lg"></div>
            <span class="font-bold text-slate-700">Primary Flow Path</span>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-3 py-1 bg-fef3c7 border border-fde68a text-92400e font-black text-xs rounded">PK</div>
            <span class="font-bold text-slate-700">Unique Identifier</span>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-3 py-1 bg-dbeafe border border-bfdbfe text-1e40af font-black text-xs rounded">FK</div>
            <span class="font-bold text-slate-700">Relational Bridge</span>
        </div>
    </div>
</div>

</body>
</html>