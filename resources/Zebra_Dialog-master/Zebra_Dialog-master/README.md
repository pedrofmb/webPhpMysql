<img src="https://raw.githubusercontent.com/stefangabos/zebrajs/master/docs/images/logo.png" alt="zebrajs" align="right">

# Zebra_Dialog

*A small, compact and highly configurable jQuery plugin for creating responsive modal dialog boxes*

[![npm](https://img.shields.io/npm/v/zebra_dialog.svg)](https://www.npmjs.com/package/zebra_dialog) [![Total](https://img.shields.io/npm/dt/zebra_dialog.svg)](https://www.npmjs.com/package/zebra_dialog) [![Monthly](https://img.shields.io/npm/dm/zebra_dialog.svg)](https://www.npmjs.com/package/zebra_dialog) [![License](https://img.shields.io/npm/l/zebra_dialog.svg)](https://www.npmjs.com/package/zebra_dialog)

A modal window is a child window that requires users to interact with it before they can continue using the parent application. Modal windows are one of the most commonly used user interface elements and are used to command user awareness in order to communicate important information, or to alert of errors or warnings.

**Zebra_Dialog** is a small, compact (one JavaScript file, no dependencies other than jQuery 1.7.0+) , and highly configurable jQuery plugin for creating responsive modal dialog boxes, meant to replace native JavaScript *alert* and *confirmation* dialog boxes.

Can also be used as a notification widget (when configured to show no buttons and to close automatically) for updates or errors, without distracting users from their browser experience by displaying obtrusive alerts.

![Screenshot](https://raw.github.com/stefangabos/Zebra_Dialog/master/examples/screenshot.png)
&nbsp;&nbsp;
![Screenshot](https://raw.github.com/stefangabos/Zebra_Dialog/master/examples/screenshot-flat.png)

## Support the development of this project

[![Donate](https://img.shields.io/badge/Be%20kind%20%7C%20Donate%20$3%20with%20-%20PayPal%20-brightgreen.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RKMCMRZB493LY)

## Features

 - great looking dialog boxes, out of the box, with 2 themes included
 - 5 types of dialog boxes available: *confirmation*, *information*, *warning*, *error* and *question*
 - content can also be added through AJAX calls, iFrames or from inline elements (together with attached events)
 - easily customisable appearance by editing the CSS file
 - create modal or non-modal dialog boxes
 - easily add custom buttons
 - position the dialog box wherever you want - not just in the middle of the screen
 - callback functions can be used for further customisations
 - use callback functions to handle users' choice
 - works in all major browsers (Firefox, Opera, Safari, Chrome, Internet Explorer 6+)

 For the default theme the icons used for *confirmation*, *information*, *error* and *question* dialog boxes are made by [DryIcon](http://dryicons.com/free-icons/preview/aesthetica/) while the *warning* icon is made by [Function Design & Development Studio](http://wefunction.com/2008/07/function-free-icon-set/).

For the *flat* theme, the icons used are made by [Elegant Themes](http://www.elegantthemes.com/blog/freebie-of-the-week/beautiful-flat-icons-for-free)

## Requirements

Zebra_Dialog has no dependencies other than jQuery 1.7.0+

## Installation

Zebra_Dialog is available as a [npm package](https://www.npmjs.com/package/zebra_dialog). To install it use:

```
npm install zebra_dialog
```

Zebra_Dialog is also available as a [Bower package](http://bower.io/). To install it use:

```
bower install zebra_dialog
```

## How to use

First, load jQuery from a CDN and provide a fallback to a local source like:

```html
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>window.jQuery || document.write('<script src="path/to/jquery-3.2.1.js"><\/script>')</script>
```

Load the Zebra_Dialog jQuery plugin:

```html
<script src="path/to/zebra_dialog.min.js"></script>
```

Alternatively, you can load Zebra_Dialog from [JSDelivr CDN](https://www.jsdelivr.com/) like this:
```html
<!-- for the most recent version -->
<script src="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Dialog/dist/zebra_dialog.min.js"></script>

<!-- for a specific version -->
<script src="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Dialog@1.3.0/dist/zebra_dialog.min.js"></script>

<!-- replacing "min" with "src" will serve you the non-compressed version -->
```

Load the style sheet file from a local source

```html
<link rel="stylesheet" href="path/to/theme/zebra_dialog.min.css">
```

...or from [JSDelivr CDN](https://www.jsdelivr.com/)

```html
<!-- for the most recent version of the "flat" theme -->
<link rel="stylesheet" href=="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Dialog/dist/css/flat/zebra_dialog.min.css">

<!-- for the most recent version of the "default" theme -->
<link rel="stylesheet" href=="https://cdn.jsdelivr.net/gh/stefangabos/Zebra_Dialog/dist/css/flat/zebra_dialog.min.css">

<!-- replacing "min" with "src" will serve you the non-compressed version -->
```
Now, within the DOM-ready event do

```javascript
$(document).ready(function() {

    // show a dialog box when clicking on an element
    $('#element').on('click', function(e) {
        e.preventDefault();
        new $.Zebra_Dialog('The link was clicked!');
    });

});
```

## Configuration options

## Properties

<table width"100%">
    <thead>
    <tr>
        <th>Property</th>
        <th>Type</th>
        <th>Default</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td valign="top"><code>animation_speed_hide</code></td>
        <td valign="top"><em>integer</em></td>
        <td valign="top">250</td>
        <td valign="top">
            The speed, in milliseconds, by which the overlay and the dialog box will be animated when closing.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>animation_speed_show</code></td>
        <td valign="top"><em>integer</em></td>
        <td valign="top">0</td>
        <td valign="top">
            The speed, in milliseconds, by which the overlay and the dialog box will be animated when appearing.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>auto_close</code></td>
        <td valign="top"><em>mixed</em></td>
        <td valign="top">FALSE</td>
        <td valign="top">
            The number of milliseconds after which to automatically close the dialog box or <code>FALSE</code> to not automatically close the dialog box.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>buttons</code></td>
        <td valign="top"><em>mixed</em></td>
        <td valign="top"></td>
        <td valign="top">
            Use this for localization and for adding custom buttons.<br><br>
            If set to <code>TRUE</code>, the default buttons will be used, depending on the type of the dialog box: <code>['Yes', 'No']</code> for <em>question</em> type and <code>['Ok']</code> for the other types of dialog boxes.<br><br>
            For custom buttons, use an array containing the captions of the buttons to display: <code>['My button 1', 'My button 2']</code>.<br><br>
            Set to <code>FALSE</code> if you want no buttons.<br><br>
            You can also attach callback functions to individual buttons by providing an array of objects like:<br><br>
            <code>[{</code><br>
            <code>&nbsp;&nbsp;caption: 'My button 1',</code><br>
            <code>&nbsp;&nbsp;callback: function() { // code }</code><br>
            <code>},{</code><br>
            <code>&nbsp;&nbsp;caption: 'My button 2',</code><br>
            <code>&nbsp;&nbsp;callback: function() { // code }</code><br>
			<code>}]</code><br><br>
            Callback functions get as argument the entire dialog box jQuery object.<br><br>
            <blockquote>A callback function returning FALSE will prevent the dialog box from closing.</blockquote>
        </td>
    </tr>
    <tr>
        <td valign="top"><code>center_buttons</code></td>
        <td valign="top"><em>boolean</em></td>
        <td valign="top">FALSE</td>
        <td valign="top">
        Setting this property to <code>TRUE</code> will instruct the plugin to center any available buttons instead of floating them to the right
        </td>
    </tr>
    <tr>
        <td valign="top"><code>custom_class</code></td>
        <td valign="top"><em>mixed</em></td>
        <td valign="top">FALSE</td>
        <td valign="top">
            An extra class to add to the dialog box's container, useful for further customizing dialog boxes<br><br>
            For example, setting this value to <code>mycustom</code> and in the CSS file having something like<br><br>
            <code>.mycustom .ZebraDialog_Title { background: red }</code><br><br>
            would set the dialog box title's background to red.<br><br>
            <blockquote>Take a look into a theme's style sheet file to see what can be changed.</blockquote>
        </td>
    </tr>
    <tr>
        <td valign="top"><code>keyboard</code></td>
        <td valign="top"><em>boolean</em></td>
        <td valign="top">TRUE</td>
        <td valign="top">
        When set to <code>TRUE</code>, pressing the <code>ESC</code> key will close the dialog box.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>max_height</code></td>
        <td valign="top"><em>integer</em></td>
        <td valign="top">0</td>
        <td valign="top">
            The maximum height, in pixels, before the content in the dialog box is scrolled.<br><br>
            If set to <code>0</code> the dialog box's height will automatically adjust to fit the entire content.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>message</code></td>
        <td valign="top"><em>string</em></td>
        <td valign="top"></td>
        <td valign="top">
            The message in the dialog box - this is passed as argument when the plugin is called.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>modal</code></td>
        <td valign="top"><em>boolean</em></td>
        <td valign="top">TRUE</td>
        <td valign="top">
            When set to <code>TRUE</code> there will be a semitransparent overlay behind the dialog box, preventing users from clicking the page's content.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>overlay_close</code></td>
        <td valign="top"><em>boolean</em></td>
        <td valign="top">TRUE</td>
        <td valign="top">
            Should the dialog box close when the overlay is clicked?
        </td>
    </tr>
    <tr>
        <td valign="top"><code>overlay_opacity</code></td>
        <td valign="top"><em>double</em></td>
        <td valign="top">.9</td>
        <td valign="top">
            The opacity of the overlay (between <code>0</code> and <code>1</code>)
        </td>
    </tr>
    <tr>
        <td valign="top"><code>position</code></td>
        <td valign="top"><em>mixed</em></td>
        <td valign="top">['center', 'middle']</td>
        <td valign="top">
            Position of the dialog box.<br><br>
            Can be either <code>center</code> or an array with 2 elements, in the form of<br><br>
			<code>// notice that everything is enclosed in quotes</code><br>
			<code>['horizontal_position +/- offset',</code><br>
			<code>'vertical_position +/- offset']</code><br><br>
			where<br>
            <ul>
                <li><em>horizontal_position</em> can be <code>left</code>, <code>right</code> or <code>center</code></li>
                <li><em>vertical_position</em> can be <code>top</code>, <code>bottom</code> or <code>middle</code></li>
                <li><em>offset</em> is optional and represents the value of pixels to add/subtract from the respective horizontal or vertical position</li>
            </ul>
            <blockquote>Positions are relative to the viewport</blockquote>
            <code>// position the dialog box in the top-left corner</code><br>
			<code>// shifted 20 pixels inside</code><br>
			<code>['left + 20', 'top + 20']</code><br><br>
            <code>// position the dialog box in the bottom-right corner</code><br>
			<code>// shifted 20 pixels inside</code></br>
			<code>['right - 20', 'bottom - 20']</code><br><br>
            <code>// position the dialog box in center-top</code><br>
			<code>// shifted 20 pixels down</code><br>
			<code>['center', 'top + 20']</code><br><br>
        </td>
    </tr>
    <tr>
        <td valign="top"><code>reposition_speed</code></td>
        <td valign="top"><em>integer</em></td>
        <td valign="top">100</td>
        <td valign="top">
            The duration (in milliseconds) of the animation used to reposition the dialog box when the browser window is resized.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>show_close_button</code></td>
        <td valign="top"><em>boolean</em></td>
        <td valign="top">TRUE</td>
        <td valign="top">
            When set to <code>TRUE</code>, a <em>close</em> button (the little "x") will be shown in the upper right corner of the dialog box.<br><br>
			If the dialog box has a title bar then the <em>close</em> button will be shown in the title bar, vertically centered and respecting the right padding.<br><br>
            If the dialog box does not have a title bar then the <em>close</em> button will be shown in the upper right corner of the body of the dialog box, respecting the position related properties set in the stylesheet.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>source</code></td>
        <td valign="top"><em>mixed</em></td>
        <td valign="top">FALSE</td>
        <td valign="top">
            Add content via AJAX, iFrames or from inline elements (together with the already applied events).<br><br>
            This property can be any of the following:<br><br>
            <ul>
                <li>
                    <code>ajax: object</code> - where <em>object</em> can be an <code>object</code> with any of the properties you'd normally use to make an AJAX call in jQuery (see the description for the <em>settings</em> argument <a href="http://api.jquery.com/jQuery.ajax/">here</a>), or it can be a <code>string</code> representing a valid URL whose content to be fetched via AJAX and placed inside the dialog box.<br><br>
                    <code>source: {ajax: 'http://myurl.com/'}</code><br><br>
					<code>source: {</code><br>
					<code>&nbsp;&nbsp;ajax: {</code><br>
					<code>&nbsp;&nbsp;&nbsp;&nbsp;url: 'http://myurl.com/',</code><br>
					<code>&nbsp;&nbsp;&nbsp;&nbsp;cache: false</code><br>
					<code>&nbsp;&nbsp;}</code><br>
					<code>}</code><br><br>
                    <blockquote>Note that you cannot use the "success" property as it will always be overwritten by the library; use the "complete" property instead, if you have to</blockquote><br>
                </li>
                <li>
                    <code>iframe: object</code> - where <em>object</em> can be an <code>object</code> where property names are valid attributes of the <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe">iframe</a> tag, or it can be a <code>string</code> representing a valid URL to be loaded inside an iFrame and placed inside the dialog box.<br><br>
					<code>source: {iframe: 'http://myurl.com/'}</code><br><br>
					<code>source: {</code><br>
					<code>&nbsp;&nbsp;iframe: {</code><br>
					<code>&nbsp;&nbsp;&nbsp;&nbsp;src: 'http://myurl.com/',</code><br>
					<code>&nbsp;&nbsp;&nbsp;&nbsp;width: 480,</code><br>
					<code>&nbsp;&nbsp;&nbsp;&nbsp;height: 320,</code><br>
					<code>&nbsp;&nbsp;&nbsp;&nbsp;scrolling: 'no'</code><br>
					<code>&nbsp;&nbsp;}</code><br>
					<code>}</code><br><br>
                    <blockquote>Note that you should always set the iFrame's width and height and adjust the dialog box's "width" property accordingly</blockquote><br>
                </li>
                <li>
                    <code>inline: selector</code> - where <em>element</em> is a jQuery element from the page; the element will be copied and placed inside the dialog box together with any attached events. If you just want the element's inner HTML, use <code>$('#element').html()</code><br><br>
                    <code>source: {inline: $('#myelement')}</code>
                </li>
            </ul>
        </td>
    </tr>
    <tr>
        <td valign="top"><code>title</code></td>
        <td valign="top"><em>string</em></td>
        <td valign="top">""<br>(empty string, no title)</td>
        <td valign="top">
            Title of the dialog box
        </td>
    </tr>
    <tr>
        <td valign="top"><code>type</code></td>
        <td valign="top"><em>mixed</em></td>
        <td valign="top">information</td>
        <td valign="top">
            Dialog box type.<br>
            Can be any of the following:
            <ul>
                <li>confirmation</li>
                <li>error</li>
                <li>information</li>
                <li>question</li>
                <li>warning</li>
            </ul>
            If you don't want an icon, set the <code>type</code> property to <code>FALSE</code>.<br><br>
            By default, all types except <code>question</code> have a single button with the caption <em>Ok</em>; type <code>question</code> has two buttons, with the captions <em>Ok</em> and <em>Cancel</em> respectively.
        </td>
    </tr>
    <tr>
        <td valign="top"><code>vcenter_short_message</code></td>
        <td valign="top"><em>boolean</em></td>
        <td valign="top">TRUE</td>
        <td valign="top">
            Should short messages be vertically centered?
        </td>
    </tr>
    <tr>
        <td valign="top"><code>width</code></td>
        <td valign="top"><em>integer</em></td>
        <td valign="top">0<br>(uses the value defined in the theme)</td>
        <td valign="top">
            Width of the dialog box<br><br>
            By default, the width of the dialog box is set in the theme file. Use this property to override the default width at run-time.<br><br>
            Must be an integer, greater than <code>0</code>. Anything else will instruct the script to use the default value, as set in the theme file. Value should be no less than <code>200</code> for optimal output.
        </td>
    </tr>
    </tbody>
</table>

## Events

<table width="100%">
    <thead>
    <tr>
        <th>Event</th>
        <th width="100%">Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td valign="top"><code>onClose</code></td>
        <td valign="top">
            Event fired when <em>after</em> the dialog box is closed.<br>
            For executing functions <em>before</em> the closing of the dialog box, see the <strong>buttons</strong> option.<br>
            The callback function takes as argument the caption of the clicked button, or <code>FALSE</code> if the dialog box was closed by pressing the ESC key or by clicking on the overlay.
        </td>
    </tr>
    </tbody>
</table>

## Methods

### `close()`

Call this method to manually close a dialog box.

```javascript
var dialog = new $.Zebra_Dialog('This is some information');

dialog.close();
```

## Demo

See the [demos](http://stefangabos.github.io/Zebra_Dialog/)