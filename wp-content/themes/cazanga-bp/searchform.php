<form action="/" method="get" accept-charset="utf-8" id="searchform" role="search">
    <label for="s">Pesquise aqui</label>
    <div class="input-group">
        <input type="text" name="s" id="s" class="form-control" value="<?php the_search_query(); ?>" />
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="searchsubmit"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>