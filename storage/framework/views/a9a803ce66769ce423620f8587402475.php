<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Sistem Inventaris Aset'); ?></title>
    
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke-width=%221.5%22 stroke=%22%234F46E5%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 d=%22M21 7.5l-2.25-1.313M21 7.5v7.5m0-7.5l-2.25 1.313M3 7.5l2.25-1.313M3 7.5v7.5m0-7.5l2.25 1.313M12 21v-7.5m0 0l-5.625-3.281M12 13.5l5.625-3.281m0 0L21 7.5m-9-3.75l-5.625 3.281m5.625-3.281L21 3.75M3 15l5.625-3.281m0 0L12 8.25m-3.375 3.281L12 13.5m0 0l5.625-3.281%22 /></svg>">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen bg-gray-100">

        <aside class="w-64 bg-gray-900 text-white flex-shrink-0">
            <div class="flex items-center justify-center h-16 shadow-lg gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-indigo-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25-1.313M21 7.5v7.5m0-7.5l-2.25 1.313M3 7.5l2.25-1.313M3 7.5v7.5m0-7.5l2.25 1.313M12 21v-7.5m0 0l-5.625-3.281M12 13.5l5.625-3.281m0 0L21 7.5m-9-3.75l-5.625 3.281m5.625-3.281L21 3.75M3 15l5.625-3.281m0 0L12 8.25m-3.375 3.281L12 13.5m0 0l5.625-3.281" />
                </svg>
                <span class="font-bold text-xl text-white">InventarisAset</span>
            </div>
            
            <nav class="mt-8">
                
                <a href="<?php echo e(route('assets.index')); ?>" 
                   class="flex items-center gap-3 px-6 py-3 text-sm font-semibold transition-colors duration-200
                          <?php echo e((request()->routeIs('assets.index') || request()->routeIs('assets.index.root') || request()->routeIs('assets.edit')) 
                             ? 'bg-indigo-600 text-white' 
                             : 'text-gray-300 hover:bg-gray-700 hover:text-white'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                
                <a href="<?php echo e(route('assets.create')); ?>" 
                   class="flex items-center gap-3 px-6 py-3 text-sm font-semibold transition-colors duration-200
                          <?php echo e(request()->routeIs('assets.create') 
                             ? 'bg-indigo-600 text-white' 
                             : 'text-gray-300 hover:bg-gray-700 hover:text-white'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Tambah Aset</span>
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        
                        <div class="flex items-center">
                            <form action="<?php echo e(route('assets.index')); ?>" method="GET" class="flex w-full md:w-96">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="search" placeholder="Cari aset, kategori, lokasi..." 
                                           class="w-full pl-10 pr-4 py-2 rounded-md border-gray-300 bg-gray-100 
                                                  focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300" 
                                           value="<?php echo e(request('search')); ?>">
                                </div>
                            </form>
                        </div>
                        
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin&background=indigo&color=fff" alt="Avatar">
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 md:p-8">
                
                <h1 class="text-3xl font-bold text-gray-900 mb-8">
                    <?php echo $__env->yieldContent('header'); ?>
                </h1>
                
                <?php echo $__env->yieldContent('content'); ?>

                <footer class="mt-12 pt-6 border-t border-gray-200">
                    <p class="text-center text-sm font-medium text-gray-600">
                        Made By Ahmad Fahmi Haykal
                    </p>
                </footer>
                
            </main>
        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\inventaris-aset\resources\views/layouts/app.blade.php ENDPATH**/ ?>