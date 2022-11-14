<?php

// Source: https://gravatar.com/
function getGravatarUrl($email): string
{
    // Trim leading and trailing whitespace from
    // an email address and force all characters
    // to lower case
    $address = strtolower( trim( $email ) );

    // Create an MD5 hash of the final string
    $hash = md5( $address );

    // Grab the actual image URL
    return 'https://www.gravatar.com/avatar/' . $hash . '?d=mp';
}

function showComments($comments): string
{
    $html = '';
    foreach ( $comments as $comment ) {

        $datetime = new DateTime($comment['created_at']);

        $html .=
            '<ul class="mt-2 mb-2 list-group">
                <li class="list-group-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto mt-2">
                                <img class="rounded-circle" src="' . APP_URL . 'img/mystery-man.jpg"> 
                            </div>
                            <div class="col">
                                <div class="comment-author mt-2 mb-2">
                                    <strong class="text-uppercase">' . $comment['author_nick'] . '</strong>
                                </div>
                                <div class="comment-meta">
                                    <i class="fa-regular fa-calendar-check"></i>
                                    <time class="badge bg-light text-dark">' . $datetime->format('Y-m-d') . '</time>
                                    <i class="fa-regular fa-clock"></i>
                                    <time class="badge bg-light text-dark">' . $datetime->format('H:i:s') . '</time>
                                </div>
                                <div class="comment-content mt-4 mb-4">' . $comment['content'] . '</div>
                                <div class="reply mb-2">
                                    <a class="btn btn-sm btn-danger" href="#!">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>';
    }
    return $html;
}