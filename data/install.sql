--
-- Base Table
--
CREATE TABLE `bookmark` (
  `Bookmark_ID` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`Bookmark_ID`);

ALTER TABLE `bookmark`
  MODIFY `Bookmark_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Permissions
--
INSERT INTO `permission` (`permission_key`, `module`, `label`, `nav_label`, `nav_href`, `show_in_menu`) VALUES
('add', 'OnePlace\\Bookmark\\Controller\\BookmarkController', 'Add', '', '', 0),
('edit', 'OnePlace\\Bookmark\\Controller\\BookmarkController', 'Edit', '', '', 0),
('index', 'OnePlace\\Bookmark\\Controller\\BookmarkController', 'Index', 'Bookmarks', '/bookmark', 1),
('list', 'OnePlace\\Bookmark\\Controller\\ApiController', 'List', '', '', 1),
('view', 'OnePlace\\Bookmark\\Controller\\BookmarkController', 'View', '', '', 0),
('dump', 'OnePlace\\Bookmark\\Controller\\ExportController', 'Excel Dump', '', '', 0),
('index', 'OnePlace\\Bookmark\\Controller\\SearchController', 'Search', '', '', 0);

--
-- Form
--
INSERT INTO `core_form` (`form_key`, `label`, `entity_class`, `entity_tbl_class`) VALUES
('bookmark-single', 'Bookmark', 'OnePlace\\Bookmark\\Model\\Bookmark', 'OnePlace\\Bookmark\\Model\\BookmarkTable');

--
-- Index List
--
INSERT INTO `core_index_table` (`table_name`, `form`, `label`) VALUES
('bookmark-index', 'bookmark-single', 'Bookmark Index');

--
-- Tabs
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES ('bookmark-base', 'bookmark-single', 'Bookmark', 'Base', 'fas fa-cogs', '', '0', '', '');

--
-- Buttons
--
INSERT INTO `core_form_button` (`Button_ID`, `label`, `icon`, `title`, `href`, `class`, `append`, `form`, `mode`, `filter_check`, `filter_value`) VALUES
(NULL, 'Save Bookmark', 'fas fa-save', 'Save Bookmark', '#', 'primary saveForm', '', 'bookmark-single', 'link', '', ''),
(NULL, 'Edit Bookmark', 'fas fa-edit', 'Edit Bookmark', '/bookmark/edit/##ID##', 'primary', '', 'bookmark-view', 'link', '', ''),
(NULL, 'Add Bookmark', 'fas fa-plus', 'Add Bookmark', '/bookmark/add', 'primary', '', 'bookmark-index', 'link', '', ''),
(NULL, 'Export Bookmarks', 'fas fa-file-excel', 'Export Bookmarks', '/bookmark/export', 'primary', '', 'bookmark-index', 'link', '', ''),
(NULL, 'Find Bookmarks', 'fas fa-searh', 'Find Bookmarks', '/bookmark/search', 'primary', '', 'bookmark-index', 'link', '', ''),
(NULL, 'Export Bookmarks', 'fas fa-file-excel', 'Export Bookmarks', '#', 'primary initExcelDump', '', 'bookmark-search', 'link', '', ''),
(NULL, 'New Search', 'fas fa-searh', 'New Search', '/bookmark/search', 'primary', '', 'bookmark-search', 'link', '', '');

--
-- Fields
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'text', 'Name', 'label', 'bookmark-base', 'bookmark-single', 'col-md-3', '/bookmark/view/##ID##', '', 0, 1, 0, '', '', '');

--
-- User XP Activity
--
INSERT INTO `user_xp_activity` (`Activity_ID`, `xp_key`, `label`, `xp_base`) VALUES
(NULL, 'bookmark-add', 'Add New Bookmark', '50'),
(NULL, 'bookmark-edit', 'Edit Bookmark', '5'),
(NULL, 'bookmark-export', 'Edit Bookmark', '5');

COMMIT;