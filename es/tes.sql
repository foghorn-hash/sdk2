DROP TABLE IF EXISTS `es_acl`;
CREATE TABLE IF NOT EXISTS `es_acl` (
  `acl_id` int(11) NOT NULL auto_increment,
  `role` varchar(80) collate utf8_unicode_ci NOT NULL,
  `inherit` varchar(80) collate utf8_unicode_ci NOT NULL,
  `order_id` int(8) NOT NULL default '0',
  PRIMARY KEY  (`acl_id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- 

INSERT INTO `es_acl` (`acl_id`, `role`, `inherit`, `order_id`) VALUES 
(1, 'Administrator', 'Staff 2', 1),
(2, 'Staff 1', 'none', 3),
(3, 'Staff 2', 'Staff 1', 2);

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_app_auth`;
CREATE TABLE IF NOT EXISTS `es_app_auth` (
  `id` int(8) NOT NULL auto_increment,
  `user_lvl` int(8) NOT NULL,
  `app_id` int(8) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `app_id` (`app_id`),
  KEY `user_id` (`user_lvl`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- 

INSERT INTO `es_app_auth` (`id`, `user_lvl`, `app_id`) VALUES 
(1, 1, 1),
(2, 1, 2),
(4, 2, 1);

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_applications`;
CREATE TABLE IF NOT EXISTS `es_applications` (
  `id` int(8) NOT NULL auto_increment,
  `lang_var` varchar(80) collate utf8_unicode_ci NOT NULL,
  `mvc_var` varchar(80) collate utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `order_id` int(8) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `mvc_var` (`mvc_var`),
  UNIQUE KEY `lang_var` (`lang_var`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- 

INSERT INTO `es_applications` (`id`, `lang_var`, `mvc_var`, `active`, `order_id`) VALUES 
(1, 'intranet', 'index', 1, 1),
(2, 'cms', 'cms', 1, 2);

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_content`;
CREATE TABLE IF NOT EXISTS `es_content` (
  `id` int(11) NOT NULL auto_increment,
  `edit` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `public_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `type` varchar(40) collate utf8_unicode_ci NOT NULL,
  `modified_date` datetime NOT NULL,
  `sub_of` int(11) NOT NULL default '0',
  `order_id` int(11) NOT NULL default '0',
  `module` int(11) NOT NULL default '0',
  `temp` int(11) NOT NULL default '1',
  `cat_id` int(11) NOT NULL default '0',
  `deleted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_content_cat`;
CREATE TABLE IF NOT EXISTS `es_content_cat` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_content_mod`;
CREATE TABLE IF NOT EXISTS `es_content_mod` (
  `id` int(11) NOT NULL auto_increment,
  `folder_var` varchar(40) collate utf8_unicode_ci NOT NULL,
  `lang_var` varchar(40) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `folder_var` (`folder_var`),
  UNIQUE KEY `lang_var` (`lang_var`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- 

INSERT INTO `es_content_mod` (`id`, `folder_var`, `lang_var`) VALUES 
(1, 'announcements', 'announcements'),
(2, 'articles', 'articles'),
(3, 'curriculumvitae', 'curriculumvitae');

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_cat`;
CREATE TABLE IF NOT EXISTS `es_cv_cat` (
  `id` int(11) NOT NULL auto_increment,
  `content` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_config`;
CREATE TABLE IF NOT EXISTS `es_cv_config` (
  `cid` int(8) NOT NULL auto_increment,
  `public` enum('no','yes') collate utf8_unicode_ci NOT NULL default 'no',
  `pdf` varchar(255) collate utf8_unicode_ci NOT NULL default 'back',
  `pic` varchar(255) collate utf8_unicode_ci NOT NULL default 'pic',
  `xml` text collate utf8_unicode_ci NOT NULL,
  `user_id` int(8) NOT NULL default '0',
  `cat_id` int(11) NOT NULL default '1',
  `key_words` varchar(255) collate utf8_unicode_ci NOT NULL default 'keyword 1, keyword 2',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_courses`;
CREATE TABLE IF NOT EXISTS `es_cv_courses` (
  `cid` int(11) NOT NULL auto_increment,
  `cname` varchar(80) collate utf8_unicode_ci default NULL,
  `sname` varchar(50) collate utf8_unicode_ci default NULL,
  `year` varchar(4) collate utf8_unicode_ci default '2004',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_edu`;
CREATE TABLE IF NOT EXISTS `es_cv_edu` (
  `edid` int(12) NOT NULL auto_increment,
  `edname` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `edplace` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `edyear` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`edid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_hobbies`;
CREATE TABLE IF NOT EXISTS `es_cv_hobbies` (
  `hid` int(8) NOT NULL auto_increment,
  `content` text collate utf8_unicode_ci NOT NULL,
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`hid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_info`;
CREATE TABLE IF NOT EXISTS `es_cv_info` (
  `iid` int(11) NOT NULL auto_increment,
  `content` text collate utf8_unicode_ci NOT NULL,
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`iid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_personaldata`;
CREATE TABLE IF NOT EXISTS `es_cv_personaldata` (
  `pdid` int(8) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `content` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`pdid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_recommendations`;
CREATE TABLE IF NOT EXISTS `es_cv_recommendations` (
  `rid` int(8) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `content` text collate utf8_unicode_ci NOT NULL,
  `contact` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_references`;
CREATE TABLE IF NOT EXISTS `es_cv_references` (
  `rid` int(8) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `content` text collate utf8_unicode_ci NOT NULL,
  `url` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_skills`;
CREATE TABLE IF NOT EXISTS `es_cv_skills` (
  `sid` int(8) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `content` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `description` text collate utf8_unicode_ci NOT NULL,
  `years` int(8) NOT NULL default '0',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_cv_workexp`;
CREATE TABLE IF NOT EXISTS `es_cv_workexp` (
  `weid` int(11) NOT NULL auto_increment,
  `wename` varchar(40) collate utf8_unicode_ci default NULL,
  `wedes` text collate utf8_unicode_ci,
  `emptype` varchar(255) collate utf8_unicode_ci default NULL,
  `sdate` varchar(10) collate utf8_unicode_ci default '00.00.0000',
  `edate` varchar(30) collate utf8_unicode_ci default '00.00.0000',
  `user_id` int(8) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `lang` varchar(80) collate utf8_unicode_ci NOT NULL default '',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_frontpage`;
CREATE TABLE IF NOT EXISTS `es_frontpage` (
  `id` int(8) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_gallery`;
CREATE TABLE IF NOT EXISTS `es_gallery` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `text` text collate utf8_unicode_ci NOT NULL,
  `created_date` datetime default '0000-00-00 00:00:00',
  `modified_date` datetime default '0000-00-00 00:00:00',
  `owner` int(11) NOT NULL default '0',
  `public` tinyint(1) NOT NULL default '0',
  `public_date` date NOT NULL default '0000-00-00',
  `folder` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `edit` tinyint(1) NOT NULL default '0',
  `sub` int(11) NOT NULL default '0',
  `index` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `folder` (`folder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_gallery_data`;
CREATE TABLE IF NOT EXISTS `es_gallery_data` (
  `id` int(11) NOT NULL auto_increment,
  `image` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `text` text collate utf8_unicode_ci NOT NULL,
  `title_act` tinyint(1) NOT NULL default '0',
  `text_act` tinyint(1) NOT NULL default '0',
  `cat_id` int(11) NOT NULL default '0',
  `created_date` datetime default '0000-00-00 00:00:00',
  `modified_date` datetime default '0000-00-00 00:00:00',
  `image_url` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `owner` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `image_url` (`image_url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_lang`;
CREATE TABLE IF NOT EXISTS `es_lang` (
  `lang_id` int(8) NOT NULL auto_increment,
  `lang_name` varchar(40) collate utf8_unicode_ci NOT NULL,
  `lang_file` varchar(40) collate utf8_unicode_ci NOT NULL,
  `lang_short` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`lang_id`),
  UNIQUE KEY `lang_short` (`lang_short`),
  UNIQUE KEY `lang_file` (`lang_file`),
  UNIQUE KEY `lang_name` (`lang_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- 

INSERT INTO `es_lang` (`lang_id`, `lang_name`, `lang_file`, `lang_short`) VALUES 
(1, 'Finnish', 'finnish', 'fi'),
(2, 'English', 'english', 'en');

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_layouts`;
CREATE TABLE IF NOT EXISTS `es_layouts` (
  `layout_id` int(8) NOT NULL auto_increment,
  `layout_name` varchar(40) collate utf8_unicode_ci NOT NULL,
  `layout_dir` varchar(80) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`layout_id`),
  UNIQUE KEY `layout_dir` (`layout_dir`),
  UNIQUE KEY `layout_name` (`layout_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- 

INSERT INTO `es_layouts` (`layout_id`, `layout_name`, `layout_dir`) VALUES 
(1, 'Default Blue', 'defaultblue'),
(2, 'Default Red', 'defaultred');

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_login_auth`;
CREATE TABLE IF NOT EXISTS `es_login_auth` (
  `id` int(11) NOT NULL,
  `user_lvl` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_mod_auth`;
CREATE TABLE IF NOT EXISTS `es_mod_auth` (
  `id` int(11) NOT NULL auto_increment,
  `user_lvl` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `json` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mod_id` (`mod_id`),
  KEY `user_id` (`user_lvl`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- 


-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_modules`;
CREATE TABLE IF NOT EXISTS `es_modules` (
  `module_id` int(8) NOT NULL auto_increment,
  `mvc_var` varchar(40) collate utf8_unicode_ci NOT NULL default 'index',
  `mod_dir` varchar(40) collate utf8_unicode_ci NOT NULL default 'index',
  `active` tinyint(1) NOT NULL default '0',
  `order_id` int(8) NOT NULL default '0',
  `app_id` int(8) NOT NULL default '0',
  PRIMARY KEY  (`module_id`),
  UNIQUE KEY `module_var` (`mod_dir`),
  KEY `app_id` (`app_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- 

INSERT INTO `es_modules` (`module_id`, `mvc_var`, `mod_dir`, `active`, `order_id`, `app_id`) VALUES 
(1, 'index', 'frontpage', 1, 1, 1),
(2, 'gallery', 'gallery', 1, 1, 1),
(3, 'content', 'content', 1, 2, 2),
(4, 'announcements', 'announcements', 1, 3, 2),
(5, 'articles', 'articles', 1, 4, 2),
(6, 'curriculumvitae', 'curriculumvitae', 1, 50, 1);

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_templates`;
CREATE TABLE IF NOT EXISTS `es_templates` (
  `id` int(11) NOT NULL auto_increment,
  `folder` varchar(80) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- 

INSERT INTO `es_templates` (`id`, `folder`) VALUES 
(1, 'default_i');

-- --------------------------------------------------------

-- 
-- 

DROP TABLE IF EXISTS `es_users`;
CREATE TABLE IF NOT EXISTS `es_users` (
  `user_id` int(8) NOT NULL auto_increment,
  `username` varchar(60) collate utf8_unicode_ci NOT NULL,
  `password` varchar(32) collate utf8_unicode_ci NOT NULL,
  `userlevel` int(8) NOT NULL default '0',
  `firstname` varchar(35) collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(35) collate utf8_unicode_ci NOT NULL,
  `info` text collate utf8_unicode_ci NOT NULL,
  `gender` char(1) collate utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL default '0',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`),
  KEY `userlevel` (`userlevel`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- 

INSERT INTO `es_users` (`user_id`, `username`, `password`, `userlevel`, `firstname`, `lastname`, `info`, `gender`, `active`, `modified`) VALUES 
(1, 'logan', '098f6bcd4621d373cade4e832627b4f6', 1, 'Logan', 'Miller', '-', 'M', 1, '2008-02-09 19:33:00'),
(2, 'jeff', '098f6bcd4621d373cade4e832627b4f6', 2, 'Jeff', 'Hamilton', '-', 'M', 1, '2008-02-09 19:32:54'),
(3, 'raymond', '098f6bcd4621d373cade4e832627b4f6', 3, 'Raymond', 'Hills', '-', 'M', 1, '2008-02-09 19:32:21');
