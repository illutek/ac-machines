<div id="wrap">
    <div class="container">
        
        <!-- #header -->
        <div id="header" class="sixteen columns clearfix">
            <div id="logo" class="seven columns">
                    <?php if ($logo): ?>
                      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                      </a>
                    <?php endif; ?>
            </div>
        <div id="navigation" class="eight columns">
         <!-- #navigation -->
                <div class="menu-header">
                <?php if ($page['header']) : ?>
                    <?php print drupal_render($page['header']); ?>
                    <?php else : ?>
                    <?php 
                    if (module_exists('i18n_menu')) {
                    $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
                    } else { 
                    $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); 
                    } ?>
                    <div class="content">
                    <?php print drupal_render($main_menu_tree); ?>
                    </div>
                <?php endif; ?>
                </div>                
        </div>  <!-- /#navigation --> 
            
        </div><!-- /#header -->
        
        <div class="clear"></div>        
        
        <?php if ($page['sidebar_first']): ?>
        <!-- #sidebar-first -->
        <div id="sidebar-first" class="four columns">
            <?php print render($page['sidebar_first']); ?>
        </div><!-- /#sidebar-first -->
        <?php endif; ?>
        
        <?php if ($page['sidebar_first'] && $page['sidebar_second']) { ?>
        <div id="content" class="eight columns">
        <?php } elseif ($page['sidebar_first'] || $page['sidebar_second']) { ?>
        <div id="content" class="eleven columns">
		<?php } else { ?>
        <div id="content" class="sixteen columns clearfix">    
        <?php } ?>
        
            <?php if ($messages): ?>
                <div id="messages">
                <?php print $messages; ?>
                </div><!-- /#messages -->
            <?php endif; ?>
            
            <div id="main">
            
                <?php print render($title_prefix); ?>
                
                <?php if ($title): ?>
                <h1 class="title" id="page-title">
                  <?php print $title; ?>
                </h1>
                <?php endif; ?>
                
                <?php print render($title_suffix); ?>
                
                <?php if ($tabs): ?>
                <div class="tabs">
                  <?php print render($tabs); ?>
                </div>
                <?php endif; ?>
                
                <?php print render($page['help']); ?>
                
                <?php if ($action_links): ?>
                <ul class="action-links">
                  <?php print render($action_links); ?>
                </ul>
                <?php endif; ?>
                
                <?php print render($page['content']); ?>
                
            </div>
        
        </div><!-- /#content -->
        
        <?php if ($page['sidebar_second']): ?>
        <!-- #sidebar-first -->
        <div id="sidebar-second" class="four columns">
            <?php print render($page['sidebar_second']); ?>
        </div><!-- /#sidebar-first -->
        <?php endif; ?>
        
        <div class="clear"></div>
        
        <?php if ($page['featured_left'] || $page['featured_right']): ?>
        <!-- #featured -->
        <div id="featured" class="sixteen columns clearfix">
            
            <?php if ($page['featured_left'] && $page['featured_right']) { ?>
            <div class="one_half">
            <?php print render($page['featured_left']); ?>
            </div>
            
            <div class="one_half last">
            <?php print render($page['featured_right']); ?>
            </div>
            <?php } else { ?>
                
            <?php print render($page['featured_left']); ?>
            <?php print render($page['featured_right']); ?>
            
            <?php } ?>
            
        </div><!-- /#featured -->
        <?php endif; ?>
        
	</div>
        
	<div id="footer" >
        <div class="container">
        	<div class="sixteen columns clearfix">
                
                <?php if ($page['footer']): print render($page['footer']); endif; ?>
                
                <div class="clear"></div>
                
                <div id="credits">
                <?php print(date('Y') . ' ');?>
                <?php if (!empty($site_name)):?>
                <?php print $site_name;?>- This is a Free Drupal Theme<br/>
                <?php endif;?>
                Ported to Drupal for the Open Source Community by <a href="http://www.drupalizing.com" target="_blank">Drupalizing</a>, a Project of <a href="http://www.morethanthemes.com" target="_blank">More than (just) Themes</a>. Original design by <a href="http://www.simplethemes.com/" target="_blank">Simple Themes</a>.
                </div>
        	</div>
        </div><!-- /.container -->
    </div> <!-- /#footer -->
    
</div> <!-- /#wrap -->