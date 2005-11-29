--
-- Table structure for table `tinymce_settings`
--

CREATE TABLE tinymce_settings (
  name varchar(128) NOT NULL default '',
  settings text NOT NULL default '',
  PRIMARY KEY (name)
);

--
-- Table structure for table `tinymce_role`
--

CREATE TABLE tinymce_role (
  name varchar(128) NOT NULL default '',
  rid smallint NOT NULL default '0',
  PRIMARY KEY (name,rid)
);
