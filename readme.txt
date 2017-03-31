=== Plugin Name ===

Contributors: chrisliubeers
Tags: collapse, toggles, bootstrap
Requires at least: 3.8
Tested up to: 4.7
Stable tag: 1.0
Plugin Name: Simple Bootstrap Collapse
Plugin URI: http://www.tomatillodesign.com
Description: Using Bootstrap Collapse in WordPress
Author: Chris Liu-Beers
Version: 1.0
Author URI: http://www.tomatillodesign.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

This plugin adds Bootstrap Collapse functionality to WordPress. All you need to do is add the Collapse HTML mark up code.


== Description ==

This plugin adds Bootstrap v4 Collapse functionality to WordPress.

It adds just the Bootstrap Javascript Plugin for Collapse and associated CSS, along with a simple shortcode for use in the page editor.

This does not bring in any other Bootstrap javascript or CSS functionality.

There is sample HTML mark up code in the readme.txt for a selector and modal target element.

== Installation ==

Here is the shortcode usage:

[tabs]

[tab title="REST API”]

The WordPress REST API makes it easier than ever to use WordPress in new and exciting ways, such as creating Single Page Applications on top of WordPress.

[/tab]

[tab title=“More about the REST API“]

You could create a plugin to provide an entirely new admin experiences for WordPress, or create a brand new interactive front-end experience.

[/tab]

[/tabs]

——————

Here is the complete HTML Collapse MarkUp

<code>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>The DOM</title>
  <link rel="stylesheet" href="style.css" media="screen" charset="utf-8">
</head>

<body>

<div class="site-inner"><div class="content-sidebar-wrap"><main class="content" id="genesis-content"><article class="post-7177 page type-page status-publish entry" itemscope itemtype="http://schema.org/CreativeWork"><header class="entry-header"><h1 class="entry-title" itemprop="headline">Tab Testing Only</h1>
</header><div class="entry-content" itemprop="text"><p>Let&#8217;s see what happens here&#8230;</p>

<div class="clb-nav-tabs-top">
  <ul class="nav nav-tabs" role="tablist">

    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" role="tab" href="#rest">REST</a>
    </li>

    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" role="tab" href="#rest-2">REST-2</a>
    </li>

    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" role="tab" href="#yet-another-tab">Yet Another Tab</a>
    </li>

    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" role="tab" href="#lets-do-one-more-tab">Lets Do One More Tab</a>
    </li>

  </ul>
</div>

<div class="tab-content">

  <div class="tab-pane fade" id="rest" role="tabpanel">
    <p>The WordPress REST API makes it easier than ever to use WordPress in new and exciting ways, such as creating Single Page Applications on top of WordPress. You could create a plugin to provide an entirely new admin experiences for WordPress, or create a brand new interactive front-end experience.</p>
  </div>

  <div class="tab-pane fade" id="rest-2" role="tabpanel">
    <p>REST2: You could create a plugin to provide an entirely new admin experiences for WordPress, or create a brand new interactive front-end experience.</p>
  </div>

  <div class="tab-pane fade" id="yet-another-tab" role="tabpanel">
    <p>Yet Another Tab: You could create a plugin to provide an entirely new admin experiences for WordPress, or create a brand new interactive front-end experience.</p>
  </div>

  <div class="tab-pane fade" id="lets-do-one-more-tab" role="tabpanel">
    <p>Lets Do One More Tab: You could create a plugin to provide an entirely new admin experiences for WordPress, or create a brand new interactive front-end experience.</p>
  </div>

</div>

</code>

Also, here is the CSS that you may want to customize:

<code>
/* ------- CLB Custom NavTabs Bootstrap CSS ----------- */

.clb-nav-tabs-top ul {
     margin-left: 0px;
}

.clb-nav-tabs-top ul > li {
    list-style-type: none;
}

.tab-content {
     margin-bottom: 26px;
     padding-bottom: 26px;
     border-bottom: 1px solid #ddd;
}
</code>

== Changelog ==

= 1.0.0 =
* Initial release.
