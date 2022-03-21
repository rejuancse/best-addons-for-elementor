<div class="wp-eafe-extensions-list">
    <h2 class="addon-list-heading">
        <?php _e('EAFE Addons List', 'eafe'); ?>
    </h2>
    
    <?php
    $site_url = 'https://wpqxtheme.com/';
    $config = [
        [
            "name"          => "Animated Headine",
            "path"          => "animated-headine",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/headline.png',
            "url"           => $site_url.'animated-headine',
        ],
        [
            "name"          => "Breaking News",
            "path"          => "breaking-news",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/headline.png',
            "url"           => $site_url.'breaking-news',
        ],

        [
            "name"          => "Call Contact Form",
            "path"          => "call-contact-form",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/headline.png',
            "url"           => $site_url.'call-contact-form',
        ],
        [
            "name"          => "Count Down",
            "path"          => "countdown",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/headline.png',
            "url"           => $site_url.'countdown',
        ],

        [
            "name"          => "Events list",
            "path"          => "events-list",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/headline.png',
            "url"           => $site_url.'events-list',
        ],
        [
            "name"          => "EAFE Features",
            "path"          => "eafe-features",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/headline.png',
            "url"           => $site_url.'eafe-features',
        ],
        [
            "name"          => "Media Card",
            "path"          => "media-card",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/cards.png',
            "url"           => $site_url.'media-card',
        ],   
        [
            "name"          => "Online Delivery",
            "path"          => "online-delivery",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/delivery-man.png',
            "url"           => $site_url.'online-delivery',
        ],  

        [
            "name"          => "Photo Gallery",
            "path"          => "photo-gallery",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/price-tag.png',
            "url"           => $site_url.'photo-gallery',
        ],

        [
            "name"          => "Post Ajax Search",
            "path"          => "post-ajax-search",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/price-tag.png',
            "url"           => $site_url.'post-ajax-search',
        ],

        [
            "name"          => "Products Category List",
            "path"          => "products-category-list",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/price-tag.png',
            "url"           => $site_url.'products-category-list',
        ],

        [
            "name"          => "Shop Banner",
            "path"          => "shop-banner",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/price-tag.png',
            "url"           => $site_url.'animated-headine',
        ],  
        
        [
            "name"          => "EAFE Gmap",
            "path"          => "eafe-gmap",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/countdown.png',
            "url"           => $site_url.'eafe-gmap',
        ],   
        [
            "name"          => "Member",
            "path"          => "member",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/gallery.png',
            "url"           => $site_url.'member',
        ],   
        [
            "name"          => "EAFE Title",
            "path"          => "eafe-title",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/blog.png',
            "url"           => $site_url.'eafe-title',
        ],   
        // [
        //     "name"          => "Pricing Table",
        //     "path"          => "pricing-table",
        //     "useability"    => "go pro",
        //     "description"   => "Make your addon easy and cool",
        //     "icon"          => EAFE_DIR_URL .'assets/images/icons/pricing.png',
        //     "url"           => $site_url.'animated-headine',
        // ], 
        // [
        //     "name"          => "Products Category List",
        //     "path"          => "products-category-list",
        //     "useability"    => "go pro",
        //     "description"   => "Make your addon easy and cool",
        //     "icon"          => EAFE_DIR_URL .'assets/images/icons/note.png',
        //     "url"           => $site_url.'animated-headine',
        // ], 
        // [
        //     "name"          => "Products Category Megamenu",
        //     "path"          => "products-category-megamenu",
        //     "useability"    => "go pro",
        //     "description"   => "Make your addon easy and cool",
        //     "icon"          => EAFE_DIR_URL .'assets/images/icons/hamburger.png',
        //     "url"           => $site_url.'animated-headine',
        // ], 
        // [
        //     "name"          => "Products List",
        //     "path"          => "products-list",
        //     "useability"    => "go pro",
        //     "description"   => "Make your addon easy and cool",
        //     "icon"          => EAFE_DIR_URL .'assets/images/icons/box.png',
        //     "url"           => $site_url.'animated-headine',
        // ], 
        // [
        //     "name"          => "Time Line",
        //     "path"          => "time-line",
        //     "useability"    => "go pro",
        //     "description"   => "Make your addon easy and cool",
        //     "icon"          => EAFE_DIR_URL .'assets/images/icons/timeline.png',
        //     "url"           => $site_url.'animated-headine',
        // ], 
        // [
        //     "name"          => "Tree Diagram",
        //     "path"          => "tree-diagram",
        //     "useability"    => "go pro",
        //     "description"   => "Make your addon easy and cool",
        //     "icon"          => EAFE_DIR_URL .'assets/images/icons/hierarchical.png',
        //     "url"           => $site_url.'animated-headine',
        // ], 
        // [
        //     "name"          => "EAFE Table",
        //     "path"          => "eafe-table",
        //     "useability"    => "go pro",
        //     "description"   => "Make your addon easy and cool",
        //     "icon"          => EAFE_DIR_URL .'assets/images/icons/table.png',
        //     "url"           => $site_url.'animated-headine',
        // ], 
    ];
 
    if (is_array($config) && count($config)){ ?>
        <div class="eafe-list-table widefat plugin-install">
            <?php foreach ( $config as $basName => $addon ) { ?>

                <div class="plugin-card">
                    
                    <?php if( $addon['useability'] === 'Free' ) { ?>
                        <span class="useability <?php echo $addon['useability']; ?>">
                            <?php echo $addon['useability']; ?>
                        </span>
                    <?php }else { ?>
                        <a class="useability <?php echo $addon['useability']; ?>" href="<?php echo $site_url; ?>" target="_blank">
                            <span><?php echo $addon['useability']; ?></span>
                        </a>
                    <?php } ?>
                    
                    <div class="name column-name">
                        <div class="icons"><img src="<?php echo $addon['icon']; ?>" alt=""></div>
                        <div class="content">
                            <h2><?php echo $addon['name']; ?></h2>
                            <p><?php echo $addon['description']; ?></p>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
        <?php
    } ?>

</div>
