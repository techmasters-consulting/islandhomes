{!! Theme::partial('header') !!}

<div id="app">
    <div id="ismain-homes">
        {!! Theme::content() !!}
    </div>
</div>

{!! Theme::partial('footer') !!}

{!! Theme::footer() !!}
<script>

    if ($.cookie('IslandNewsLetter') !== 'true' ) {
        checkCookie();
    }
</script>
