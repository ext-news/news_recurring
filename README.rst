EXT:news_recurring: Recurring news events
=========================================

About
-----

This extension provides an easy way to add multiple dates to a single news record.

Even though a recurring news event is a new record, it will be shown as a duplicate of the original one, except the date is switched to the actual one.

Requirements
~~~~~~~~~~~~

- TYPO3 7.6 LTS, 8.7 LTS
- Extension "news" 6.0.0

Screenshots
~~~~~~~~~~~

.. figure:: Documentation/screenshot.png
:alt: Screenshot of the backend

How to use
----------

Using this extension is simple! Follow this steps:

Creating the records
~~~~~~~~~~~~~~~~~~~~

1. Install the extension. You can get it either from the `TER <http://typo3.org/extensions/repository/view/news_recurring>`_ or from `Github <https://github.com/georgringer/news_recurring>`_
2. Create or open a news record and add multiple dates.

Adopt the template
~~~~~~~~~~~~~~~~~~

A few properties are added to the news object:

**({newsItem.recurringOriginal}**
This property will give you the original uid, because by just fetching ``{newsItem.uid}`` the uid of the parent object will be shown.

**{newsItem.recurringParent}**
This property will get you the parent object

**{newsItem.recurring}**
This property will give you all recurring events which are attached.


Author
~~~~~~

Author of this extension is Georg Ringer (http://www.montagmorgen.at).


Contribution & Bug reports
~~~~~~~~~~~~~~~~~~~~~~~~~~

Any contribution is highly welcomed. Please use the bugtracker of the `GitHub Project <https://github.com/georgringer/news_recurring/issues>`_
