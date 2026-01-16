<script>
    // success message popup notification
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}", "Success");
    @endif

    // info message popup notification
    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}", "Info");
    @endif

    // warning message popup notification
    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}", "Warning");
    @endif

    // error message popup notification
    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}", "Error");
    @endif
</script>
