@if (Session::has('message') > 0)
    <div class="alert {{Session::get('alert-type')}} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        {{ Session::get('message')[0] }}
    </div>
@endif

<script>
    setTimeout(function() {
        $('.alert-dismissable').fadeOut('slow');
    }, 2000);
</script>