<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>API Tierra Media</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:400,700|crimson-text:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#1a1a1a] text-[#d4af37] min-h-screen flex items-center justify-center relative overflow-hidden">
        
        <div class="absolute inset-0 z-0 opacity-20 pointer-events-none" 
             style="background-image: url('https://www.transparenttextures.com/patterns/aged-paper.png'); mix-blend-mode: overlay;">
        </div>

        <div class="relative z-10 max-w-4xl mx-auto p-10 text-center border-4 border-[#d4af37] rounded-lg shadow-2xl bg-[#0f0f0f] bg-opacity-95">
            
            <h1 class="text-5xl md:text-7xl font-bold mb-4 tracking-wider" style="font-family: 'Cinzel', serif;">
                La Tierra Media API
            </h1>
            
            <p class="text-xl md:text-2xl mb-10 text-gray-400 italic" style="font-family: 'Crimson Text', serif;">
                "Un Anillo para gobernarlos a todos. Una API para encontrarlos."
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                <div class="p-6 border border-[#d4af37] rounded hover:bg-[#2a2a2a] transition duration-300 group">
                    <h2 class="text-2xl font-bold mb-3 text-white group-hover:text-[#d4af37]">📜 Documentación</h2>
                    <p class="text-gray-400 mb-4">Consulta el compendio de personajes, razas y reinos.</p>
                    <div class="bg-black p-3 rounded border border-gray-700">
                        <code class="text-green-400 text-sm">GET /api/characters</code>
                    </div>
                </div>

                <div class="p-6 border border-[#d4af37] rounded hover:bg-[#2a2a2a] transition duration-300 group">
                    <h2 class="text-2xl font-bold mb-3 text-white group-hover:text-[#d4af37]">⚔️ Acciones</h2>
                    <p class="text-gray-400 mb-4">Gestiona los héroes y villanos de la historia.</p>
                    <div class="flex gap-2 flex-wrap text-xs font-mono font-bold">
                        <span class="bg-blue-900 text-blue-200 px-2 py-1 rounded border border-blue-700">POST</span>
                        <span class="bg-yellow-900 text-yellow-200 px-2 py-1 rounded border border-yellow-700">PUT</span>
                        <span class="bg-red-900 text-red-200 px-2 py-1 rounded border border-red-700">DELETE</span>
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t border-gray-800 pt-6">
                <p class="text-sm text-gray-600">
                    Servidor corriendo en puerto <span class="text-green-600 font-bold">8000</span>
                </p>
            </div>
        </div>
    </body>
</html>