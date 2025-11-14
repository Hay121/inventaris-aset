

<?php $__env->startSection('title', 'Tambah Aset Baru'); ?>
<?php $__env->startSection('header', 'Tambah Aset Baru'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-3">
            
            <div class="p-6 md:p-8 bg-gradient-to-b from-gray-800 to-gray-900 text-white rounded-t-lg md:rounded-l-lg md:rounded-t-none">
                <h3 class="text-2xl font-bold text-white">Petunjuk Pengisian</h3>
                <p class="mt-4 text-gray-300">
                    Ikuti panduan ini untuk memastikan data yang Anda masukkan konsisten dan benar.
                </p>
                
                <div class="mt-8 space-y-6">
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-300"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.737.563l8.28-3.372c.957-.39 1.686-1.249 1.686-2.262V5.25A2.25 2.25 0 0019.5 3h-4.318c-.597 0-1.17.237-1.591.659l-4.08 4.08a.75.75 0 00-.217 1.06l-.217-.217z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 5.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white">Nama Aset</h4>
                            <p class="mt-1 text-sm text-gray-400">Gunakan nama yang spesifik dan jelas. Cth: 'Laptop Dell XPS 15', 'Meja Rapat Kayu Jati'.</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-300"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white">Kategori</h4>
                            <p class="mt-1 text-sm text-gray-400">Kelompokkan aset agar mudah dicari. Cth: 'Elektronik', 'Furnitur', 'ATK'.</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-300"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white">Status Aset</h4>
                            <p class="mt-1 text-sm text-gray-400">
                                <span class="font-bold text-green-300">Aktif:</span> Siap digunakan.<br>
                                <span class="font-bold text-yellow-300">Perbaikan:</span> Sedang dalam perawatan.<br>
                                <span class="font-bold text-red-300">Rusak:</span> Tidak dapat digunakan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-8 md:col-span-2">
                <?php if($errors->any()): ?>
                    <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
                        <strong class="font-bold">Oops! Ada kesalahan:</strong>
                        <ul class="list-disc list-inside mt-2">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('assets.store')); ?>" method="POST" class="space-y-8">
                    <?php echo csrf_field(); ?> 
                    
                    <div>
                        <label for="name" class="block font-semibold text-sm text-gray-700">Nama Aset</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.737.563l8.28-3.372c.957-.39 1.686-1.249 1.686-2.262V5.25A2.25 2.25 0 0019.5 3h-4.318c-.597 0-1.17.237-1.591.659l-4.08 4.08a.75.75 0 00-.217 1.06l-.217-.217z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 5.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" /></svg>
                            </div>
                            <input id="name" class="block w-full pl-10 rounded-md border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus />
                        </div>
                    </div>

                    <div>
                        <label for="category" class="block font-semibold text-sm text-gray-700">Kategori</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" /></svg>
                            </div>
                            <input id="category" class="block w-full pl-10 rounded-md border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" type="text" name="category" value="<?php echo e(old('category')); ?>" required placeholder="cth: Elektronik, Furnitur" />
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block font-semibold text-sm text-gray-700">Status</label>
                        <select id="status" name="status" class="block mt-2 w-full rounded-md shadow-sm border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">
                            <option value="Aktif" <?php echo e(old('status') == 'Aktif' ? 'selected' : ''); ?>>Aktif</option>
                            <option value="Perbaikan" <?php echo e(old('status') == 'Perbaikan' ? 'selected' : ''); ?>>Perbaikan</option>
                            <option value="Rusak" <?php echo e(old('status') == 'Rusak' ? 'selected' : ''); ?>>Rusak</option>
                        </select>
                    </div>

                    <div>
                        <label for="location" class="block font-semibold text-sm text-gray-700">Lokasi</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                            </div>
                            <input id="location" class="block w-full pl-10 rounded-md border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" type="text" name="location" value="<?php echo e(old('location')); ?>" required placeholder="cth: Lantai 5, Gudang" />
                        </div>
                    </div>

                    <div>
                        <label for="quantity" class="block font-semibold text-sm text-gray-700">Kuantitas</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" /></svg>
                            </div>
                            <input id="quantity" class="block w-full pl-10 rounded-md border-gray-300 bg-gray-50 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" type="number" name="quantity" value="<?php echo e(old('quantity', 1)); ?>" required min="1" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-8 border-t border-gray-200">
                        <a href="<?php echo e(route('assets.index')); ?>" class="text-sm font-semibold text-gray-600 hover:text-gray-900 mr-4 transition">
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 
                                       bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 
                                       border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                                       shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                            Simpan Aset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventaris-aset\resources\views/assets/create.blade.php ENDPATH**/ ?>