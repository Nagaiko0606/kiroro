<?php
if ( get_post_type() === 'news-post' ) {
  get_template_part( 'blog-item' );
} else { // 上記以外の投稿タイプの場合
  get_template_part( 'single-news' );
}
