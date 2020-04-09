<?php
/**
 * BookmarkController.php - Main Controller
 *
 * Main Controller Bookmark Module
 *
 * @category Controller
 * @package Bookmark
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

declare(strict_types=1);

namespace OnePlace\Bookmark\Controller;

use Application\Controller\CoreEntityController;
use Application\Model\CoreEntityModel;
use OnePlace\Bookmark\Model\Bookmark;
use OnePlace\Bookmark\Model\BookmarkTable;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;

class BookmarkController extends CoreEntityController {
    /**
     * Bookmark Table Object
     *
     * @since 1.0.0
     */
    protected $oTableGateway;

    /**
     * BookmarkController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param BookmarkTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,BookmarkTable $oTableGateway,$oServiceManager) {
        $this->oTableGateway = $oTableGateway;
        $this->sSingleForm = 'bookmark-single';
        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);

        if($oTableGateway) {
            # Attach TableGateway to Entity Models
            if(!isset(CoreEntityModel::$aEntityTables[$this->sSingleForm])) {
                CoreEntityModel::$aEntityTables[$this->sSingleForm] = $oTableGateway;
            }
        }
    }

    /**
     * Bookmark Index
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function indexAction() {
        # You can just use the default function and customize it via hooks
        # or replace the entire function if you need more customization
        return $this->generateIndexView('bookmark');
    }

    /**
     * Bookmark Add Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function addAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * bookmark-add-before (before show add form)
         * bookmark-add-before-save (before save)
         * bookmark-add-after-save (after save)
         */
        return $this->generateAddView('bookmark');
    }

    /**
     * Bookmark Edit Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function editAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * bookmark-edit-before (before show edit form)
         * bookmark-edit-before-save (before save)
         * bookmark-edit-after-save (after save)
         */
        return $this->generateEditView('bookmark');
    }

    /**
     * Bookmark View Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function viewAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * bookmark-view-before
         */
        return $this->generateViewView('bookmark');
    }
}
