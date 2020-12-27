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


$(".article").click(function() {
    window.location.href = "http://127.0.0.1:8000/article/1";
})

$(".create-account-button").click(function() {
    $('#creation_compte_modal').modal('show');
})

$(".connect-button").click(function() {
    $('#connect_modal').modal('show');
})

$(".btn-delete-article").click(function() {
    $('#delete-article-modal').modal('show');
})

$(".btn-modify-article").click(function() {
    $('#title-textarea').val($('.article_title').html());
    $('#intro-textarea').val($('.article_intro').html());
    $('#texte-textarea').val($('.article_text').html());

    $('#modify-article-modal').modal('show');
})

$(".btn-cancel-delete").click(function() {
    $('#delete-article-modal').modal('hide');
})

$(".btn-annulate-modification").click(function() {
    $('#modify-article-modal').modal('hide');
})

