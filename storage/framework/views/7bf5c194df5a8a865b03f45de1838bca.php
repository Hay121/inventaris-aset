

<?php $__env->startSection('title', 'Dashboard Inventaris'); ?>

<?php $__env->startSection('header'); ?>
    <div class="flex flex-col md:flex-row justify-between items-center">
        <span>Dashboard Inventaris</span>
        <a href="<?php echo e(route('assets.create')); ?>" 
           class="w-full md:w-auto mt-4 md:mt-0 inline-flex items-center justify-center px-5 py-2 
                  bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 
                  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                  shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
            + Tambah Aset Baru
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div x-data="{ openModal: false, deleteUrl: '' }">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-blue-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <h3 class="text-sm font-medium text-gray-500">Total Aset</h3>
            <p class="mt-1 text-3xl font-semibold text-gray-900"><?php echo e($dashboardStats['total_assets']); ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-green-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <h3 class="text-sm font-medium text-gray-500">Total Kuantitas</h3>
            <p class="mt-1 text-3xl font-semibold text-gray-900"><?php echo e($dashboardStats['total_quantity']); ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-indigo-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <h3 class="text-sm font-medium text-gray-500">Jumlah Kategori</h3>
            <p class="mt-1 text-3xl font-semibold text-gray-900"><?php echo e($dashboardStats['categories']); ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-yellow-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
            <h3 class="text-sm font-medium text-gray-500">Jumlah Lokasi</h3>
            <p class="mt-1 text-3xl font-semibold text-gray-900"><?php echo e($dashboardStats['locations']); ?></p>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg">
        <div class="p-6">
            
            <?php if(session('success')): ?>
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm border border-green-200">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('warning')): ?>
                <div class="mb-4 p-4 bg-orange-100 text-orange-800 rounded-lg shadow-sm border border-orange-200">
                    <?php echo e(session('warning')); ?>

                </div>
            <?php endif; ?>

            <div class="overflow-x-auto border rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Nama Aset</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Lokasi</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Kuantitas</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="transition-all duration-150 hover:bg-indigo-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($asset->name); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($asset->category); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        <?php echo e($asset->status == 'Aktif' ? 'bg-green-100 text-green-800' : ''); ?>

                                        <?php echo e($asset->status == 'Perbaikan' ? 'bg-yellow-100 text-yellow-800' : ''); ?>

                                        <?php echo e($asset->status == 'Rusak' ? 'bg-red-100 text-red-800' : ''); ?>">
                                        <?php echo e($asset->status); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($asset->location); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($asset->quantity); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="<?php echo e(route('assets.edit', $asset->id)); ?>" class="text-indigo-600 hover:text-indigo-900 font-medium transition-all duration-150">Edit</a>
                                    
                                    <button 
                                        type="button" 
                                        @click="openModal = true; deleteUrl = '<?php echo e(route('assets.destroy', $asset->id)); ?>'"
                                        class="text-red-600 hover:text-red-900 font-medium ml-4 transition-all duration-150">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    Tidak ada data aset.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6">
                <?php echo e($assets->withQueryString()->links()); ?>

            </div>
        </div>
    </div>

    <div 
        x-show="openModal" 
        x-cloak 
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 overflow-y-auto bg-black/60 backdrop-blur-sm" 
    >
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
            
            <div 
                @click.outside="openModal = false"
                x-show="openModal"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle 
                       transition-all transform bg-white/95 backdrop-blur-lg shadow-xl rounded-2xl border border-gray-200/50"
            >
                <h3 class="text-lg font-bold leading-6 text-gray-900">
                    Konfirmasi Hapus Aset
                </h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-600">
                        Apakah Anda yakin ingin menghapus aset ini? Data yang sudah dihapus tidak dapat dikembalikan.
                    </p>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <form :action="deleteUrl" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        
                        <button 
                            type="button" 
                            @click="openModal = false"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border 
                                   border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none transition-all duration-150"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit" 
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border 
                                   border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none ml-3 transition-all duration-150"
                        >
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventaris-aset\resources\views/assets/index.blade.php ENDPATH**/ ?>