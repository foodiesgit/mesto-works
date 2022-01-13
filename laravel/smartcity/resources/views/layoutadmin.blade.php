<!DOCTYPE html>
<html lang="en">
<head>
    @include('/partials.head')
</head>
<body class="defult-home" id="default-home">
    <div id="scrollUp" class="green-color">
        <i class="fa fa-angle-up"></i>
    </div>

    <header>@include('/partials.adminHeader')</header>
    <div class="admin-page" id="admin-page">
        <section class="admin-left" id="admin-left">@include('/partials.adminMenu')</section>
        <section  class="admin-right">@yield('content')</section>
    </div>
    <script>
        const hrefArray = document.location.href.split('/')
        if(hrefArray[hrefArray.length - 2] === 'admin'){
            document.getElementById(hrefArray[hrefArray.length - 1]).classList.add('active-list')
        }
        document.getElementById('admin-left').addEventListener('click', (e) => {
            document.getElementById('admin-left').style.display = 'none'
        })
    </script>
    @include('/partials.script')
</body>
</html>
