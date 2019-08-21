<?php 


/**
 * Flash Helper
 * @param  string|null  $title
 * @param  string|null  $text
 * @return void
 */

function flash(  $text = null, $type='info')
{
    // \Session::flash('title',$title);
    \Session::flash('type',$type);
    \Session::flash('message',$text);
    // $flash = app('App\Http\Flash');

    // if (func_num_args() == 0) {
    //     return $flash;
    // }
    // return $flash->$type($title, $text);
}