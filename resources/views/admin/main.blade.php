<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    @include('admin.main_preload')

    @yield('head')
</head>

<body>
    <!-- Paste this code after body tag -->
    {{-- <div class="se-pre-con"></div> --}}
    <!-- Ends -->

    <!--
    theme-tradewind
    theme-monalisa
    theme-cyan
    theme-indigo
    theme-purple
    theme-blue
    theme-black
    theme-orange
    theme-blush
    theme-red
    -->

    <div id="mytask-layout" class="theme-pink">

        @include('admin.main_sidebar')

        <div class="main px-lg-2 px-md-2">
            <!-- Header -->
            @include('admin.main_header')

            <!-- Content -->
            @yield('main-container')

           
        </div>

    </div>

    @include('admin.main_scripts')
    <script>
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\u0100-\uFFFF\w\-]/g, '-') // Remove all non-word chars ( fix for UTF-8 chars )
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, ''); // Trim - from end of text
        }
    </script>

    @yield('js')
</body>

</html>
