<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/3/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */

     /*EDICIÓN DEL HELPER PAGINATOR */
    public function initialize()
    {
        parent::initialize();
        $this->loadHelper('Paginator', [
            'templates' => [
                'nextActive' => '<li class="page-item"><a class="page-link" rel="next" href="{{url}}">{{text}}</a></li>',
                'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="#" onclick="return false;">{{text}}</a></li>',
                'prevActive' => '<li class="page-item"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
                'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="#" onclick="return false;">{{text}}</a></li>',
                'counterRange' => '<li class="page-item disabled"><a class="page-link">{{start}} - {{end}} de {{count}}</a></li>',
                'counterPages' => '<li class="page-item disabled"><a class="page-link">{{page}} de {{pages}}</a></li>',
                'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'current' => '<li class="page-item active"><a class="page-link" href="#" onclick="return false;">{{text}}</a></li>',
                'ellipsis' => '<li class="page-item disabled"><a class="page-link">&hellip;</a></li>',
                'sort' => '<a class="page-link" href="{{url}}">{{text}}</a>',
                'sortAsc' => '<a class="page-link asc" href="{{url}}">{{text}}</a>',
                'sortDesc' => '<a class="page-link desc" href="{{url}}">{{text}}</a>',
                'sortAscLocked' => '<a class="page-link asc locked" href="{{url}}">{{text}}</a>',
                'sortDescLocked' => '<a class="page-link desc locked" href="{{url}}">{{text}}</a>',
            ],
        ]);
    }
}
