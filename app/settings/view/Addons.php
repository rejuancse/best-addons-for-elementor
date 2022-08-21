<div class="wp-bafe-extensions-list">
    <h2 class="addon-list-heading">
        <?php _e('BAFE Addons List', 'bafe'); ?>
    </h2>
    
    <?php
    $site_url = 'https://wpqxtheme.com/';
    $config = [

        [
            "name"          => "Animated Headine",
            "path"          => "animated-headine",
            "useability"    => "Free",
            "description"   => "Make your addons with animation and dynamic",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/h.png',
            "url"           => $site_url.'animated-headine',
        ],

        [
            "name"          => "Breaking News",
            "path"          => "breaking-news",
            "useability"    => "Free",
            "description"   => "Make your News/Magazines best and cool",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/news.png',
            "url"           => $site_url.'breaking-news',
        ],

        [
            "name"          => "Call Contact Form",
            "path"          => "call-contact-form",
            "useability"    => "Free",
            "description"   => "Use contact form popup with call to actions",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/phone-contact.png',
            "url"           => $site_url.'call-contact-form',
        ],
        [
            "name"          => "Count Down",
            "path"          => "countdown",
            "useability"    => "Free",
            "description"   => "Use this addons for date/time countdown",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/countdown.png',
            "url"           => $site_url.'countdown',
        ],

        [
            "name"          => "Events list",
            "path"          => "events-list",
            "useability"    => "Free",
            "description"   => "Make your upcoming/previous events list.",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/event.png',
            "url"           => $site_url.'events-list',
        ],

        [
            "name"          => "BAFE Features",
            "path"          => "bafe-features",
            "useability"    => "Free",
            "description"   => "Make your features single list",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/extra-features.png',
            "url"           => $site_url.'bafe-features',
        ],

        [
            "name"          => "Media Card",
            "path"          => "media-card",
            "useability"    => "Free",
            "description"   => "Make your media card more informative",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/card-exchange.png',
            "url"           => $site_url.'media-card',
        ],

        [
            "name"          => "Online Delivery Banner",
            "path"          => "online-delivery",
            "useability"    => "Free",
            "description"   => "Simple banner is more beautiful",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/delivery-man.png',
            "url"           => $site_url.'online-delivery',
        ],  

        [
            "name"          => "Photo Gallery",
            "path"          => "photo-gallery",
            "useability"    => "Free",
            "description"   => "Make your photo gallery with popup view",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/photo-gallery.png',
            "url"           => $site_url.'photo-gallery',
        ],

        [
            "name"          => "Post Ajax Search",
            "path"          => "post-ajax-search",
            "useability"    => "Free",
            "description"   => "aJax post search makes it best to pick post",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/search-bar.png',
            "url"           => $site_url.'post-ajax-search',
        ],

        [
            "name"          => "Products Category List",
            "path"          => "products-category-list",
            "useability"    => "Free",
            "description"   => "Product category list with more functionality",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/category.png',
            "url"           => $site_url.'products-category-list',
        ], 
        
        [
            "name"          => "Restaurant Menu",
            "path"          => "restaurant-menu",
            "useability"    => "Free",
            "description"   => "Make your Menu the easiest way",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/restaurant-menu.png',
            "url"           => $site_url.'restaurant-menu',
        ], 

        [
            "name"          => "Restaurant Schedule",
            "path"          => "restaurant-schedule",
            "useability"    => "Free",
            "description"   => "Start and End time is really important, so Use this addons",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/restaurant-table.png',
            "url"           => $site_url.'restaurant-schedule',
        ],
        
        [
            "name"          => "Shop Banner",
            "path"          => "shop-banner",
            "useability"    => "Free",
            "description"   => "This banner can make beautiful design with your shop view",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/programming-flag.png',
            "url"           => $site_url.'animated-headine',
        ], 

        [
            "name"          => "Special Menu",
            "path"          => "special-menu",
            "useability"    => "Free",
            "description"   => "List your Resturent special menu with total price",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/cuisine.png',
            "url"           => $site_url.'special-menu',
        ], 

        [
            "name"          => "Member",
            "path"          => "member",
            "useability"    => "Free",
            "description"   => "Build single or multiple members list, this addons is best",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/member.png',
            "url"           => $site_url.'member',
        ],   

        [
            "name"          => "BAFE Title",
            "path"          => "bafe-title",
            "useability"    => "Free",
            "description"   => "Make your Title with subtitle best and cool",
            "icon"          => BAFE_DIR_URL .'assets/images/icons/title.png',
            "url"           => $site_url.'bafe-title',
        ],
    ];
 
    if (is_array($config) && count($config)){ ?>
        <div class="bafe-list-table widefat plugin-install">
            <?php foreach ( $config as $basName => $addon ) { ?>
                <div class="plugin-card">
                    <?php if( $addon['useability'] === 'Free' ) { ?>
                        <span class="useability <?php echo esc_attr($addon['useability']); ?>">
                            <?php echo esc_html($addon['useability']); ?>
                        </span>
                    <?php }else { ?>
                        <a class="useability <?php echo esc_attr($addon['useability']); ?>" href="<?php echo esc_url($site_url); ?>" target="_blank">
                            <span><?php echo esc_html($addon['useability']); ?></span>
                        </a>
                    <?php } ?>
                    
                    <div class="name column-name">
                        <div class="icons"><img src="<?php echo esc_url($addon['icon']); ?>" alt=""></div>
                        <div class="content">
                            <h2><?php echo esc_html($addon['name']); ?></h2>
                            <p><?php echo esc_html($addon['description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
    } ?>
</div>
