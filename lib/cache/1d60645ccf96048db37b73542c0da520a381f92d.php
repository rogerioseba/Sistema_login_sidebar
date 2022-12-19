
<?php $__env->startSection('content'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tags</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item active">Tags</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <a href="cadastrar_tag" class="btn btn-success">Cadastrar Tag</a>
                        </div>
                        <div class="card-body profile-card pt-1 d-flex flex-column align-items-center">
                            <p class="card-title">Tags Cadastradas: <br>
                                <span><small>Clique em uma para editar</small></span></p>

                           <?php if(is_array($tags) || is_object($tags)): ?>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <form method="post" class="mt-2" action="edit_tag">
                                    <i class="bi bi-link"> - </i>
                                        <input type="hidden" name="tag" value="<?php echo e($tag->tag); ?>">
                                        <button type="submit" class="btn btn-primary btn-sm rounded-pill"><?php echo e($tag->tag); ?></button>
                                    </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tippet_Tag\views/tags.blade.php ENDPATH**/ ?>