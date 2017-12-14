<?php
/**
  * @package WP_Dallas_Lite
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_menu', 'social_sharing_options' );

function social_share_menu_item()
{
  add_submenu_page("options-general.php", "Social Share", "Social Share", "manage_options", "social-share", "social_share_page"); 
}

add_action("admin_menu", "social_share_menu_item");


function social_share_page()
{
   ?>
      <div class="wrap">
         <h1>Social Sharing Options</h1>
 
         <form method="post" action="options.php">
            <?php
               settings_fields("social_share_config_section");
 
               do_settings_sections("social-share");
                
               submit_button(); 
            ?>
         </form>
      </div>
   <?php
}

function social_share_settings()
{
    add_settings_section("social_share_config_section", "", null, "social-share");
 
    add_settings_field("social-share-facebook", "Do you want to display Facebook share button?", "social_share_facebook_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-twitter", "Do you want to display Twitter share button?", "social_share_twitter_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-linkedin", "Do you want to display LinkedIn share button?", "social_share_linkedin_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-reddit", "Do you want to display Reddit share button?", "social_share_reddit_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-email", "Do you want to display email share button?", "social_share_email_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-google-plus", "Do you want to display Google plush	share button?", "social_share_google_plus_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-pinterest", "Do you want to display pinterest share button?", "social_share_pinterest_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-delicious", "Do you want to display delicious share button?", "social_share_delicious_checkbox", "social-share", "social_share_config_section");
	add_settings_field("social-share-stumbleupon", "Do you want to display stumbleupon share button?", "social_share_stumbleupon_checkbox", "social-share", "social_share_config_section");
	
	
	
 
    register_setting("social_share_config_section", "social-share-facebook");
    register_setting("social_share_config_section", "social-share-twitter");
    register_setting("social_share_config_section", "social-share-linkedin");
    register_setting("social_share_config_section", "social-share-reddit");
	register_setting("social_share_config_section", "social-share-email");
	register_setting("social_share_config_section", "social-share-google-plus");
	register_setting("social_share_config_section", "social-share-pinterest");
	register_setting("social_share_config_section", "social-share-delicious");
	register_setting("social_share_config_section", "social-share-stumbleupon");
	
	
}
 
function social_share_facebook_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-facebook" value="1" <?php checked(1, get_option('social-share-facebook'), true); ?> /> Check for Yes
   <?php
}

function social_share_twitter_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-twitter" value="1" <?php checked(1, get_option('social-share-twitter'), true); ?> /> Check for Yes
   <?php
}

function social_share_linkedin_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-linkedin" value="1" <?php checked(1, get_option('social-share-linkedin'), true); ?> /> Check for Yes
   <?php
}

function social_share_reddit_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-reddit" value="1" <?php checked(1, get_option('social-share-reddit'), true); ?> /> Check for Yes
   <?php
}
function social_share_email_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-email" value="1" <?php checked(1, get_option('social-share-email'), true); ?> /> Check for Yes
   <?php
}
function social_share_google_plus_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-google-plus" value="1" <?php checked(1, get_option('social-share-google-plus'), true); ?> /> Check for Yes
   <?php
}
function social_share_pinterest_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-pinterest" value="1" <?php checked(1, get_option('social-share-pinterest'), true); ?> /> Check for Yes
   <?php
}
function social_share_delicious_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-delicious" value="1" <?php checked(1, get_option('social-share-delicious'), true); ?> /> Check for Yes
   <?php
}
function social_share_stumbleupon_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-stumbleupon" value="1" <?php checked(1, get_option('social-share-stumbleupon'), true); ?> /> Check for Yes
   <?php
}


 
add_action("admin_init", "social_share_settings");


function add_social_share_icons($content)
{
    $html = "<div class='post-social-share'><div class='share-on'>Share on: </div>";

    global $post;

    $url = get_permalink($post->ID);
    $url = esc_url($url);
	$title = str_replace( ' ', '%20', get_the_title());
	$twitterURL = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url.'&amp;';
	//print_r($post->title);exit;

    if(get_option("social-share-facebook") == 1)
    {
        $html = $html . "<div class='facebook'><a target='_blank' href='http://www.facebook.com/sharer.php?u=" . $url . "'><i class='fa fa-facebook' aria-hidden='true'></i></a></div>";
    }

    if(get_option("social-share-twitter") == 1)
    {
        $html = $html . "<div class='twitter'><a target='_blank' href='".$twitterURL."' ><i class='fa fa-twitter' aria-hidden='true'></i></a></div>";
    }

    if(get_option("social-share-linkedin") == 1)
    {
        $html = $html . "<div class='linkedin'><a target='_blank' href='http://www.linkedin.com/shareArticle?url=" . $url . "'><i class='fa fa-linkedin' aria-hidden='true'></i></a></div>";
    }

    if(get_option("social-share-reddit") == 1)
    {
        $html = $html . "<div class='reddit'><a target='_blank' href='http://reddit.com/submit?url=" . $url . "'><i class='fa fa-reddit-alien' aria-hidden='true'></i></a></div>";
    }
	
	if(get_option("social-share-stumbleupon") == 1)
    {
        $html = $html . "<div class='reddit'><a target='_blank' href='https://www.stumbleupon.com/submit?url=" . $url . "'><i class='fa fa-stumbleupon' aria-hidden='true'></i></a></div>";
    }
	if(get_option("social-share-delicious") == 1)
    {
        $html = $html . "<div class='reddit'><a target='_blank' href='https://del.icio.us/submit?url=" . $url . "'><i class='fa fa-delicious' aria-hidden='true'></i></a></div>";
    }
	if(get_option("social-share-pinterest") == 1)
    {
        $html = $html . "<div class='reddit'><a target='_blank' href='https://pinterest.com/submit?url=" . $url . "'><i class='fa fa-pinterest' aria-hidden='true'></i></a></div>";
    }
	if(get_option("social-share-google-plus") == 1)
    {
        $html = $html . "<div class='reddit'><a target='_blank' href='https://plus.google.com/share?url=" . $url . "'><i class='fa fa-google-plus' aria-hidden='true'></i></a></div>";
    }
	if(get_option("social-share-email-checkbox") == 1)
    {
        $html = $html . "<div class='reddit'><a target='_blank' href='mailto:?subject=".$title."' title='Share by email'><i class='fa fa-google-plus' aria-hidden='true'></i></a></div>";
    }
	

    $html = $html . "<div class='clear'></div></div>";

    return $content = $content . $html;
}

add_filter("the_content", "add_social_share_icons");