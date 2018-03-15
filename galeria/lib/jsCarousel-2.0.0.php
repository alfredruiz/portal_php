﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>jQuery Thumbnail/Content Slider: jsCarouselV2.0.0</title>

    <script src="jquery-1.4.4.min.js" type="text/javascript"></script>

    <script src="jsCarousel-2.0.0.js" type="text/javascript"></script>

    <link href="jsCarousel-2.0.0.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        $(document).ready(function() {

            $('#carouselv').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: true, masked: false, itemstodisplay: 3, orientation: 'v' });
            $('#carouselh').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: false, circular: true, masked: false, itemstodisplay: 5, orientation: 'h' });
            $('#carouselhAuto').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: true, masked: true, itemstodisplay: 5, orientation: 'h' });

        });       
        
    </script>

    <style type="text/css">
        body
        {
            background-color: #2F2F2F;
            padding-top: 40px;
        }
        #demo-wrapper
        {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            padding: 40px 20px 0px 20px;
        }
        #demo-left
        {
            width: 15%;
            float: left;
        }
        #demo-right
        {
            width: 85%;
            float: left;
        }
        #hWrapperAuto
        {
            margin-top: 20px;
        }
        #demo-tabs
        {
            width: 100%;
            height: 50px;
            color: White;
            margin: 0;
            padding: 0;
        }
        #demo-tabs div.item
        {
            height: 35px;
            float: left;
            background-color: #2F2F2F;
            border: solid 1px gray;
            border-bottom: none;
            padding: 0;
            margin: 0;
            margin-left: 10px;
            text-align: center;
            padding: 10px 4px 4px 4px;
            font-weight: bold;
        }
        #contents
        {
            width: 100%;
            margin: 0;
            padding: 0;
            color: White;
            font: arial;
            font-size: 11pt;
        }
        #demo-tabs div.item.active-tab
        {
            background-color: Black;
        }
        #demo-tabs div.item.active-tabc
        {
            background-color: Black;
        }
        #v1, #v2
        {
            margin: 20px;
        }
        .visible
        {
            display: block;
        }
        .hidden
        {
            display: none;
        }
        #oldWrapper
        {
            margin-left: 100px;
        }
        #contents a
        {
            color: yellow;
        }
        #contents a:hover
        {
            text-decoration: none;
            color: Gray;
        }
        .heading
        {
            font-size: 20pt;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="contents">
        <div id="v2">
            <span class="heading">jsCarousel V 2.0.0</span> <a href="http://www.egrappler.com/jquery-contentthumbnail-slder-v2-0-jscarousel-v2-0">
                Back To Post</a>
            <p>
                This is version 2.0.0 of jsCarousel plugin, it supports both horizontal and vertical
                sliders. You can also control the mask effect directly from the plugin initializer
                function instead of modifying the CSS code in jsCarousel v2.0.0. To see demonstration
                for jsCarousel v 1.0.0 <a href="http://www.egrappler.com/contents/jsCarousel/Demo/jscarousel.htm">
                    click here.</a></p>
            <div id="demo-wrapper">
                
                <div id="demo-right">
                    <div id="hWrapper">
                        <div id="carouselh">
                            <div>
                                <img alt="" src="../images/img_1.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_2.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_3.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_4.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_5.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_6.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_7.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_8.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_9.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_10.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_11.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_12.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_13.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_14.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_15.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                            <div>
                                <img alt="" src="../images/img_16.jpg" /><br />
                                <span class="thumbnail-text">Image Text</span></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
