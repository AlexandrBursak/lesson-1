<?php

function getAdminNavigation ()
{
    return <<<Navigation
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <menu class="nav navbar-nav">
                <li><a href="page.html">Page</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="testimonial.html">Testimonial</a></li>
                <li><a href="form.html">Form</a></li>
                <li><a href="media.html">Media</a></li>
            </menu>
        </div>
    </nav>
Navigation;
}
