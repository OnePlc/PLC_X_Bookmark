<?php
/**
 * ExportController.php - Bookmark Export Controller
 *
 * Main Controller for Bookmark Export
 *
 * @category Controller
 * @package Bookmark
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Bookmark\Controller;

use Application\Controller\CoreController;
use Application\Controller\CoreExportController;
use OnePlace\Bookmark\Model\BookmarkTable;
use Laminas\Db\Sql\Where;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\View\Model\ViewModel;


class ExportController extends CoreExportController
{
    /**
     * ApiController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param BookmarkTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,BookmarkTable $oTableGateway,$oServiceManager) {
        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);
    }


    /**
     * Dump Bookmarks to excel file
     *
     * @return ViewModel
     * @since 1.0.0
     */
    public function dumpAction() {
        $this->layout('layout/json');

        # Use Default export function
        $aViewData = $this->exportData('Bookmarks','bookmark');

        # return data to view (popup)
        return new ViewModel($aViewData);
    }
}