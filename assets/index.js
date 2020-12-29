/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/index.scss';

import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';

$(".connect-button").click(function() {
    document.location.href = "/login";
})

$(".deco-button").click(function() {
    document.location.href = "/logout";
})

$(".api-call-button").click(function() {
    document.location.href = "/api/get_articles";
})

$(".create-article-button").click(function() {
    document.location.href = "/newArticle";
})

$(".btn-delete-article").click(function() {
    $('#delete-article-modal').modal('show');
})

$(".btn-cancel-delete").click(function() {
    $('#delete-article-modal').modal('hide');
})

$(".btn-annulate-modification").click(function() {
    $('#modify-article-modal').modal('hide');
})

