<div class="admin-header">
    <div>
        <a href="#" class="header-text" onclick="openMenu()">

        </a>
        <a href="/" class="header-text">
            <img src="<?php echo e(asset('images/home.png')); ?>" alt="" />
        </a>
      </div>
    <?php if(session()->has('admin')): ?>
        <img src="<?php echo e(asset('images/logout.png')); ?>" alt="" onclick="logout()" class="header-text"/>
    <?php endif; ?>
</div>
<script>
    const logout = async () => {
        const result = await fetch('/logout', {
            method: 'DELETE',
            headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'}
        })
        if(result){
            window.location.href= "/"
        }
    }
    const openMenu = () => {
        document.getElementById('admin-left').style.display = 'block'
        document.getElementById('admin-left').style.top = 0
    }
</script>
<?php /**PATH /home/mesto/Documents/works/creativehubs/resources/views//adminHeader.blade.php ENDPATH**/ ?>