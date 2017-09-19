#
# Table structure for table 'tx_news_domain_model_news'
#
CREATE TABLE tx_news_domain_model_news (
	recurring int(11) DEFAULT '0' NOT NULL,
	recurring_parent int(11) DEFAULT '0' NOT NULL,
	recurring_original int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_news_domain_model_news_recurring_mm'
#
CREATE TABLE tx_news_domain_model_news_recurring_mm (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
