<?php
/**
 * BookmarkTable.php - Bookmark Table
 *
 * Table Model for Bookmark
 *
 * @category Model
 * @package Bookmark
 * @author Verein onePlace
 * @copyright (C) 2020 Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Bookmark\Model;

use Application\Controller\CoreController;
use Application\Model\CoreEntityTable;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Where;
use Laminas\Paginator\Paginator;
use Laminas\Paginator\Adapter\DbSelect;

class BookmarkTable extends CoreEntityTable {

    /**
     * BookmarkTable constructor.
     *
     * @param TableGateway $tableGateway
     * @since 1.0.0
     */
    public function __construct(TableGateway $tableGateway) {
        parent::__construct($tableGateway);

        # Set Single Form Name
        $this->sSingleForm = 'bookmark-single';
    }

    /**
     * Get Bookmark Entity
     *
     * @param int $id
     * @param string $sKey
     * @return mixed
     * @since 1.0.0
     */
    public function getSingle($id,$sKey = 'Bookmark_ID') {
        # Use core function
        return $this->getSingleEntity($id,$sKey);
    }

    /**
     * Save Bookmark Entity
     *
     * @param Bookmark $oBookmark
     * @return int Bookmark ID
     * @since 1.0.0
     */
    public function saveSingle(Bookmark $oBookmark) {
        $aDefaultData = [
            'label' => $oBookmark->label,
        ];

        return $this->saveSingleEntity($oBookmark,'Bookmark_ID',$aDefaultData);
    }

    /**
     * Generate new single Entity
     *
     * @return Bookmark
     * @since 1.0.0
     */
    public function generateNew() {
        return new Bookmark($this->oTableGateway->getAdapter());
    }
}