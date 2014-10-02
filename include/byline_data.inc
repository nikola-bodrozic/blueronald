<?php
                // categories for post
                $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if($categories){
                    foreach($categories as $category) {
                        $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                    }
                $cats = trim($output, $separator);
                }

                // Post author name and display name
                    $pAuthor = get_the_author_meta('user_login');
                    $pDispName = get_the_author_meta('display_name');                 
?>