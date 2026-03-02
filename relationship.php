<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduDB | Relationship Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }

        /* Relationship Line Animation */
        .flow-line {
            height: 2px;
            background: linear-gradient(90deg, #3b82f6 0%, #9333ea 100%);
            position: relative;
            overflow: hidden;
        }
        .flow-line::after {
            content: "";
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, #fff, transparent);
            animation: flow 2s infinite;
        }
        @keyframes flow {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .db-node {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }
        .db-node:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: #3b82f6;
        }

        .pulse-dot {
            width: 8px; height: 8px;
            background: #3b82f6;
            border-radius: 50%;
            position: absolute;
            right: -4px; top: 50%;
            transform: translateY(-50%);
            box-shadow: 0 0 0 rgba(59, 130, 246, 0.4);
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
    </style>
</head>
<body class="p-8">

<div class="max-w-6xl mx-auto">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-extrabold text-slate-900">Entity Relationship Flow</h1>
        <p class="text-slate-500 italic">Visualizing how your PHP/Laravel database tables connect</p>
    </div>

    <div class="relative flex flex-col md:flex-row items-center justify-between gap-4">

        <div class="flex flex-col gap-6 w-full md:w-64">
            <div class="bg-white p-4 rounded-xl shadow-sm db-node relative">
                <div class="flex items-center gap-3 mb-2 text-blue-600 font-bold text-sm">
                    <i class="fas fa-history"></i> Sessions
                </div>
                <div class="text-[14px] text-slate-400 font-mono">PK: id</div>
                <div class="pulse-dot"></div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm db-node relative">
                <div class="flex items-center gap-3 mb-2 text-purple-600 font-bold text-sm">
                    <i class="fas fa-layer-group"></i> Classes
                </div>
                <div class="text-[14px] text-slate-400 font-mono">PK: id</div>
                <div class="pulse-dot"></div>
            </div>
        </div>

        <div class="hidden md:flex flex-col gap-20 w-24">
            <div class="flow-line w-full"></div>
            <div class="flow-line w-full"></div>
        </div>

        <div class="flex flex-col gap-6 w-full md:w-72">
            <div class="bg-white p-5 rounded-xl shadow-md border-l-4 border-purple-500 db-node relative">
                <h3 class="font-bold text-slate-800 text-sm mb-3">Sections</h3>
                <ul class="text-[14px] space-y-2 text-slate-500">
                    <li class="flex justify-between"><span>id</span> <span class="text-blue-500">PK</span></li>
                    <li class="flex justify-between font-bold text-slate-700"><span>class_id</span> <span class="text-purple-500 italic">FK → Classes</span></li>
                </ul>
                <div class="pulse-dot"></div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-md border-l-4 border-emerald-500 db-node relative">
                <h3 class="font-bold text-slate-800 text-sm mb-3">Subjects</h3>
                <ul class="text-[14px] space-y-2 text-slate-500">
                    <li class="flex justify-between"><span>id</span> <span class="text-blue-500">PK</span></li>
                    <li class="flex justify-between"><span>name</span> <span>VARCHAR</span></li>
                </ul>
                <div class="pulse-dot"></div>
            </div>
        </div>

        <div class="hidden md:flex flex-col gap-20 w-24">
            <div class="flow-line w-full"></div>
        </div>

        <div class="flex flex-col gap-6 w-full md:w-80">
            <div class="bg-slate-900 p-6 rounded-2xl shadow-2xl db-node relative border-2 border-blue-500/30">
                <div class="flex items-center gap-2 text-blue-400 font-bold mb-4">
                    <i class="fas fa-user-graduate"></i> Students (Central Hub)
                </div>
                <div class="space-y-3">
                    <div class="bg-slate-800 p-2 rounded flex justify-between items-center">
                        <span class="text-xs text-slate-300">session_id</span>
                        <span class="text-[14px] bg-blue-900/50 text-blue-300 px-2 py-0.5 rounded">FK</span>
                    </div>
                    <div class="bg-slate-800 p-2 rounded flex justify-between items-center">
                        <span class="text-xs text-slate-300">class_id</span>
                        <span class="text-[14px] bg-blue-900/50 text-blue-300 px-2 py-0.5 rounded">FK</span>
                    </div>
                    <div class="bg-slate-800 p-2 rounded flex justify-between items-center">
                        <span class="text-xs text-slate-300">section_id</span>
                        <span class="text-[14px] bg-blue-900/50 text-blue-300 px-2 py-0.5 rounded">FK</span>
                    </div>
                </div>
                <div class="pulse-dot !bg-purple-500"></div>
            </div>

            <div class="bg-amber-50 p-6 rounded-2xl shadow-lg border-2 border-dashed border-amber-200 db-node relative">
                <div class="flex items-center gap-2 text-amber-700 font-bold mb-4">
                    <i class="fas fa-chart-bar"></i> Marks (End Result)
                </div>
                <div class="space-y-1">
                    <p class="text-[14px] text-slate-500 italic uppercase font-bold">Consolidates Data From:</p>
                    <p class="text-xs text-slate-700 font-medium font-mono">• students.id</p>
                    <p class="text-xs text-slate-700 font-medium font-mono">• exams.id</p>
                    <p class="text-xs text-slate-700 font-medium font-mono">• subjects.id</p>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-16 flex justify-center gap-8 text-xs font-bold text-slate-400 uppercase tracking-widest">
        <div class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-500 rounded"></span> Primary Key</div>
        <div class="flex items-center gap-2"><span class="w-3 h-3 bg-purple-500 rounded"></span> Foreign Key</div>
        <div class="flex items-center gap-2"><span class="w-3 h-1 bg-gradient-to-r from-blue-500 to-purple-500"></span> Relationship Flow</div>
    </div>
</div>

</body>
</html>