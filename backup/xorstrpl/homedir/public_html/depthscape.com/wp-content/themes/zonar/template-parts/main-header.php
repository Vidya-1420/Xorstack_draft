<?php $zonar_options = get_option('zonar'); ?>
 <!-- navigation menu-->
                <div class="nav-holder">
                    <div class="nav-holder-wrap but-hol">
                        <div class="nav-container fl-wrap">
                            <!-- nav -->
                            <nav class="nav-inner" id="menu">
                                <ul>
                                    <?php
									$defaults = array(
									'theme_location'  => 'top-menu',
									'menu'            => 'nav',
									'container'       => '',
									'container_class' => '',
									'menu_class'      => 'navbar-main-menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '%3$s',
									'depth'           => 0,
									'walker'          => new Zonar_Walker
									);
									if(has_nav_menu('top-menu')) {
									wp_nav_menu( $defaults );
									}
									else {
									};
									?>
                                </ul>
                            </nav>
                            <!-- nav end-->
                        </div>
                        <div class="nav-footer"><span>
						<?php $zonar_copy = Zonar_AfterSetupTheme::return_thme_option('copyright');
							 echo $zonar_copy;
						?> </span></div>
                        <div class="nav-holder-wrap_line"></div>
                        <div class="nav-holder-wrap_dec"></div>
                    </div>
                </div>
                <div class="nav-overlay"></div>
                <!-- navigation menu end  -->