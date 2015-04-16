<?php
	$version = "1.3.5";	
	$author = "EngineThemes";	
	$themename = "Arch";
	$shortname = "arch";	
	$help = "http://engine.themecss.com/forum/";

	$options = array (

	array( "name" => "Theme Settings", "type" => "top_section"),
	array( "type" => "close"),	

	array( "name" => "General",
			"type" => "section",
			"icon" => "icon-cog"),
			
	array( "type" => "open"),

	array( "name" => "Responsive Layout",
			"desc" => "Disable Responsive Effect",
			"id" => $shortname."_site_layout",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Header Widget",
			"desc" => "Hide your header widget",
			"id" => $shortname."_header_widget",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Favicon",
			"desc" => "Enter your website favicon",
			"id" => $shortname."_favicon",
			"type" => "img_preview",
			"std" => ""),
			
	array( "name" => "Logo",
			"desc" => "Enter your website logo",
			"id" => $shortname."_logo",
			"type" => "img_preview",
			"std" => ""),	

	array( "name" => "Descriptions",
			"desc" => "Enter your meta descriptions",
			"id" => $shortname."_meta_descriptions",
			"type" => "text",
			"std" => ""),

	array( "name" => "Keywords",
			"desc" => "Enter your meta keywords",
			"id" => $shortname."_meta_keywords",
			"type" => "text",
			"std" => ""),	

	array( "name" => "Google Analytics Code",
			"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to your site's code before the closing &lt;body&gt; tag.",
			"id" => $shortname."_ga_code",
			"type" => "textarea",
			"std" => ""),

	array( "name" => "Custom CSS",
			"desc" => "Enter your custom CSS tags here",
			"id" => $shortname."_custom_css",
			"type" => "textarea",
			"std" => ""),

	array( "type" => "close"),

	array( "name" => "Background",
			"type" => "section",
			"icon" => "icon-sign-blank"),

	array( "name" => "Fallback Options", "type" => "headers"),

	array( "name" => "Background Fallback",
			"desc" => "Upload your background image fallback when page and post background is empty",
			"id" => $shortname."_theme_bgimage",
			"type" => "upload",
			"std" => ""),

	array( "name" => "Archive Background Image",
			"desc" => "Enter your archive page background image",
			"id" => $shortname."_archive_bgimage",
			"type" => "upload",
			"std" => ""),

	array( "name" => "Search Background Image",
			"desc" => "Enter your search page background image",
			"id" => $shortname."_search_bgimage",
			"type" => "upload",
			"std" => ""),

	array( "name" => "404 Background Image",
			"desc" => "Enter your 404 not found page background image",
			"id" => $shortname."_notfound_bgimage",
			"type" => "upload",
			"std" => ""),

	array( "name" => "Slider Options", "type" => "headers"),

	array( "name" => "Frontpage Slider",
			"desc" => "check this box if you want your slider display in homepage only",
			"id" => $shortname."_bg_homepage_slider",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Arrow navigation",
			"desc" => "Disable the arrow navigation of the slider",
			"id" => $shortname."_arrow_nav",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Slide Title",
			"desc" => "Check the box if you want to hide slide title",
			"id" => $shortname."_slide_title",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Title Link",
			"desc" => "check this box if you want your slider title unlink",
			"id" => $shortname."_title_link",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Image Ordering",
			"desc" => "Select your ordering style for your background images",
			"id" => $shortname."_bg_order",
			"type" => "select",
			"options" => array("ASC", "DESC"),
			"std" => ""),

	array( "name" => "Image Orderby",
			"desc" => "Select your orderby parameter for your background images",
			"id" => $shortname."_bg_orderby",
			"type" => "select",
			"options" => array("ID", "name", "date", "rand"),
			"std" => ""),

	array( "name" => "Slide Interval",
			"desc" => "Enter Length between transitions",
			"id" => $shortname."_slide_int",
			"type" => "text",
			"std" => "3000"),

	array( "name" => "Transition",
			"desc" => "Enter transitions effect you want (0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left)",
			"id" => $shortname."_slide_trans",
			"type" => "select",
			"options" => array("0", "1", "2", "3", "4", "5", "6", "7"),
			"std" => ""),

	array( "name" => "Transition Speed",
			"desc" => "Enter transition speed for background slider",
			"id" => $shortname."_slide_speed",
			"type" => "text",
			"std" => "700"),

	array( "name" => "Minimum Width",
			"desc" => "Minimum width allowed (in pixels)",
			"id" => $shortname."_min_width",
			"type" => "text",
			"std" => "0"),

	array( "name" => "Minimum Height",
			"desc" => "Minimum height allowed (in pixels)",
			"id" => $shortname."_min_height",
			"type" => "text",
			"std" => "0"),

	array( "name" => "Vertical Center",
			"desc" => "Vertically center background",
			"id" => $shortname."_vertical_center",
			"type" => "select",
			"options" => array("0", "1"),
			"std" => ""),

	array( "name" => "Horizontal Center",
			"desc" => "Horizontally center background",
			"id" => $shortname."_horizontal_center",
			"type" => "select",
			"options" => array("0", "1"),
			"std" => ""),

	array( "name" => "Fit Always",
			"desc" => "Image will never exceed browser width or height (Ignores min. dimensions)",
			"id" => $shortname."_fit_always",
			"type" => "select",
			"options" => array("0", "1"),
			"std" => ""),

	array( "name" => "Fit Portrait",
			"desc" => "Portrait images will not exceed browser height",
			"id" => $shortname."_fit_portrait",
			"type" => "select",
			"options" => array("0", "1"),
			"std" => ""),

	array( "name" => "Fit Landscape",
			"desc" => "Landscape images will not exceed browser width",
			"id" => $shortname."_fit_landscape",
			"type" => "select",
			"options" => array("0", "1"),
			"std" => ""),

	array( "type" => "close"),

	array( "name" => "Translations",
			"type" => "section",
			"icon" => "icon-file"),
			
	array( "type" => "open"),

	array( "name" => "Blog Options", "type" => "headers"),

	array( "name" => "Infinite Scroll Label",
			"desc" => "Enter your label for infinite scroll",
			"id" => $shortname."_infinite_label",
			"type" => "text",
			"std" => "Load More"),

	array( "name" => "Blog Read More",
			"desc" => "Enter your label for blog continue reading",
			"id" => $shortname."_continue_reading",
			"type" => "text",
			"std" => "Keep reading"),

	array( "name" => "Comment Count Header",
			"desc" => "Enter your header label for comment count box",
			"id" => $shortname."_comment_cheader",
			"type" => "text",
			"std" => "Latest Comments"),

	array( "name" => "Comment Count Notification",
			"desc" => "Enter your header label for comment count notification",
			"id" => $shortname."_comment_notify",
			"type" => "text",
			"std" => "No Comments Yet"),

	array( "name" => "Comment Form Header",
			"desc" => "Enter your header label for comment form box",
			"id" => $shortname."_comment_fheader",
			"type" => "text",
			"std" => "Leave a Comment"),

	array( "name" => "Project Options", "type" => "headers"),

	array( "name" => "Project Filter",
			"desc" => "Enter your project filter label",
			"id" => $shortname."_project_cfilter",
			"type" => "text",
			"std" => "Filter Works"),

	array( "name" => "Project Category",
			"desc" => "Enter your project category label",
			"id" => $shortname."_pcategory_label",
			"type" => "text",
			"std" => "View all"),

	array( "name" => "Project Website",
			"desc" => "Enter your project website url",
			"id" => $shortname."_vsite",
			"type" => "text",
			"std" => "Visit Link"),

	array( "name" => "Other Options", "type" => "headers"),

	array( "name" => "Member Header",
			"desc" => "Enter your member header label",
			"id" => $shortname."_member_header",
			"type" => "text",
			"std" => "Who is behind Arch"),

	array( "name" => "Search Header",
			"desc" => "Enter your header label for search page",
			"id" => $shortname."_search_header",
			"type" => "text",
			"std" => "Search Results"),

	array( "name" => "Search Input",
			"desc" => "Enter your search text input label",
			"id" => $shortname."_search_label",
			"type" => "text",
			"std" => "Search Keyword"),

	array( "name" => "404 Top Label",
			"desc" => "Enter your header label for 404 top label",
			"id" => $shortname."_notfound_label",
			"type" => "text",
			"std" => "Error 404"),

	array( "name" => "404 Link",
			"desc" => "Enter your link label for 404 page not found",
			"id" => $shortname."_notfound_link",
			"type" => "text",
			"std" => "Click here to go back home"),

	array( "type" => "close"),

	array( "name" => "Color Scheme",
			"type" => "section",
			"icon" => "icon-edit-sign"),
			
	array( "type" => "open"),

	array( "name" => "Menu Text",
			"desc" => "Enter menu text color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_menu_text_color",
			"type" => "color",
			"std" => ""),	

	array( "name" => "Menu Background",
			"desc" => "Enter menu background color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_menu_bg_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Menu Background Hover/Active",
			"desc" => "Enter menu background hover and active color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_menu_bg_hover",
			"type" => "color",
			"std" => ""),

	array( "name" => "Submenu Background",
			"desc" => "Enter submenu background color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_submenu_bg_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Headers",
			"desc" => "Enter your header text color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_header_text_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Headers Background",
			"desc" => "Enter your header background color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_header_bg_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Sidebar Headers",
			"desc" => "Enter your sidebar header text color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_sidebar_text_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Sidebar Headers Background",
			"desc" => "Enter your sidebar header background color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_sidebar_bg_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Slider Title Background",
			"desc" => "Enter your slider background title (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_slider_title_bg",
			"type" => "color",
			"std" => ""),

	array( "name" => "Slider Title Text",
			"desc" => "Enter your slider title text color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_slider_text",
			"type" => "color",
			"std" => ""),

	array( "name" => "Button Background",
			"desc" => "Enter button background color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_button_bg_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Button Background Text",
			"desc" => "Enter button background text color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_button_text_color",
			"type" => "color",
			"std" => ""),

	array( "name" => "Scrollbars",
			"desc" => "Enter your content custom scrollbar color (<strong>NOTE:</strong> leave empty to use default theme colors)",
			"id" => $shortname."_scrollbar_color",
			"type" => "color",
			"std" => ""),

	array( "type" => "close"),

	array( "name" => "Social",
			"type" => "section",
			"icon" => "icon-plus-sign-alt"),
	
	array( "type" => "open"),

	array( "name" => "Facebook Username",
			"desc" => "Enter Facebook username",
			"id" => $shortname."_facebook",
			"type" => "text",
			"std" => ""),	

	array( "name" => "Twitter Username",
			"desc" => "Enter Twitter Username",
			"id" => $shortname."_twitter",
			"type" => "text",
			"std" => ""),
			
	array( "type" => "close"),

	array( "name" => "Custom Post Types",
			"type" => "section",
			"icon" => "icon-folder-open"),

	array( "name" => "Project Options", "type" => "headers"),

	array( "name" => "Project",
			"desc" => "Change the project name custom post type",
			"id" => $shortname."_project_cpt",
			"type" => "text",
			"std" => "Projects"),

	array( "name" => "Project Slug",
			"desc" => "Change the project slug custom post type",
			"id" => $shortname."_project_cpt_slug",
			"type" => "text",
			"std" => "project-item"),

	array( "name" => "Project Add Item",
			"desc" => "Change the project add item label custom post type",
			"id" => $shortname."_project_add",
			"type" => "text",
			"std" => "Add New Project"),

	array( "name" => "Project Edit Item",
			"desc" => "Change the project edit item label custom post type",
			"id" => $shortname."_project_edit",
			"type" => "text",
			"std" => "Edit Project"),

	array( "name" => "Project Taxonomy Slug",
			"desc" => "Change the project taxonomy slug rewrite",
			"id" => $shortname."_project_tax_slug",
			"type" => "text",
			"std" => "project-category"),

	array( "name" => "Services Options", "type" => "headers"),

	array( "name" => "Services",
			"desc" => "Change the services name custom post type",
			"id" => $shortname."_services_cpt",
			"type" => "text",
			"std" => "Services"),

	array( "name" => "Services Slug",
			"desc" => "Change the services slug custom post type",
			"id" => $shortname."_services_cpt_slug",
			"type" => "text",
			"std" => "services-item"),

	array( "name" => "Services Add Item",
			"desc" => "Change the services add item label custom post type",
			"id" => $shortname."_services_add",
			"type" => "text",
			"std" => "Add New Services"),

	array( "name" => "Services Edit Item",
			"desc" => "Change the services edit item label custom post type",
			"id" => $shortname."_services_edit",
			"type" => "text",
			"std" => "Edit Services"),

	array( "name" => "Team Options", "type" => "headers"),

	array( "name" => "Our Team",
			"desc" => "Change the our team name custom post type",
			"id" => $shortname."_team_cpt",
			"type" => "text",
			"std" => "Our Team"),

	array( "name" => "Our Team Slug",
			"desc" => "Change the our team slug custom post type",
			"id" => $shortname."_team_cpt_slug",
			"type" => "text",
			"std" => "ourteam"),

	array( "name" => "Our Team Add Item",
			"desc" => "Change the our team add item label custom post type",
			"id" => $shortname."_team_add",
			"type" => "text",
			"std" => "Add New Member"),

	array( "name" => "Our Team Edit Item",
			"desc" => "Change the our team edit item label custom post type",
			"id" => $shortname."_team_edit",
			"type" => "text",
			"std" => "Edit Member"),

	array( "type" => "close"),

	array( "name" => "Theme Pages", "type" => "top_section"),
	array( "type" => "close"),

	array( "name" => "About",
			"type" => "section",
			"icon" => "icon-user"),

	array( "name" => "Hide Services",
			"desc" => "check the box if you want to hide the services list",
			"id" => $shortname."_services_hide",
			"type" => "checkbox",
			"std" => ""),	

	array( "name" => "Number of Services",
			"desc" => "Enter number of services you want to display",
			"id" => $shortname."_num_services",
			"type" => "text",
			"std" => ""),	

	array( "name" => "Services Ordering",
			"desc" => "Select your services order type (ASC or DESC)",
			"id" => $shortname."_services_order",
			"type" => "select",
			"options" => array("ASC", "DESC"),
			"std" => ""),	

	array( "name" => "Services Orderby",
			"desc" => "Select your orderby parameter for services",
			"id" => $shortname."_services_orderby",
			"type" => "select",
			"options" => array("ID", "author", "title", "name", "date", "modified", "parent", "rand", "comment_count", "menu_order"),
			"std" => ""),

	array( "name" => "Hide Members",
			"desc" => "check the box if you want to hide the members list",
			"id" => $shortname."_members_hide",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Number of Members",
			"desc" => "Enter number of members you want to display in about page",
			"id" => $shortname."_num_member",
			"type" => "text",
			"std" => ""),	

	array( "name" => "Member Ordering",
			"desc" => "Select your member order type (ASC or DESC)",
			"id" => $shortname."_member_order",
			"type" => "select",
			"options" => array("ASC", "DESC"),
			"std" => ""),	

	array( "name" => "Member Orderby",
			"desc" => "Select your orderby parameter for member",
			"id" => $shortname."_member_orderby",
			"type" => "select",
			"options" => array("ID", "author", "title", "name", "date", "modified", "parent", "rand", "comment_count", "menu_order"),
			"std" => ""),

	array( "type" => "close"),

	array( "name" => "Blog",
			"type" => "section",
			"icon" => "icon-calendar"),

	array( "name" => "Layout Type",
			"desc" => "Select your blog layout display type (Right Sidebar and Left Sidebar) for single page only",
			"id" => $shortname."_blog_sidebar_type",
			"type" => "select",
			"options" => array("Right", "Left"),
			"std" => ""),

	array( "name" => "Number of Blog items",
			"desc" => "Enter blog items you want to display in blog page",
			"id" => $shortname."_num_blog",
			"type" => "text",
			"std" => ""),	

	array( "name" => "Display Excerpt",
			"desc" => "Display your excerpt or brief description of your post",
			"id" => $shortname."_display_excerpt",
			"type" => "checkbox",
			"std" => ""),	

	array( "name" => "Display Post Links",
			"desc" => "Check this box to display post links in single blog page",
			"id" => $shortname."_display_posts",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Hide Tags",
			"desc" => "Hide tags in blog single page",
			"id" => $shortname."_hide_tags",
			"type" => "checkbox",
			"std" => ""),	

	array( "name" => "Blog Navigation",
			"desc" => "Select your blog page navigation style (Pagination, Next Previous or Infinite Scroll)",
			"id" => $shortname."_blog_pnav",
			"type" => "select",
			"options" => array("Pagination", "Next Previous Link", "Infinite Scroll"),
			"std" => ""),					

	array( "type" => "close"),

	array( "name" => "Projects",
			"type" => "section",
			"icon" => "icon-laptop"),

	array( "name" => "Hide Categories",
			"desc" => "Hide project category dropdown",
			"id" => $shortname."_hide_project_drop",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Thumbnail Slider",
			"desc" => "Checkbox to exclude the thumbnail in project slider",
			"id" => $shortname."_project_thumb_slider",
			"type" => "checkbox",
			"std" => ""),

	array( "name" => "Project Hover Link",
			"desc" => "Select your thumbnail hover link style (URL or Lightbox)",
			"id" => $shortname."_project_hover_link",
			"type" => "select",
			"options" => array("Url", "Lightbox"),
			"std" => ""),	

	array( "name" => "Project Ordering",
			"desc" => "Select your project album order type (ASC or DESC)",
			"id" => $shortname."_album_order",
			"type" => "select",
			"options" => array("ASC", "DESC"),
			"std" => ""),	

	array( "name" => "Project Orderby",
			"desc" => "Select your orderby parameter for project album",
			"id" => $shortname."_album_orderby",
			"type" => "select",
			"options" => array("ID", "author", "title", "name", "date", "modified", "parent", "rand", "comment_count", "menu_order"),
			"std" => ""),

	array( "name" => "Attachment Ordering",
			"desc" => "Select your ordering style in project page for album images",
			"id" => $shortname."_attachment_order",
			"type" => "select",
			"options" => array("ASC", "DESC"),
			"std" => ""),

	array( "name" => "Attachment Orderby",
			"desc" => "Select your orderby parameter in project page for album images",
			"id" => $shortname."_attachment_orderby",
			"type" => "select",
			"options" => array("ID", "author", "title", "name", "date", "modified", "parent", "rand", "comment_count", "menu_order"),
			"std" => ""),	

	array( "type" => "close"),

	array( "name" => "Contact",
			"type" => "section",
			"icon" => "icon-phone-sign"),
	
	array( "type" => "open"),

	array( "name" => "Main", "type" => "headers"),

	array( "name" => "Email Address",
			"desc" => "Enter the email address where you'd like the contact form sent.<br /><strong>(example: info@domainname.com)</strong>",
			"id" => $shortname."_contactemail",
			"type" => "text",
			"std" => ""),
			
	array( "name" => "Email Sent Message",
			"desc" => "Enter the message when email is sent",
			"id" => $shortname."_email_sent_message",
			"type" => "text",
			"std" => ""),	

	array( "name" => "Email Subject",
			"desc" => "Enter your email subject when someone contacts you using contact form in contact us page",
			"id" => $shortname."_subject",
			"type" => "text",
			"std" => ""),		

	array( "name" => "Button Submit Value",
			"desc" => "Enter button submit value",
			"id" => $shortname."_contact_button_value",
			"type" => "text",			
			"std" => ""),

	array( "name" => "Google Map", "type" => "headers"),

	array( "name" => "Latitude",
			"desc" => "Enter your google map latitude",
			"id" => $shortname."_map_lat",
			"type" => "text",
			"std" => "-12.043333"),

	array( "name" => "Longitude",
			"desc" => "Enter your google map longitude",
			"id" => $shortname."_map_lng",
			"type" => "text",
			"std" => "-77.028333"),

	array( "name" => "Marker Title",
			"desc" => "Enter your google map marker title",
			"id" => $shortname."_map_marker",
			"type" => "text",
			"std" => "Add your marker title window"),	

	array( "name" => "Marker Window",
			"desc" => "Enter your google map marker info window",
			"id" => $shortname."_map_window",
			"type" => "textarea",
			"std" => "Please add your text marker here"),	

	array( "type" => "close"),	
);
?>