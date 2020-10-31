<?php

/****************************************
	comments.php
	コメント一覧や、コメントフォームを表示するための
	テンプレートファイルです。
 *****************************************/
?>
<!-- comments.php -->
<div id="comment-area">
    <h3 id="comments">口コミ</h3>
    <?php if (have_comments()) : /** コメントがあったら */ ?>
        <ol class="comments-list">
            <?php wp_list_comments('avatar_size=55');
            /** コメント一覧を表示 */ ?>
        </ol>
        <div class="comment-page-link">
            <?php paginate_comments_links();
            /** コメントが多い場合、ページャーを表示 */ ?>
        </div>
        <?php else: ?>
        <p>口コミはまだありません</p>
    <?php endif;?>

    <!-- コメントフォーム -->
    <?php $args = array(
        'title_reply'    => '口コミを書く',
        'comment_field'=> '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" style="border:1px solid #000"></textarea>',
        'label_submit'    => '送信',
    );?>
    <?php
    comment_form($args); ?>
</div>
<!-- /comments.php -->
