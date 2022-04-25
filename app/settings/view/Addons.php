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
            "description"   => "Make your addons with animation and dynamic",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/h.png',
            "url"           => $site_url.'animated-headine',
        ],

        [
            "name"          => "Breaking News",
            "path"          => "breaking-news",
            "useability"    => "Free",
            "description"   => "Make your News/Magazines easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/news.png',
            "url"           => $site_url.'breaking-news',
        ],

        [
            "name"          => "Call Contact Form",
            "path"          => "call-contact-form",
            "useability"    => "Free",
            "description"   => "Use contact form popup with call to actions",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/phone-contact.png',
            "url"           => $site_url.'call-contact-form',
        ],
        [
            "name"          => "Count Down",
            "path"          => "countdown",
            "useability"    => "Free",
            "description"   => "Use this addons for date/time countdown",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/countdown.png',
            "url"           => $site_url.'countdown',
        ],

        [
            "name"          => "Events list",
            "path"          => "events-list",
            "useability"    => "Free",
            "description"   => "Make your upcoming/previous events list.",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/event.png',
            "url"           => $site_url.'events-list',
        ],

        [
            "name"          => "EAFE Features",
            "path"          => "eafe-features",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/extra-features.png',
            "url"           => $site_url.'eafe-features',
        ],

        [
            "name"          => "Media Card",
            "path"          => "media-card",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/card-exchange.png',
            "url"           => $site_url.'media-card',
        ],

        [
            "name"          => "Online Delivery Banner",
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
            "icon"          => EAFE_DIR_URL .'assets/images/icons/photo-gallery.png',
            "url"           => $site_url.'photo-gallery',
        ],

        [
            "name"          => "Post Ajax Search",
            "path"          => "post-ajax-search",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/search-bar.png',
            "url"           => $site_url.'post-ajax-search',
        ],

        [
            "name"          => "Products Category List",
            "path"          => "products-category-list",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/category.png',
            "url"           => $site_url.'products-category-list',
        ], 
        
        [
            "name"          => "Restaurant Menu",
            "path"          => "restaurant-menu",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/restaurant-menu.png',
            "url"           => $site_url.'restaurant-menu',
        ], 

        [
            "name"          => "Restaurant Schedule",
            "path"          => "restaurant-schedule",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/restaurant-table.png',
            "url"           => $site_url.'restaurant-schedule',
        ],
        
        [
            "name"          => "Shop Banner",
            "path"          => "shop-banner",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/programming-flag.png',
            "url"           => $site_url.'animated-headine',
        ], 

        [
            "name"          => "Special Menu",
            "path"          => "special-menu",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/cuisine.png',
            "url"           => $site_url.'special-menu',
        ], 

        [
            "name"          => "Member",
            "path"          => "member",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/member.png',
            "url"           => $site_url.'member',
        ],   

        [
            "name"          => "EAFE Title",
            "path"          => "eafe-title",
            "useability"    => "Free",
            "description"   => "Make your addon easy and cool",
            "icon"          => EAFE_DIR_URL .'assets/images/icons/title.png',
            "url"           => $site_url.'eafe-title',
        ],
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
