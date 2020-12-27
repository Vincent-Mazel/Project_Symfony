import './styles/article.scss';

// start the Stimulus application
import './bootstrap';

$(".btn-delete-article").click(function() {
    $('#delete-article-modal').modal('show');
})