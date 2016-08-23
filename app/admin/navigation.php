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
            </menu>
        </div>
    </nav>
Navigation;
}
