<form role="search" method="get" class="form-inline search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _x( 'Search for:', 'label' ); ?></span>
        <input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search posts &hellip;', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <input type="submit" class="btn btn-default search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
</form>
