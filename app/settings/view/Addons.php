<div class="wp-wpew-extensions-list">
    <h2 class="addon-list-heading">
        <?php _e('WPEW Addons List', 'wpew'); ?>
    </h2>
    
    <?php

    $site_url = 'https://wpqxtheme.com/';
    $config = [
        [
            "name"=> "Animated Headine",
            "path"=> "animated-headine",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ],
        [
            "name"=> "Count Down",
            "path"=> "countdown",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ],   
        [
            "name"=> "Media Card",
            "path"=> "media-card",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ],   
        [
            "name"=> "Online Delivery",
            "path"=> "online-delivery",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ],   
        [
            "name"=> "Photo Gallery",
            "path"=> "photo-gallery",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ],   
        [
            "name"=> "Post Blog",
            "path"=> "post-blog",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ],   
        [
            "name"=> "Pricing Table",
            "path"=> "pricing-table",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
        [
            "name"=> "Products Category List",
            "path"=> "products-category-list",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
        [
            "name"=> "Products Category Megamenu",
            "path"=> "products-category-megamenu",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
        [
            "name"=> "Products List",
            "path"=> "products-list",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
        [
            "name"=> "Shop Banner",
            "path"=> "shop-banner",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
        [
            "name"=> "Time Line",
            "path"=> "time-line",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
        [
            "name"=> "Tree Diagram",
            "path"=> "tree-diagram",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
        [
            "name"=> "Wpew Table",
            "path"=> "wpew-table",
            "useability" => "Free",
            "description" => "Make your addon easy and cool",
            "url"=> $site_url.'animated-headine',
        ], 
    ];
    

    if (is_array($config) && count($config)){ ?>
        <div class="wp-list-table widefat plugin-install">
            <?php foreach ( $config as $basName => $addon ) { ?>

                <div class="plugin-card">
                    <div class="name column-name">
                        <h2><?php echo $addon['name']; ?></h2>
                        <p><?php echo $addon['description']; ?></p>
                    </div>
                </div>

            <?php } ?>
        </div>
        <?php
    }
    ?>
</div>
